<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

use CodeIgniter\I18n\Time;

class BookSeeder extends Seeder
{
    public function run()
    {
        $databook = [
            [
                'sampul' => 'naruto.jpeg',
                'judul' => 'Naruto',
                'slug' => 'naruto',
                'penulis' => 'Masashi Kishimoto',
                'penerbit' => 'Shonen Jump',
                'harga' => '50000',
                'deskripsi' => 'Cerita tentang awal mula pertualangan Naruto menjadi ninja di desa konoha',
                'stok' => '50',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'sampul' => 'conan.jpeg',
                'judul' => 'Detektif Conan',
                'slug' => 'detektif-conan',
                'penulis' => 'Gosho Aoyama',
                'penerbit' => 'Gramedia',
                'harga' => '65000',
                'deskripsi' => 'Cerita tentang detektif Conan yang menjadi bocah karena diracuni obat oleh penjahat',
                'stok' => '60',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'sampul' => 'xmen.jpeg',
                'judul' => 'X-MEN',
                'slug' => 'x-men',
                'penulis' => 'Jack Kirby',
                'penerbit' => 'Gramedia',
                'harga' => '60000',
                'deskripsi' => 'Cerita tentang mutan, subspesies manusia yang terlahir dengan kemampuan manusia super',
                'stok' => '40',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        // Using Query Builder
        $this->db->table('books')->insertBatch($databook);


        $datauser = [
            'username' => 'admin',
            'password'    => 'admin',
        ];

        // Using Query Builder
        $this->db->table('users')->insert($datauser);
    }
}
