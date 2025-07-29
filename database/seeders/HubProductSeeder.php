<?php

namespace Database\Seeders;

use App\Models\HubProduct;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HubProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HubProduct::create([
            'name' => 'Cafeteira Digital',
            'description' => 'Uma cafeteira inteligente com conectividade Wi-Fi',
            'image' => 'cafeteira.png',
        ]);

    HubProduct::create([
        'name' => 'Máquina de Snacks',
        'description' => 'Vende snacks automaticamente!',
        'image' => 'snack.png',
    ]);

    HubProduct::create([
        'name' => 'Máquina de Snacks',
        'description' => 'Vende snacks automaticamente!',
        'image' => 'snack.png',
    ]);

    HubProduct::create([
        'name' => 'Máquina de Snacks',
        'description' => 'Vende snacks automaticamente!',
        'image' => 'snack.png',
    ]);

    HubProduct::create([
        'name' => 'Máquina de Snacks',
        'description' => 'Vende snacks automaticamente!',
        'image' => 'snack.png',
    ]);

    HubProduct::create([
        'name' => 'Máquina de Snacks',
        'description' => 'Vende snacks automaticamente!',
        'image' => 'snack.png',
    ]);
    }
}
