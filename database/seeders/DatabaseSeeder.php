<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB :: table('products') -> insert([
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Laptop',
                'description' => 'Laptop Asus',
                'price' => '800000',
                'stock' => '10',
                'image' => 'asus-laptop.jpg',
            ],
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Mouse',
                'description' => 'Mouse Logitech',
                'price' => '100000',
                'stock' => '50',
                'image' => 'logitech-mouse.jpg',
            ],
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Keyboard',
                'description' => 'Keyboard Razer',
                'price' => '200000',
                'stock' => '20',
                'image' => 'razer-keyboard.jpg',
            ],
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Monitor',
                'description' => 'Monitor Samsung',
                'price' => '500000',
                'stock' => '15',
                'image' => 'samsung-monitor.jpg',
            ],
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Headset',
                'description' => 'Headset Sony',
                'price' => '300000',
                'stock' => '30',
                'image' => 'sony-headset.jpg',
            ],
            [
                'product_id' => random_int(100000,999999),
                'name' => 'Smartphone',
                'description' => 'Smartphone Xiaomi',
                'price' => '1500000',
                'stock' => '5',
                'image' => 'xiaomi-smartphone.jpg',
            ],
            
        ]);
    }
}
