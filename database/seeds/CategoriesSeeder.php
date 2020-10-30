<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Carbon;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now()->toDateTimeString();

        Category::insert([
            ['name' => 'Comida Rapida', 'slug' => 'comida rapida', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Pizzas', 'slug' => 'pizzas', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Poke bowls', 'slug' => 'pokes', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Comida Clasica', 'slug' => 'classic', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Postres', 'slug' => 'postres', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Vegana', 'slug' => 'veganas', 'created_at' => $now, 'updated_at' => $now],
            ['name' => 'Polleria', 'slug' => 'pollerias', 'created_at' => $now, 'updated_at' => $now],
        ]);
    }
}
