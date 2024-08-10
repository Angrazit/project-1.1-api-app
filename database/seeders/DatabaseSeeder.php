<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $products = [
            [
                'name' => 'Apple',
                'price' => '1000',
                'stock' => '100',
            ],
            [
                'name' => 'Banana',
                'price' => '2000',
                'stock' => '100',
            ],
            [
                'name' => 'Cherry',
                'price' => '3000',
                'stock' => '100',
            ],
            [
                'name' => 'Mango',
                'price' => '4000',
                'stock' => '100',
            ],
            [
                'name' => 'Elderberry',
                'price' => '5000',
                'stock' => '100',
            ],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
