<?php

namespace App\Http\Controllers;

use App\AI\ChatAgent;
use Illuminate\Http\Request;
use NeuronAI\Chat\Messages\Stream\Chunks\TextChunk;
use NeuronAI\Chat\Messages\UserMessage;

class ChatbotController extends Controller
{
    public function stream(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        // Start session so we have a stable ID for this visit
        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId();
        $message = $request->input('message');

        return response()->stream(function () use ($sessionId, $message) {
            $agent = ChatAgent::make($sessionId);
            $stream = $agent->stream(new UserMessage($message));

            foreach ($stream->events() as $event) {
                if ($event instanceof TextChunk) {
                    echo $event->content;
                    ob_flush();
                    flush();
                }
            }
        }, 200, [
            'Content-Type' => 'text/plain; charset=UTF-8',
            'X-Accel-Buffering' => 'no',   // disables nginx buffering
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
