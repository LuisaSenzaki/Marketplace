<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Product::create([
        'name' => 'Vending Machine',
        'description' => 'Máquina automática de vendas',
        'price' => 5000,
        'image' => 'vending.png',
    ]);

    Product::create([
        'name' => 'Cafeteira Digital',
        'description' => 'Cafeteira inteligente com conectividade Wi-Fi',
        'price' => 1200,
        'image' => 'cafeteira.jpg',
    ]);

    Product::create([
        'name' => 'Vending Machine',
        'description' => 'Máquina automática de vendas',
        'price' => 5000,
        'image' => 'vending.png',
    ]);

    Product::create([
        'name' => 'Vending Machine',
        'description' => 'Máquina automática de vendas',
        'price' => 5000,
        'image' => 'vending.png',
    ]);

    Product::create([
        'name' => 'Vending Machine',
        'description' => 'Máquina automática de vendas',
        'price' => 5000,
        'image' => 'vending.png',
    ]);
    
    }

}
