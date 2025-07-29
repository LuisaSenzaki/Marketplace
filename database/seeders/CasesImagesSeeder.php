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
            'name' => 'Vending Machine',
            'image' => 'vending.png',
        ]);
    }
}