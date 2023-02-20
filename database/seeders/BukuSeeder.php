<?php

namespace Database\Seeders;

use App\Models\Buku;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Buku::create([
            'judul' => 'Restless',
            'kategori_id' => 2,
            'penerbit_id' => 2,
            'tahun_terbit' => '2019',
            'isbn' => '9786026193032',
            'photo' => '/img/restless.png',
            'pengarang' => 'Ahmad Mahdi',
            'j_buku_baik' => 18,
            'j_buku_buruk' => 2
        ]);

        Buku::create([
            'judul' => 'Bahasa Inggris',
            'kategori_id' => 4,
            'penerbit_id' => 1,
            'tahun_terbit' => '2006',
            'isbn' => '9786012313032',
            'photo' => '/img/bhs-inggris.png',
            'pengarang' => 'Penulis',
            'j_buku_baik' => 28,
            'j_buku_buruk' => 2
        ]);

        Buku::create([
            'judul' => 'Matematika',
            'kategori_id' => 4,
            'penerbit_id' => 1,
            'tahun_terbit' => '2006',
            'isbn' => '97860312313032',
            'photo' => '/img/matematika.png',
            'pengarang' => 'Penulis',
            'j_buku_baik' => 30,
            'j_buku_buruk' => 0
        ]);

        Buku::create([
            'judul' => 'Fisika',
            'kategori_id' => 4,
            'penerbit_id' => 1,
            'tahun_terbit' => '2006',
            'isbn' => '9782312313032',
            'photo' => '/img/fisika.png',
            'pengarang' => 'Penulis',
            'j_buku_baik' => 27,
            'j_buku_buruk' => 3
        ]);

        Buku::create([
            'judul' => 'Kimia',
            'kategori_id' => 4,
            'penerbit_id' => 1,
            'tahun_terbit' => '2006',
            'isbn' => '9782339133032',
            'photo' => '/img/kimia.png',
            'pengarang' => 'Penulis',
            'j_buku_baik' => 27,
            'j_buku_buruk' => 3
        ]);
    }
}
