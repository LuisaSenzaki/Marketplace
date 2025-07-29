<?php

namespace Database\Seeders;

use App\Models\CasesImages;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CasesImagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CasesImages::create([
            'name' => 'CCXP 24',
            'image' => 'vending.png',
        ]);

        CasesImages::create([
            'name' => 'VIVO 2024',
            'image' => 'vending.png',
        ]);

        CasesImages::create([
            'name' => 'CCXP 24',
            'image' => 'vending.png',
        ]);

        CasesImages::create([
            'name' => 'CCXP 24',
            'image' => 'vending.png',
        ]);
    }
}