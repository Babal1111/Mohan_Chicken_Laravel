<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu_items')->insert([
            [
                'name' => 'Tandoori Chicken',
                // 'description' => 'Spicy grilled chicken marinated in yogurt and spices.',
                'price' => 299.00,
                'image_path' => 'menu/tandoori_chicken.jpg',
                // 'category_id' => 1, // Adjust this to match your categories
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Butter Chicken',
                // 'description' => 'Creamy tomato-based curry with tender chicken pieces.',
                'price' => 349.00,
                'image_path' => 'menu/butter_chicken.jpg',
                // 'category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chicken Biryani',
                // 'description' => 'Aromatic basmati rice cooked with chicken and spices.',
                'price' => 249.00,
                'image_path' => 'menu/chicken_biryani.jpg',
                // 'category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
