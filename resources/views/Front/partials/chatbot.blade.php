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
    /* Typing indicator dots */
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
    /* Scrollbar styling for messages */
    #chatbot-messages::-webkit-scrollbar { width: 4px; }
    #chatbot-messages::-webkit-scrollbar-track { background: transparent; }
    #chatbot-messages::-webkit-scrollbar-thumb { background: #d1d5db; border-radius: 4px; }
</style>

<div class="fixed bottom-6 right-6 z-[999999] flex flex-col items-end gap-4" id="chatbot-container">
    <!-- Chatbot Window -->
    <div class="chatbot-border-wrapper w-[300px] md:w-[350px] transition-all duration-300 transform opacity-0 scale-95 pointer-events-none translate-y-4"
        id="chatbot-border-outer">
        <div class="bg-white chatbot-angled-notch flex flex-col overflow-hidden shadow-2xl"
            id="chatbot-window">
            
            <!-- Header (reduced padding) -->
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
            
            <!-- Messages (reduced height, padding and spacing) -->
            <div class="p-3 space-y-2.5 max-h-[300px] min-h-[150px] overflow-y-auto" id="chatbot-messages">
                <div class="flex flex-col items-start">
                    <div class="bg-surface-container-low px-3 py-2 rounded-2xl rounded-tl-none border border-outline-variant/20 max-w-[85%]">
                        <p class="text-body-md text-on-surface text-xs md:text-sm">Hello! I'm Lumina. How can I help you explore AI Solutions today?</p>
                    </div>
                </div>
            </div>

            <!-- Suggested prompts (reduced padding) -->
            <div class="px-3 pb-2.5 flex flex-wrap gap-1.5" id="lumina-suggestions">
                <button onclick="sendSuggestion(this)" class="text-[11px] px-2.5 py-1 rounded-full border border-secondary/40 text-secondary hover:bg-secondary/10 transition-colors">
                    What services do you offer?
                </button>
                <button onclick="sendSuggestion(this)" class="text-[11px] px-2.5 py-1 rounded-full border border-secondary/40 text-secondary hover:bg-secondary/10 transition-colors">
                    How can you help my business?
                </button>
                <button onclick="sendSuggestion(this)" class="text-[11px] px-2.5 py-1 rounded-full border border-secondary/40 text-secondary hover:bg-secondary/10 transition-colors">
                    I want to get started
                </button>
            </div>

            <!-- Input area (reduced padding) -->
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

            outerEl.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            document.addEventListener('click', function() {
                if (isOpen) {
                    closeChatbot();
                }
            });
        }

        window.sendSuggestion = function (btn) {
            const text = btn.textContent.trim();
            if (suggestionsEl) suggestionsEl.style.display = 'none';
            inputEl.value = text;
            window.sendMessage();
        };

        function renderWithLinks(el, text) {
            // Convert /path or https://... to anchor tags safely
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
            openChatbot(false);
        }
    });
</script>