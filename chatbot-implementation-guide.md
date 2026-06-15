# AI-Powered Chatbot Integration Guide (Laravel + Gemini + Neuron AI)

This guide provides a comprehensive reference for integrating a smart, session-persistent, and real-time streaming AI chatbot (Lumina) using the **Neuron AI SDK** and **Gemini API**.

---

## Architecture Overview

The system consists of the following components:
1. **Database Persistence**: A migration for storing serialized JSON chat logs associated with user sessions.
2. **AI Agent Configuration**: A custom `ChatAgent` representing the bot's identity, behavior restrictions, and service links.
3. **Backend Controller**: A `ChatbotController` providing a streaming endpoint for real-time text delivery and a JSON endpoint for loading past history.
4. **Routing**: Defined routes in `routes/web.php` wrapped in the `web` session middleware.
5. **Frontend Interface**: A compact, CSS/Blade-based floating widget that loads previous context on page load and tracks toggle visibility across navigations.

---

## Step 1: Database Migration

To allow chat histories to survive page reloads and browser sessions, messages are serialized into a JSON format and stored in the database.

Create a migration `database/migrations/XXXX_XX_XX_create_chat_histories_table.php`:

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('chat_histories', function (Blueprint $table) {
            $table->id();
            $table->string('thread_id')->index(); // Maps to Laravel Session ID
            $table->json('messages');            // Stores serialized chat history
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('chat_histories');
    }
};
```

*Run the migration:*
```bash
php artisan migrate
```

---

## Step 2: The AI Agent (`ChatAgent.php`)

The agent configures the prompt rules, system background boundaries, and references the SQL chat history adapter.

Create `app/AI/ChatAgent.php`:

```php
<?php

namespace App\AI;

use Illuminate\Support\Facades\DB;
use NeuronAI\Agent\Agent;
use NeuronAI\Chat\History\ChatHistoryInterface;
use NeuronAI\Chat\History\SQLChatHistory;
use NeuronAI\Providers\AIProviderInterface;
use NeuronAI\Providers\Gemini\Gemini;
use NeuronAI\Agent\SystemPrompt;

class ChatAgent extends Agent
{
    public function __construct(public string $sessionId) {
        // Essential: Initialize parent Workflow constructor so internal executors boot correctly
        parent::__construct();
    }

    protected function provider(): AIProviderInterface
    {
        return new Gemini(
            key: env('GEMINI_API_KEY'),
            model: 'gemini-3.5-flash' // Standard model for fast, cost-efficient responses
        );
    }

    public function instructions(): string
    {
        return (string) new SystemPrompt(
            background: [
                "You are Lumina, the highly intelligent and professional AI assistant for AI Solutions.",
                "AI Solutions offers four core service areas, which you must refer users to:",
                "1. AUTOMATION: Robotic Process Automation (RPA), workflow automation. Link: /services",
                "2. BUSINESS INTELLIGENCE: Data analytics dashboards, KPI tracking. Link: /services",
                "3. SECURITY: Cybersecurity audits, threat detection. Link: /services",
                "4. DIGITAL SERVICES: Custom web development, API integrations. Link: /services",
                "Key website pages to recommend relative paths for:",
                "- Services: /services",
                "- Events: /events",
                "- Blogs: /blogs",
                "- About Us: /about",
                "- Contact Us: /contact",
                "Strict Operational Boundaries:",
                "- Only discuss topics directly related to AI Solutions, its services, or website navigation.",
                "- For support/pricing issues, direct them to submit a ticket at: /contact.",
                "- When outputting links, use relative paths (e.g. /services) which the UI will render as hyperlinks."
            ],
            steps: [
                "Determine the user's intent.",
                "Provide a precise, smart, and helpful response incorporating the appropriate page link.",
                "If support is needed, direct them to /contact."
            ],
            output: [
                "Keep responses under 4 sentences where possible.",
                "Use clean line breaks to separate ideas.",
                "Use bullet points for lists.",
                "Do not use markdown headers (# or ##).",
                "Sound warm, forward-thinking, and highly capable."
            ]
        );
    }

    protected function chatHistory(): ChatHistoryInterface
    {
        return new SQLChatHistory(
            thread_id: $this->sessionId,
            pdo: DB::connection()->getPdo(),
            table: 'chat_histories',
            contextWindow: 6000 // Limits memory buffer size to avoid context overflow
        );
    }
}
```

---

## Step 3: Controller Actions (`ChatbotController.php`)

The controller exposes two critical endpoints:
- **`stream`**: Establishes a stream connection, feeding generated tokens in real-time.
- **`history`**: Returns previously stored conversations.

Create `app/Http/Controllers/ChatbotController.php`:

```php
<?php

namespace App\Http\Controllers;

