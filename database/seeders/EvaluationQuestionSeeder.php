<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EvaluationQuestion;

class EvaluationQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $questions = [
            [
                'question' => 'Nama Lengkap',
                'type' => 'text',
                'options' => null,
                'order_column' => 1,
            ],
            [
                'question' => 'Usia',
                'type' => 'number',
                'options' => null,
                'order_column' => 2,
            ],
            [
                'question' => 'Asal Instansi/Kelas (Opsional)',
                'type' => 'text',
                'options' => null,
                'order_column' => 3,
            ],
            [
                'question' => 'Apakah materi edukasi yang disampaikan mudah dipahami?',
                'type' => 'radio',
                'options' => ['Sangat Mudah', 'Mudah', 'Cukup', 'Sulit'],
                'order_column' => 4,
            ],
            [
                'question' => 'Apakah pemahamanmu mengenai pengelolaan sampah meningkat?',
                'type' => 'radio',
                'options' => ['Ya', 'Cukup', 'Belum'],
                'order_column' => 5,
            ],
            [
                'question' => 'Seberapa besar niatmu untuk mulai memilah sampah setelah ini?',
                'type' => 'radio',
                'options' => ['Ya', 'Mungkin', 'Belum'],
                'order_column' => 6,
            ],
            [
                'question' => 'Seberapa sering kamu membuang sampah pada tempatnya di sekolah/rumah?',
                'type' => 'radio',
                'options' => ['Selalu', 'Sering', 'Kadang-kadang', 'Jarang', 'Tidak Pernah'],
                'order_column' => 7,
            ],
            [
                'question' => 'Apakah kamu sudah bisa membedakan sampah organik dan anorganik dengan benar?',
                'type' => 'radio',
                'options' => ['Ya sudah paham', 'Masih bingung', 'Belum bisa'],
                'order_column' => 8,
            ],
            [
                'question' => 'Jenis materi edukasi apa yang paling kamu sukai di website ini?',
                'type' => 'radio',
                'options' => ['Video Edukasi', 'Artikel Teks', 'Gambar/Galeri', 'Tips Singkat'],
                'order_column' => 9,
            ],
            [
                'question' => 'Apakah menurutmu fasilitas tempat sampah di sekitarmu sudah memadai?',
                'type' => 'radio',
                'options' => ['Sangat Memadai', 'Cukup', 'Kurang Memadai'],
                'order_column' => 10,
            ],
            [
                'question' => 'Seberapa besar kemungkinan kamu mengajak temanmu untuk ikut peduli lingkungan?',
                'type' => 'radio',
                'options' => ['Sangat Mungkin', 'Mungkin', 'Kurang Mungkin'],
                'order_column' => 11,
            ],
            [
                'question' => 'Apa pendapatmu tentang tampilan dan isi dari *website* ini?',
                'type' => 'textarea',
                'options' => null,
                'order_column' => 12,
            ],
            [
                'question' => 'Ada saran kegiatan atau materi seru untuk edukasi berikutnya?',
                'type' => 'textarea',
                'options' => null,
                'order_column' => 13,
            ]
        ];

        foreach ($questions as $q) {
            EvaluationQuestion::create($q);
        }
    }
}
