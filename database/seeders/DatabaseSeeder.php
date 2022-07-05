<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\User;
use App\Models\Soal;
use App\Models\MataPelajaran;
use App\Models\Jurusan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $token = bin2hex(random_bytes(5));
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Produk::create([
            'nama_produk' => 'Charger Realme',
            'kategori_id' => 1,
            'deskripsi' => 'Charger Realme dengan kualitas terbaik',
            'harga' => 90000,
            'stok' => 10,
            'terjual' => 0,
            'gambar' => 'charger realme.jpg',
        ]);
        Produk::create([
            'nama_produk' => 'Keyboard',
            'kategori_id' => 1,
            'deskripsi' => 'Keyboard dengan kualitas terbaik',
            'harga' => 100000,
            'stok' => 10,
            'terjual' => 0,
            'gambar' => 'keyboard.jpg',
        ]);
        Produk::create([
            'nama_produk' => 'Mouse',
            'kategori_id' => 1,
            'deskripsi' => 'Mouse dengan kualitas terbaik',
            'harga' => 95000,
            'stok' => 10,
            'terjual' => 0,
            'gambar' => 'mouse.jpg',
        ]);
        Produk::create([
            'nama_produk' => 'Charger Laptop',
            'kategori_id' => 1,
            'deskripsi' => 'Charger Realme dengan kualitas terbaik',
            'harga' => 90000,
            'stok' => 10,
            'terjual' => 0,
            'gambar' => 'charger laptop.jpg',
        ]);

        User::create([
            'nama_lengkap' => "Reza",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'reza@gmail.com',
            'password' => bcrypt('123'),
            'level' => 2
        ]);

        User::create([
            'nama_lengkap' => "Admin",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
            'level' => 1
        ]);

        //Kuis
        User::create([
            'nama_lengkap' => "Reza",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'reza_kuis@gmail.com',
            'nis' => '120.2020.100',
            'kuis' => 1,
            'password' => bcrypt('123'),
            'level' => 1
        ]);

        User::create([
            'nama_lengkap' => "Reza",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'dimas_kuis@gmail.com',
            'nis' => '120.2020.101',
            'kuis' => 1,
            'password' => bcrypt('123'),
            'level' => 1
        ]);

        User::create([
            'nama_lengkap' => "Mulayana Santoso, S.Pd",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'guru_kuis@gmail.com',
            'nis' => '121.2020.101',
            'guru' => 1,
            'password' => bcrypt('123'),
            'level' => 1
        ]);

        //operator
        User::create([
            'nama_lengkap' => "Operator",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'operator_kuis@gmail.com',
            'nis' => '121.2020.101',
            'password' => bcrypt('123'),
            'level' => 1,
            'operator' => 1,
        ]);

        User::create([
            'nama_lengkap' => "Reza Khoirul, S.Pd",
            'no_hp' => '02930293023',
            'alamat_lengkap' => 'Cikampek',
            'email' => 'guru_kuis1@gmail.com',
            'nis' => '121.2020.102',
            'guru' => 1,
            'password' => bcrypt('123'),
            'level' => 1
        ]);

        Soal::create([
            'soal' => 'Siapakah reza sebenarnya ?',
            'token' => $token,
            'a' => 'Seseorang yang ingin menjadi programmer',
            'b' => 'Seseorang yang merokok',
            'c' => 'Seseorang yang mudah mabok',
            'd' => 'Seseorang yang tidak berbakat',
            'benar' => 'a',
            'guru_id' => 1,
        ]);

        Soal::create([
            'soal' => 'Siapakah nama orang tua reza sebenarnya ?',
            'token' => $token,
            'a' => 'Zulaikah',
            'b' => 'Jono',
            'c' => 'Joko',
            'd' => 'Semua salah',
            'benar' => 'a',
            'guru_id' => 1,
        ]);

        // Mata Pelajaran
        // MataPelajaran::create(['mata_pelajaran' => 'PKN']);
        // MataPelajaran::create(['mata_pelajaran' => 'MTK']);
        // MataPelajaran::create(['mata_pelajaran' => 'PAI']);

        //Jurusan
        Jurusan::create(['nama_jurusan' => 'RPL']);
        Jurusan::create(['nama_jurusan' => 'OTKP']);
        Jurusan::create(['nama_jurusan' => 'TKR']);
    }
}
