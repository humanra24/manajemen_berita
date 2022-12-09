<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Menu;
use App\Models\User;
use Ramsey\Uuid\Uuid;
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
        User::create([
            'user_id' => Uuid::uuid4()->getHex(),
            'username' => 'admin',
            'password' => Hash::make('admin'),
        ]);

        $menu = [
            [
                'menu_id'       => Uuid::uuid4()->getHex(),
                'menu_label'    => 'Dashboard',
                'url'           => '/',
                'number'        => 1
            ],
            [
                'menu_id'       => Uuid::uuid4()->getHex(),
                'menu_label'    => 'Berita',
                'url'           => '/berita',
                'number'        => 2
            ],
            [
                'menu_id'       => Uuid::uuid4()->getHex(),
                'menu_label'    => 'Kategori',
                'url'           => '/kategori',
                'number'        => 3
            ],
            [
                'menu_id'       => Uuid::uuid4()->getHex(),
                'menu_label'    => 'User',
                'url'           => '/user',
                'number'        => 4
            ],
        ];
        Menu::insert($menu);
    }
}