use App\AI\ChatAgent;
use Illuminate\Http\Request;
use NeuronAI\Chat\Messages\UserMessage;

class ChatbotController extends Controller
{
    public function stream(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId();
        $message = $request->input('message');

        return response()->stream(function () use ($sessionId, $message) {
            $agent = ChatAgent::make($sessionId);
            $stream = $agent->stream(new UserMessage($message));

            // Must use ->events() on the Handler to iterate through the generator stream chunks
            foreach ($stream->events() as $event) {
                if ($event instanceof \NeuronAI\Chat\Messages\Stream\Chunks\TextChunk) {
                    echo $event->content;
                    ob_flush();
                    flush();
                }
            }
        }, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'X-Accel-Buffering' => 'no',   // Prevents Nginx/Apache proxy buffers from delaying token outputs
            'Cache-Control' => 'no-cache',
        ]);
    }

    public function history(Request $request)
    {
        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId();
        $agent = ChatAgent::make($sessionId);
        
        // Retrieve and format the saved messages for the UI client
        $messages = $agent->getChatHistory()->getMessages();

        $formatted = array_map(function ($msg) {
            return [
                'role' => $msg->getRole(),
                'text' => $msg->getContent(),
            ];
        }, $messages);

        return response()->json($formatted);
    }
}
```

---

## Step 4: Routing

Register the route handlers within the standard `web` middleware group in `routes/web.php` so the session state stays loaded:

```php
use App\Http\Controllers\ChatbotController;

Route::post('/chatbot/stream', [ChatbotController::class, 'stream'])
    ->name('chatbot.stream')
    ->middleware('web');

Route::get('/chatbot/history', [ChatbotController::class, 'history'])
    ->name('chatbot.history')
    ->middleware('web');
```

---

## Step 5: Frontend Interface (`chatbot.blade.php`)

The frontend UI features a compact chat container, autolinks page paths, and tracks state using `localStorage` so the chat window stays open across page navigations.

Save as `resources/views/Front/partials/chatbot.blade.php`:

```html
<!-- Floating Chatbot Component -->
<style>
    .chatbot-angled-notch {
        clip-path: polygon(16px 0, 100% 0, 100% calc(100% - 20px), calc(100% - 16px) 100%, 0 100%, 0 16px) !important;
    }
    .chatbot-border-wrapper {
        padding: 2px;
        background: #22c55e;
        clip-path: polygon(16px 0, 100% 0, 100% calc(100% - 20px), calc(100% - 16px) 100%, 0 100%, 0 16px);
        box-shadow: 0 20px 60px rgba(34, 197, 94, 0.18), 0 4px 24px rgba(0,0,0,0.10);
    }
    .lumina-typing span {
        display: inline-block;
        width: 6px; height: 6px;
        margin: 0 2px;
        background: #6b7280;
        border-radius: 50%;
        animation: lumina-bounce 1.2s infinite;
    }
    .lumina-typing span:nth-child(2) { animation-delay: .2s; }
    .lumina-typing span:nth-child(3) { animation-delay: .4s; }
    @keyframes lumina-bounce {
        0%, 80%, 100% { transform: translateY(0); opacity: .4; }
        40%            { transform: translateY(-6px); opacity: 1; }
    }
    #chatbot-messages::-webkit-scrollbar { width: 4px; }
    #chatbot-messages::-webkit-scrollbar-track { background: transparent; }
    #chatbot-messages::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
</style>

