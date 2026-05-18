<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Equipment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 1. Créer l'Admin
        User::create([
            'name' => 'Admin Pro',
            'email' => 'admin@exemple.com', // <--- METS TON EMAIL ICI
            'password' => Hash::make('password123'), // <--- METS TON MOT DE PASSE
            'role' => 'admin',
        ]);

        // 2. Créer les Catégories
        Category::insert([['label' => 'Logiciel'], ['label' => 'Matériel'], ['label' => 'Réseau']]);

        // 3. Créer les Équipements
        Equipment::insert([['name' => 'PC Dell'], ['name' => 'Imprimante HP']]);
    }
}