<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\File;
use Tests\TestCase;

class ChatbotSimilarityTest extends TestCase
{
    /**
     * Menghitung Jaccard Similarity antara dua string.
     */
    private function jaccardSimilarity($str1, $str2)
    {
        // Bersihkan tanda baca dan ubah ke lowercase
        $cleanStr1 = strtolower(preg_replace('/[^\w\s]/', '', $str1));
        $cleanStr2 = strtolower(preg_replace('/[^\w\s]/', '', $str2));

        // Pecah menjadi array kata unik
        $set1 = array_unique(explode(' ', $cleanStr1));
        $set2 = array_unique(explode(' ', $cleanStr2));
        
        // Hapus elemen kosong
        $set1 = array_filter($set1);
        $set2 = array_filter($set2);
        
        $intersection = array_intersect($set1, $set2);
        $union = array_unique(array_merge($set1, $set2));
        
        if (count($union) == 0) return 1.0;
        
        return count($intersection) / count($union);
    }

    /**
     * Menghitung Levenshtein Similarity antara dua string.
     */
    private function levenshteinSimilarity($str1, $str2)
    {
        $len1 = strlen($str1);
        $len2 = strlen($str2);
        if ($len1 == 0 && $len2 == 0) return 1.0;
        
        $distance = levenshtein($str1, $str2);
        $maxLen = max($len1, $len2);
        
        return 1 - ($distance / $maxLen);
    }

    /**
     * Test algoritma similarity untuk bot
     */
    public function test_chatbot_similarity_algorithms()
    {
        // Skenario test: pertanyaan, jawaban yg diharapkan, jawaban dari LLM (contoh/mockup)
        // Kita juga bisa memanggil ChatbotService asli di sini jika koneksi aktif. 
        // Namun di test ini difokuskan pada pengujian algoritma Jaccard & Levenshtein.
        $testCases = [
            [
                'pertanyaan' => 'Apa syarat membuat surat domisili?',
                'expected_response' => 'Syarat untuk membuat surat domisili adalah NIK, KTP, dan Surat Pengantar RT.',
                'actual_response' => 'Untuk membuat surat domisili, Anda perlu membawa KTP, NIK, dan Surat Pengantar RT.',
            ],
            [
                'pertanyaan' => 'Kapan jadwal pelayanan RT?',
                'expected_response' => 'Senin - Jumat: 08:00 - 16:00, Sabtu: 08:00 - 12:00, Minggu & Hari Libur: Tutup.',
                'actual_response' => 'Jadwal pelayanan kami: Senin-Jumat pukul 08:00-16:00. Hari Sabtu pukul 08:00-12:00. Hari Minggu dan libur tutup.',
            ],
            [
                'pertanyaan' => 'Bagaimana prosedur buat surat tidak mampu?',
                'expected_response' => 'Surat Tidak Mampu: NIK, KTP, Surat Pengantar RT, Surat Rekomendasi Kelurahan.',
                'actual_response' => 'Untuk mengurus surat tidak mampu, Anda butuh NIK, KTP, surat pengantar dari RT, dan juga rekomendasi kelurahan.',
            ],
            [
                'pertanyaan' => 'Bagaimana cara melapor lampu jalan mati?',
                'expected_response' => 'Laporan dapat disampaikan ke Ketua RT atau Sekretaris RT dengan menyebutkan lokasi spesifik.',
                'actual_response' => 'Silakan lapor kepada Ketua RT dengan menyertakan lokasi tiang listrik atau jalan yang lampunya padam.',
            ],
            [
                'pertanyaan' => 'Berapa lama proses pembuatan surat pengantar?',
                'expected_response' => 'Proses pembuatan surat membutuhkan waktu 1-3 hari kerja.',
                'actual_response' => 'Surat akan diproses dalam waktu satu sampai tiga hari kerja, mohon ditunggu.',
            ]
        ];

        $results = [
            'judul' => 'Pengujian Kemiripan Teks - Chatbot Asisten RT',
            'waktu_pengujian' => date('Y-m-d H:i:s'),
            'total_test' => count($testCases),
            'detail_hasil' => []
        ];

        $totalJaccard = 0;
        $totalLevenshtein = 0;

        foreach ($testCases as $case) {
            $jaccard = $this->jaccardSimilarity($case['expected_response'], $case['actual_response']);
            $levenshtein = $this->levenshteinSimilarity($case['expected_response'], $case['actual_response']);
            
            $totalJaccard += $jaccard;
            $totalLevenshtein += $levenshtein;

            $results['detail_hasil'][] = [
                'pertanyaan' => $case['pertanyaan'],
                'expected_response' => $case['expected_response'],
                'actual_response' => $case['actual_response'],
                'similarity' => [
                    'jaccard_score' => round($jaccard, 4),
                    'jaccard_percentage' => round($jaccard * 100, 2) . '%',
                    'levenshtein_score' => round($levenshtein, 4),
                    'levenshtein_percentage' => round($levenshtein * 100, 2) . '%',
                ]
            ];
        }

        $avgJaccard = $totalJaccard / count($testCases);
        $avgLevenshtein = $totalLevenshtein / count($testCases);

        $results['ringkasan'] = [
            'rata_rata_jaccard' => round($avgJaccard, 4) . ' (' . round($avgJaccard * 100, 2) . '%)',
            'rata_rata_levenshtein' => round($avgLevenshtein, 4) . ' (' . round($avgLevenshtein * 100, 2) . '%)',
        ];

        // Output ke file JSON
        $outputPath = storage_path('logs/chatbot_similarity_result.json');
        File::put($outputPath, json_encode($results, JSON_PRETTY_PRINT));

        // Pastikan file berhasil dibuat
        $this->assertFileExists($outputPath);
        
        // Output ke console agar mudah dilihat
        echo "\nTest Similarity selesai. Hasil disimpan di: {$outputPath}\n";
    }
}