<div class="fixed bottom-6 right-6 z-[999999] flex flex-col items-end gap-4" id="chatbot-container">
    <!-- Chatbot Window -->
    <div class="chatbot-border-wrapper w-[300px] md:w-[350px] transition-all duration-300 transform opacity-0 scale-95 pointer-events-none translate-y-4"
        id="chatbot-border-outer">
        <div class="bg-white chatbot-angled-notch flex flex-col overflow-hidden shadow-2xl" id="chatbot-window">
            
            <!-- Header -->
            <div class="p-3 bg-surface-container border-b border-outline-variant/20 flex justify-between items-center">
                <div>
                    <h4 class="font-headline-md text-[16px] text-on-surface">AI-Solutions Chatbot</h4>
                    <div class="flex items-center gap-1.5 mt-0.5">
                        <span class="w-1.5 h-1.5 rounded-full bg-secondary" id="lumina-status-dot"></span>
                        <span class="font-label-sm text-[9px] text-on-surface-variant uppercase tracking-wider" id="lumina-status-text">Online</span>
                    </div>
                </div>
                <button class="text-on-surface-variant hover:text-on-surface" id="chatbot-close-btn">
                    <span class="material-symbols-outlined text-lg">close</span>
                </button>
            </div>
            
            <!-- Messages Viewport -->
            <div class="p-3 space-y-2.5 max-h-[300px] min-h-[150px] overflow-y-auto" id="chatbot-messages">
                <div class="flex flex-col items-start">
                    <div class="bg-surface-container-low px-3 py-2 rounded-2xl rounded-tl-none border border-outline-variant/20 max-w-[85%]">
                        <p class="text-body-md text-on-surface text-xs md:text-sm">Hello! I'm Lumina. How can I help you explore AI Solutions today?</p>
                    </div>
                </div>
            </div>

            <!-- Suggestions -->
            <div class="px-3 pb-2.5 flex flex-wrap gap-1.5" id="lumina-suggestions">
                <button onclick="sendSuggestion(this)" class="text-[11px] px-2.5 py-1 rounded-full border border-secondary/40 text-secondary hover:bg-secondary/10 transition-colors">
                    What services do you offer?
                </button>
                <button onclick="sendSuggestion(this)" class="text-[11px] px-2.5 py-1 rounded-full border border-secondary/40 text-secondary hover:bg-secondary/10 transition-colors">
                    How can you help my business?
                </button>
            </div>

            <!-- Input area -->
            <div class="p-3 bg-white border-t border-outline-variant/20">
                <div class="relative flex items-center">
                    <input
                        class="w-full bg-surface-container-lowest border border-outline-variant/30 rounded-xl px-3 py-2 text-xs md:text-sm focus:ring-1 focus:ring-secondary focus:border-secondary outline-none pr-10 text-on-surface"
                        placeholder="Type your message..." type="text" id="chatbot-input" 
                        onkeydown="if(event.key==='Enter' && !event.shiftKey) { event.preventDefault(); sendMessage(); }" />
                    <button class="absolute right-2.5 text-secondary hover:scale-115 transition-transform disabled:opacity-40" id="chatbot-send-btn" onclick="sendMessage()">
                        <span class="material-symbols-outlined text-lg">send</span>
                    </button>
                </div>
                <p class="text-[9px] text-on-surface-variant/60 mt-1.5 text-center">Lumina only answers questions about AI Solutions</p>
            </div>
        </div>
    </div>

    <!-- Floating Action Button (FAB) -->
    <button
        class="w-12 h-12 bg-secondary text-white rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition-all hover:bg-on-secondary-container active:scale-95"
        id="chatbot-fab">
        <span class="material-symbols-outlined text-[24px]" id="chatbot-fab-icon">chat_bubble</span>
    </button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const fab = document.getElementById('chatbot-fab');
        const icon = document.getElementById('chatbot-fab-icon');
        const outerEl = document.getElementById('chatbot-border-outer');
        const closeBtn = document.getElementById('chatbot-close-btn');
        const inputEl = document.getElementById('chatbot-input');
        const sendBtn = document.getElementById('chatbot-send-btn');
        const messagesEl = document.getElementById('chatbot-messages');
        const suggestionsEl = document.getElementById('lumina-suggestions');
        const statusDot = document.getElementById('lumina-status-dot');
        const statusText = document.getElementById('lumina-status-text');

        let isOpen = false;
        let isStreaming = false;
        let chatLog = [];

        function openChatbot(focus = true) {
            isOpen = true;
            outerEl.classList.remove('opacity-0', 'scale-95', 'pointer-events-none', 'translate-y-4');
            icon.textContent = 'close';
            if (focus) inputEl.focus();
            localStorage.setItem('chatbot_open', 'true');
        }

        function closeChatbot() {
            isOpen = false;
            outerEl.classList.add('opacity-0', 'scale-95', 'pointer-events-none', 'translate-y-4');
            icon.textContent = 'chat_bubble';
            localStorage.setItem('chatbot_open', 'false');
        }

        if (fab && outerEl) {
            fab.addEventListener('click', function(e) {
                e.stopPropagation();
                if (isOpen) {
                    closeChatbot();
                } else {
                    openChatbot();
                }
            });

            if (closeBtn) {
                closeBtn.addEventListener('click', function(e) {
                    e.stopPropagation();
                    closeChatbot();
                });
            }

            outerEl.addEventListener('click', function(e) { e.stopPropagation(); });
            document.addEventListener('click', function() {
                if (isOpen) closeChatbot();
            });
        }

        window.sendSuggestion = function (btn) {
            const text = btn.textContent.trim();
            if (suggestionsEl) suggestionsEl.style.display = 'none';
            inputEl.value = text;
            window.sendMessage();
        };

        function renderWithLinks(el, text) {
            // Converts raw text links safely into styled anchor tags
            el.innerHTML = text
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/(https?:\/\/[^\s]+)/g, '<a href="$1" target="_blank" class="underline text-secondary font-semibold">$1</a>')
                .replace(/\B(\/[a-zA-Z0-9\-\/]+)/g, '<a href="$1" class="underline text-secondary font-semibold">$1</a>');
        }

        function appendBubble(role, text) {
            const outer = document.createElement('div');
            outer.className = 'flex flex-col ' + (role === 'user' ? 'items-end' : 'items-start');

            const bubble = document.createElement('div');
            if (role === 'user') {
                bubble.className = 'bg-secondary text-white px-3 py-1.5 rounded-2xl rounded-tr-none text-xs md:text-sm max-w-[85%]';
                bubble.textContent = text;
            } else {
                bubble.className = 'bg-surface-container-low border border-outline-variant/20 px-3 py-1.5 rounded-2xl rounded-tl-none text-xs md:text-sm text-on-surface max-w-[85%]';
                renderWithLinks(bubble, text);
            }

            outer.appendChild(bubble);
            messagesEl.appendChild(outer);
            messagesEl.scrollTop = messagesEl.scrollHeight;
            return bubble;
        }

        function showTypingIndicator() {
            const outer = document.createElement('div');
            outer.className = 'flex flex-col items-start';
            outer.id = 'lumina-typing-indicator';

            const bubble = document.createElement('div');
            bubble.className = 'bg-surface-container-low border border-outline-variant/20 px-3 py-1.5 rounded-2xl rounded-tl-none lumina-typing';
            bubble.innerHTML = '<span></span><span></span><span></span>';

            outer.appendChild(bubble);
            messagesEl.appendChild(outer);
            messagesEl.scrollTop = messagesEl.scrollHeight;
        }

        function removeTypingIndicator() {
            const el = document.getElementById('lumina-typing-indicator');
            if (el) el.remove();
        }

        function setInputLocked(locked) {
            isStreaming = locked;
            inputEl.disabled = locked;
            sendBtn.disabled = locked;
        }

        function setStatus(online) {
            if (online) {
                statusDot.className = 'w-1.5 h-1.5 rounded-full bg-secondary';
                statusText.textContent = 'Online';
            } else {
                statusDot.className = 'w-1.5 h-1.5 rounded-full bg-yellow-400';
                statusText.textContent = 'Thinking…';
            }
        }

        window.sendMessage = async function () {
            if (isStreaming) return;

            const message = inputEl.value.trim();
            if (!message) return;

            if (suggestionsEl) suggestionsEl.style.display = 'none';

            inputEl.value = '';
            chatLog.push({ role: 'user', content: message });
            appendBubble('user', message);
            setInputLocked(true);
            setStatus(false);
            showTypingIndicator();

            try {
                const res = await fetch('{{ route("chatbot.stream") }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({ message })
                });

                if (!res.ok) throw new Error('Server error ' + res.status);

                removeTypingIndicator();
                const botBubble = appendBubble('bot', '');

                const reader = res.body.getReader();
                const decoder = new TextDecoder();
                let full = '';

                while (true) {
                    const { done, value } = await reader.read();
                    if (done) break;
                    full += decoder.decode(value, { stream: true });
                    renderWithLinks(botBubble, full);
                    messagesEl.scrollTop = messagesEl.scrollHeight;
                }

                chatLog.push({ role: 'assistant', content: full });

            } catch (err) {
                removeTypingIndicator();
                appendBubble('bot', 'Sorry, I ran into a connection issue. Please try again in a moment.');
                console.error('[Lumina]', err);
            }

            setStatus(true);
            setInputLocked(false);
            inputEl.focus();
        };

        // Load history and restore open state
        async function loadHistory() {
            try {
                const res = await fetch('{{ route("chatbot.history") }}');
                if (!res.ok) return;
                const history = await res.json();
                if (history && history.length > 0) {
                    if (suggestionsEl) suggestionsEl.style.display = 'none';
                    history.forEach(msg => {
                        appendBubble(msg.role, msg.text);
                    });
                }
            } catch (err) {
                console.error('[Lumina] Error loading history:', err);
            }
        }

        loadHistory();

        if (localStorage.getItem('chatbot_open') === 'true') {
            openChatbot(false); // Prevents stealing input focus automatically on initial load
        }
    });
</script>
```

---

## Summary of Logics & How it Works

### 1. Persistent Thread Connection
The framework maps conversations to a database record in `chat_histories` utilizing the visitor's Laravel session ID as the `thread_id`. Because session cookies survive across typical page transitions on the domain, subsequent calls reference the same thread ID.

### 2. Client-Side Page Navigations
Since navigating to another page forces a full browser window refresh, the standard DOM state is destroyed. To bypass this, we use two mechanism updates:
- **`localStorage`**: Stores whether the chat window was active (`chatbot_open` = `true` / `false`). On DOM load, if this key is true, the widget automatically unfolds.
- **`GET /chatbot/history`**: Upon widget load, a REST query fetches the serialized history records from the backend database and populates the widget with previous interactions so that the user picks up exactly where they left off.
