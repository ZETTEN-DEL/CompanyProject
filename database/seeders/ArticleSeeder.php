<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{

    public function run()
    {
        $data = [
            [
                'title' => 'Seminar Artificial Intelligence',
                'author' => 'Admin',
                'content' => 'Kegiatan seminar AI untuk mahasiswa.',
                'foto' => 'seminar.jpg',
                'publish_date' => '2026-05-01'
            ],
            [
                'title' => 'Workshop Web Development',
                'author' => 'Admin',
                'content' => 'Pelatihan website modern berbasis Laravel.',
                'foto' => 'koding.png',
                'publish_date' => '2026-05-10'
            ],
            [
                'title' => 'Digital Marketing Class',
                'author' => 'Admin',
                'content' => 'Pelatihan strategi marketing digital.',
                'foto' => 'seminar.jpg',
                'publish_date' => '2026-05-20'
            ],
            [
                'title' => 'Digital HP',
                'author' => 'Admin',
                'content' => 'Pelatihan strategi.',
                'foto' => 'seminar.jpg',
                'publish_date' => '2026-05-20'
            ],
        ];

        foreach ($data as $item) {
            Article::create($item);
        }
    }
}
