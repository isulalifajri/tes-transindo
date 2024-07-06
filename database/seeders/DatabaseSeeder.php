<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test customer',
            'role' => 'customer',
            'password' => 'customer',
            'no_telepon' => '0812216543213',
            'email' => 'customer@example.com',
            'alamat' => 'address customer',
            'description' => 'tes customer description',
        ]);
        \App\Models\User::factory()->create([
            'name' => 'Test merchant',
            'password' => 'merchant',
            'role' => 'merchant',
            'no_telepon' => '0812213265463',
            'email' => 'merchant@example.com',
            'alamat' => 'address merchant',
            'description' => 'tes merchant description',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $mt = ['makanan', 'minuman'];
        foreach($mt as $c){
            Category::create([
                'name' => $c,
            ]);
        }

        Product::factory(10)->create();
    }
}
