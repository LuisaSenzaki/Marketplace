<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;                 // <— importa o Model certo
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
        ['email' => 'lsenzaki@tv1.com.br'],
        [
            'name' => 'Luisa Senzaki',
            'password' => Hash::make('Abc234$'),
            'is_admin' => true,
        ]
    );
    }
}
