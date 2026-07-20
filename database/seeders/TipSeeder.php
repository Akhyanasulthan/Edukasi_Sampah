<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Tip;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tips = [
            [
                'title' => 'Pisahkan Dua Saja Dulu: Organik vs Anorganik',
                'content' => '
<h2>Mulai dari Langkah yang Sederhana!</h2>
<p>Memulai kebiasaan memilah sampah terkadang terasa berat jika langsung terlalu rumit. Oleh karena itu, mari kita mulai dari langkah yang paling mudah: <strong>Pisahkan jadi dua saja!</strong></p>

<h3>🛠️ Cara Mudah Memulainya di Rumah:</h3>
<ul>
    <li><strong>Siapkan dua tempat sampah berbeda.</strong> Anda bisa menggunakan ember bekas atau kardus yang dilapisi plastik pelindung.</li>
    <li><strong>Tempat Sampah 1 (Khusus Organik):</strong> Gunakan ini HANYA untuk sisa-sisa makanan, kulit buah, tulang ikan, nasi sisa, dan dedaunan.</li>
    <li><strong>Tempat Sampah 2 (Khusus Anorganik):</strong> Gunakan ini untuk membuang bungkus makanan ringan (plastik kemasan), botol minum, kardus, kaleng, dan kertas.</li>
</ul>

<h3>🤔 Kenapa Harus Dipisah?</h3>
<p>Jika sampah sisa makanan bercampur dengan plastik atau kertas, sampah plastiknya akan menjadi kotor, bau, dan <strong>sangat sulit untuk didaur ulang</strong>. Dengan memisahkannya, sampah organik bisa membusuk jadi pupuk alami, dan sampah plastiknya tetap bersih sehingga bisa disetorkan ke bank sampah!</p>
                ',
            ],
            [
                'title' => 'Remas Botol Plastikmu!',
                'content' => '
<h2>Hemat Ruang Tempat Sampahmu!</h2>
<p>Sering kesal karena tempat sampah di rumah atau di posko cepat penuh? Padahal isinya cuma botol-botol minuman kosong yang memakan banyak ruang!</p>

<p>Ada satu <strong>life hack</strong> sederhana yang wajib banget kamu biasakan: <strong>Remas botol plastik sebelum membuangnya!</strong></p>

<h3>✅ Langkah-langkahnya:</h3>
<ol>
    <li>Buka tutup botol minuman kemasanmu.</li>
    <li>Bilas sebentar dengan sedikit air (jika itu minuman manis) agar tidak dikerubungi semut.</li>
    <li><strong>Remas, injak, atau pipihkan botol</strong> dari tengah hingga sekecil mungkin.</li>
    <li>Tutup kembali rapat-rapat (agar udara tidak masuk dan botol tidak mengembang lagi).</li>
    <li>Buang ke tempat sampah anorganik.</li>
</ol>

<p>Dengan melakukan hal sederhana ini, tempat sampahmu bisa menampung <strong>3 hingga 5 kali lipat lebih banyak botol!</strong> Tukang sampah atau pengelola bank sampah juga akan lebih mudah saat membawanya.</p>
                ',
            ],
            [
                'title' => 'Sulap Sisa Makanan Jadi Pakan Ternak',
                'content' => '
<h2>Solusi Mudah untuk Sisa Makanan</h2>
<p>Tahukah kamu bahwa sisa makanan adalah penyumbang sampah terbanyak di Indonesia? Kalau dibuang begitu saja, ia akan membusuk dan menghasilkan gas metana yang berbahaya bagi bumi.</p>

<p>Tapi tenang, buat kita yang tinggal di desa, ada solusi yang sangat menguntungkan: <strong>Jadikan pakan ternak!</strong></p>

<h3>🐔 Bagaimana caranya?</h3>
<ul>
    <li><strong>Jangan dicampur:</strong> Pastikan sisa nasi, sayur, atau lauk tidak bercampur dengan tusuk sate, karet gelang, atau plastik.</li>
    <li><strong>Kumpulkan di wadah tertutup:</strong> Simpan sisa makanan (yang tidak basi parah) di dalam ember kecil tertutup agar tidak mengundang lalat.</li>
    <li><strong>Berikan pada hewan ternak:</strong> Sisa makanan ini sangat disukai oleh ayam, bebek, mentok, hingga ikan lele.</li>
</ul>

<p>Jika kamu tidak punya hewan ternak sendiri, berikan saja secara rutin kepada tetanggamu yang memelihara ayam/lele. Dijamin mereka akan sangat berterima kasih, dan sampah organik di rumahmu pun hilang tanpa jejak!</p>
                ',
            ],
            [
                'title' => 'Nongkrong Lebih Keren Bawa Tumbler',
                'content' => '
<h2>Ubah Gaya Nongkrongmu!</h2>
<p>Anak muda zaman sekarang sering banget kumpul-kumpul, entah itu rapat Karang Taruna, nonton voli di lapangan, atau sekadar nongkrong di pos ronda. Masalahnya, kegiatan ini sering menyisakan gunungan sampah gelas plastik.</p>

<p>Yuk, mulai ubah gaya hidupmu! <strong>Membawa tumbler (botol minum) sendiri itu jauh lebih keren dan cerdas.</strong></p>

<h3>💧 Keuntungannya bawa tumbler:</h3>
<ol>
    <li><strong>Lebih Hemat:</strong> Kamu tidak perlu bolak-balik mengeluarkan uang hanya untuk membeli air kemasan.</li>
    <li><strong>Air Tetap Dingin:</strong> Kalau pakai tumbler tahan suhu, es batumu bisa awet seharian meski cuaca lagi terik.</li>
    <li><strong>Menyelamatkan Lingkungan:</strong> Bayangkan jika 20 pemuda desa semuanya pakai tumbler, desa kita sudah terbebas dari 20 botol plastik sekali pakai setiap harinya!</li>
</ol>
                ',
            ]
        ];

        // Kosongkan tabel dulu agar tidak duplikat jika dijalankan berulang
        Tip::truncate();

        foreach ($tips as $tip) {
            Tip::create([
                'title' => $tip['title'],
                'slug' => Str::slug($tip['title']),
                'content' => trim($tip['content']),
                'is_published' => true,
            ]);
        }
    }
}
