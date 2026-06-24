<?php

namespace Database\Seeders;

use App\Models\Services;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'nama' => 'Seminar',
                'foto' => 'seminar.jpg',
                'desc' => 'Professional seminar event with expert speakers.'
            ],
            [
                'nama' => 'Music Festival',
                'foto' => 'festival.jpg',
                'desc' => 'Exciting music festival with top performers.'
            ],
            [
                'nama' => 'Workshop IT',
                'foto' => 'IT.jpg',
                'desc' => 'Hands-on IT workshop for students and professionals.'
            ],
            [
                'nama' => 'Graduation Event',
                'foto' => 'kelulusan.jpg',
                'desc' => 'Memorable graduation ceremony organization.'
            ],
        ];

        foreach ($services as $service) {
            Services::create($service);
        }
    }
}
