<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\OrderMakanan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        OrderMakanan::factory(5)->create();
        Menu::create([
            'menu' => 'Cofee Beer',
            'harga' => '12000',
            'kategori' => 'Minuman'
        ]);
        Menu::create([
            'menu' => 'Sarsaparila',
            'harga' => '12000',
            'kategori' => 'Minuman'
        ]);
        Menu::create([
            'menu' => 'Temulawak',
            'harga' => '12000',
            'kategori' => 'Minuman'
        ]);
        Menu::create([
            'menu' => 'Kebab',
            'harga' => '10000',
            'kategori' => 'Makanan'
        ]);
        Menu::create([
            'menu' => 'Seblak',
            'harga' => '10000',
            'kategori' => 'Makanan'
        ]);
        Menu::create([
            'menu' => 'Burger',
            'harga' => '7000',
            'kategori' => 'Makanan'
        ]);
        Menu::create([
            'menu' => 'Ayam Bakar',
            'harga' => '15000',
            'kategori' => 'Makanan'
        ]);
        Menu::create([
            'menu' => 'Dimsum',
            'harga' => '12000',
            'kategori' => 'Makanan'
        ]);
        Menu::create([
            'menu' => 'Nasi',
            'harga' => '5000',
            'kategori' => 'Makanan'
        ]);
    }
}
