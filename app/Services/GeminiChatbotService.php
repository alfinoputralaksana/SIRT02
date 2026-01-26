<?php

namespace App\Services;

use App\Models\GeminiConfig;
use GuzzleHttp\Client;
use Exception;

class GeminiChatbotService
{
    private string $apiKey;
    private string $model;
    private float $temperature;
    private int $maxOutputTokens;
    private string $systemPrompt;
    private string $apiUrl = 'https://generativelanguage.googleapis.com/v1beta';

    public function __construct()
    {
        // Get active config from database (required)
        $config = GeminiConfig::getActive();
        
        if (!$config) {
            throw new Exception('Konfigurasi Gemini API belum diatur. Silakan atur di halaman Admin terlebih dahulu.');
        }
        
        $this->apiKey = $config->api_key;
        $this->model = $config->model;
        $this->temperature = $config->temperature;
        $this->maxOutputTokens = $config->max_output_tokens;
        $this->systemPrompt = $config->system_prompt;
        
        // Validate API key is not empty
        if (empty($this->apiKey)) {
            throw new Exception('API Key tidak diatur. Silakan periksa konfigurasi Gemini di halaman Admin.');
        }
    }

    /**
     * Get response dari Gemini API
     */
    public function getResponse(string $userMessage, array $conversationHistory = []): array
    {
        try {
            // Siapkan messages untuk API
            $messages = $this->formatMessages($userMessage, $conversationHistory);

            // Call Gemini API menggunakan Guzzle client
            $client = new Client();
            
            $response = $client->post($this->apiUrl . '/models/' . $this->model . ':generateContent?key=' . $this->apiKey, [
                'headers' => [
                    'Content-Type' => 'application/json',
                ],
                'json' => [
                    'contents' => $messages,
                    'generationConfig' => [
                        'temperature' => $this->temperature,
                        'topK' => 40,
                        'topP' => 0.95,
                        'maxOutputTokens' => $this->maxOutputTokens,
                    ],
                    'safetySettings' => [
                        [
                            'category' => 'HARM_CATEGORY_HARASSMENT',
                            'threshold' => 'BLOCK_MEDIUM_AND_ABOVE',
                        ],
                    ],
                ],
                'timeout' => 30,
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode !== 200) {
                throw new Exception('API request failed: ' . $statusCode . ' - ' . $response->getBody());
            }

            $data = json_decode($response->getBody(), true);

            if (!isset($data['candidates'][0]['content']['parts'][0]['text'])) {
                throw new Exception('Invalid API response format');
            }

            return [
                'success' => true,
                'message' => $data['candidates'][0]['content']['parts'][0]['text'],
                'usage' => $data['usageMetadata'] ?? null,
            ];
        } catch (Exception $e) {
            return [
                'success' => false,
                'message' => 'Maaf, terjadi kesalahan saat memproses pertanyaan Anda. Silakan coba lagi.',
                'error' => $e->getMessage(),
            ];
        }
    }

    /**
     * Format messages untuk Gemini API
     */
    private function formatMessages(string $userMessage, array $conversationHistory): array
    {
        $messages = [];

        // Tambahkan system prompt sebagai user message
        $messages[] = [
            'role' => 'user',
            'parts' => [
                ['text' => $this->systemPrompt],
            ],
        ];

        // Tambahkan model response untuk system prompt
        $messages[] = [
            'role' => 'model',
            'parts' => [
                ['text' => 'Baik, saya siap membantu menjawab pertanyaan tentang administrasi RT.'],
            ],
        ];

        // Tambahkan conversation history
        foreach ($conversationHistory as $msg) {
            $messages[] = [
                'role' => strtolower($msg['role']) === 'user' ? 'user' : 'model',
                'parts' => [
                    ['text' => $msg['content']],
                ],
            ];
        }

        // Tambahkan user message saat ini
        $messages[] = [
            'role' => 'user',
            'parts' => [
                ['text' => $userMessage],
            ],
        ];

        return $messages;
    }

    /**
     * Get default system prompt untuk RT administration
     */
    private function getDefaultSystemPrompt(): string
    {
        return $this->getDefaultPromptContent();
    }

    /**
     * Get default prompt content
     */
    private function getDefaultPromptContent(): string
    {
        return <<<'PROMPT'
Anda adalah chatbot asisten administrasi RT (Rukun Tetangga) yang helpful dan ramah.
Anda membantu warga dengan informasi tentang:
1. Persyaratan surat (surat keterangan, surat domisili, surat tidak mampu, surat pengalaman)
2. Prosedur administrasi RT
3. Jadwal pelayanan
4. Aturan dan kebijakan RT

Berikan jawaban yang:
- Jelas dan mudah dipahami
- Singkat dan padat
- Dalam bahasa Indonesia yang baik
- Helpful dan profesional

Jika ada pertanyaan yang tidak berhubungan dengan administrasi RT, kembalikan dengan halus dan tawarkan bantuan terkait RT.

Persyaratan Surat:
- Surat Keterangan: NIK, KTP, Surat Pengantar RT
- Surat Domisili: NIK, KTP, Surat Pengantar RT
- Surat Tidak Mampu: NIK, KTP, Surat Pengantar RT, Surat Rekomendasi Kelurahan
- Surat Pengalaman: NIK, KTP, Surat Pengantar RT, Dokumen Pendukung

Jadwal Pelayanan:
- Senin - Jumat: 08:00 - 16:00
- Sabtu: 08:00 - 12:00
- Minggu & Hari Libur: Tutup

Prosedur:
1. Warga datang dan mengajukan permohonan
2. Admin memverifikasi data dan dokumen
3. Surat diproses dalam 1-3 hari kerja
4. Warga dihubungi untuk pengambilan
PROMPT;
    }

    /**
     * Get current model being used
     */
    public function getModel(): string
    {
        return $this->model;
    }
}

