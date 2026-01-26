<?php

namespace App\Http\Controllers;

use App\Models\ChatbotConversation;
use App\Services\GeminiChatbotService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ChatbotController extends Controller
{
    private GeminiChatbotService $chatbotService;

    public function __construct(GeminiChatbotService $chatbotService)
    {
        $this->chatbotService = $chatbotService;
    }

    /**
     * Show chatbot page
     */
    public function index(): View
    {
        return view('chatbot.index');
    }

    /**
     * Send message to chatbot
     */
    public function sendMessage(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:1000',
            'session_id' => 'nullable|string',
            'resident_id' => 'nullable|exists:residents,id',
        ]);

        try {
            $sessionId = $validated['session_id'] ?? Str::uuid()->toString();

            // Get atau create conversation
            $conversation = ChatbotConversation::where('session_id', $sessionId)
                ->first();

            if (!$conversation) {
                $conversation = new ChatbotConversation([
                    'session_id' => $sessionId,
                    'resident_id' => $validated['resident_id'] ?? null,
                    'messages' => [],
                ]);
            }

            // Add user message
            $conversation->addMessage('user', $validated['message']);

            // Get response dari Gemini
            $response = $this->chatbotService->getResponse(
                $validated['message'],
                $conversation->messages ?? []
            );

            if (!$response['success']) {
                return response()->json([
                    'success' => false,
                    'message' => $response['message'],
                    'session_id' => $sessionId,
                ], 400);
            }

            // Add bot response
            $conversation->addMessage('assistant', $response['message']);
            $conversation->save();

            return response()->json([
                'success' => true,
                'message' => $response['message'],
                'session_id' => $sessionId,
                'conversation' => $conversation->messages,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

    /**
     * Get conversation history
     */
    public function getConversation(Request $request): JsonResponse
    {
        $sessionId = $request->query('session_id');

        if (!$sessionId) {
            return response()->json([
                'success' => false,
                'message' => 'Session ID required',
            ], 400);
        }

        $conversation = ChatbotConversation::where('session_id', $sessionId)->first();

        if (!$conversation) {
            return response()->json([
                'success' => true,
                'messages' => [],
                'session_id' => $sessionId,
            ]);
        }

        return response()->json([
            'success' => true,
            'messages' => $conversation->messages ?? [],
            'session_id' => $sessionId,
        ]);
    }

    /**
     * Clear conversation
     */
    public function clearConversation(Request $request): JsonResponse
    {
        $sessionId = $request->input('session_id');

        if (!$sessionId) {
            return response()->json([
                'success' => false,
                'message' => 'Session ID required',
            ], 400);
        }

        ChatbotConversation::where('session_id', $sessionId)->delete();

        return response()->json([
            'success' => true,
            'message' => 'Conversation cleared',
        ]);
    }
}
