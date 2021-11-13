<?php

namespace Database\Seeders;

use App\Models\Layanan;
use App\Models\Menu;
use App\Models\OrderMakanan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
        // OrderMakanan::factory(5)->create();
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
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
        User::create([
            'name' => 'siswa',
            'email' => 'siswa@siswa.com',
            'password' => Hash::make('password'),
            'role' => 'siswa',
        ]);

        Layanan::insert([
            [
                'kategori' => 'Instagram',
                'layanan' => 'Followers',
                'desklay' => '<li style="list-style-type: none">- masukan target username instagram tanpa @</li>
                             <li style="list-style-type: none">- max db 2000</li>
                             <li style="list-style-type: none">- on layanan 6:00 WIB - 21:00 WIB</li>
                             <li style="list-style-type: none">- proses 24 - 48 jam</li>',
                'minimal' => '100',
                'maks' => '3000',
                'harga' => '40',
                'hargaperk' => '40000',
            ],
            [
                'kategori' => 'Instagram',
                'layanan' => 'Likes',
                'desklay' => '<li style="list-style-type: none">- Proses cepat 0 - 6 jam maksimal 24 jam</li>
                             <li style="list-style-type: none">- Masukkan LINK FOTO pada kolom target</li>
                             <li style="list-style-type: none">- Akun jangan diprivate.</li>
                             <li style="list-style-type: none">- No refill No Refound</li>
                             <li style="list-style-type: none">- Tidak bisa request partial dan cancel, partial dan cancel hanya dari sistem.</li>
                             <li style="list-style-type: none">- Jika target di lock auto completed ya</li>',
                'minimal' => '100',
                'maks' => '3000',
                'harga' => '30',
                'hargaperk' => '30000',
            ],
            [
                'kategori' => 'Instagram',
                'layanan' => 'Reels',
                'desklay' => '<li style="list-style-type: none">- MASUKAN TARGET LINK REELS</li>
                             <li style="list-style-type: none">- PROSES 1 X 24 JAM</li>',
                'minimal' => '100',
                'maks' => '100000',
                'harga' => '0.45',
                'hargaperk' => '450',
            ],
            [
                'kategori' => 'Instagram',
                'layanan' => 'Views',
                'desklay' => '<li style="list-style-type: none">- PROSES 1 X 24 JAM</li>
                             <li style="list-style-type: none">- TARGET MASUKAN LINK VIDEO</li>
                             <li style="list-style-type: none">- WORLDWIDE</li>',
                'minimal' => '100',
                'maks' => '10000000',
                'harga' => '0.3',
                'hargaperk' => '300',
            ],
            [
                'kategori' => 'Instagram',
                'layanan' => 'Views',
                'desklay' => '<li style="list-style-type: none">- Masukan TARGET link instagram TV</li>
                             <li style="list-style-type: none">- Masuk Cepat</li>',
                'minimal' => '500',
                'maks' => '10000000',
                'harga' => '2',
                'hargaperk' => '2000',
            ],
            [
                'kategori' => 'Tiktok',
                'layanan' => 'Followers',
                'desklay' => '<li style="list-style-type: none">- masukan target link profile contoh: tiktok.com/@example</li>
                             <li style="list-style-type: none">- proses 1 x 24 jam</li>
                             <li style="list-style-type: none">- no refill</li>',
                'minimal' => '100',
                'maks' => '3000',
                'harga' => '65',
                'hargaperk' => '65000',
            ],
            [
                'kategori' => 'Tiktok',
                'layanan' => 'Views',
                'desklay' => '<li style="list-style-type: none">- masukan target link video tiktok</li>
                             <li style="list-style-type: none">- proses FAST/li>
                             <li style="list-style-type: none">- NO REFILL</li>',
                'minimal' => '100',
                'maks' => '100000',
                'harga' => '0.05',
                'hargaperk' => '50',
            ],
            [
                'kategori' => 'Shopee',
                'layanan' => 'Likes',
                'desklay' => '<li style="list-style-type: none">- masukan target link foto CONTOH LINK https://shopee.co.id/DIXON-~Kaos-Pria-Kerah-List-Polo-Terbaru-i.66010373.6584131982</li>
                             <li style="list-style-type: none">- proses 1 x 24 jam/li>
                             <li style="list-style-type: none">- followers bot indonesia</li>',
                'minimal' => '100',
                'maks' => '5000',
                'harga' => '8',
                'hargaperk' => '8000',
            ],
            [
                'kategori' => 'Shopee',
                'layanan' => 'Followers',
                'desklay' => '<li style="list-style-type: none">- MASUKAN TARGET USERNAME AKUN SHOPEE</li>
                             <li style="list-style-type: none">- INSTAN</li>',
                'minimal' => '100',
                'maks' => '1000',
                'harga' => '30',
                'hargaperk' => '30000',
            ],
        ]);
    }
}
