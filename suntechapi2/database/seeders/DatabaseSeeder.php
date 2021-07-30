<?php

namespace Database\Seeders;

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
        // \App\Models\User::create(['name' => 'Super Admin', 'email' => 'admin@demo.in', 'password' => bcrypt('123456') ]);
        // \App\Models\User::create(['name' => 'Linh', 'email' => 'linh@gmail.com', 'password' => bcrypt('123') ]);
        \App\Models\Product::create(['name' => 'Asus Cực rẻ', 
                                    'description' => 'SSD: 150gb',
                                    'price' => 15000000,
                                    'images' => 'https://philong.com.vn/media/product/250-24445-11.jpg',
                                    'category_id' => 3                            

        ]);

    }
}
