<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('products')->insert([
        [
            'title' => 'Car Smartphone Mount',
            'brand' => 'TechBrand',
            'image' => '/images/product1.jpg',
            'source' => 'Amazon',
            'price' => '$19.99',
            'discount' => '5%',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'title' => 'Car Charger',
            'brand' => 'AutoTech',
            'image' => '/images/product2.jpg',
            'source' => 'Walmart',
            'price' => '$9.99',
            'discount' => '10%',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}
