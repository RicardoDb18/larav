<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = range(1, 30);

        // laptops
        foreach($count as $i) {
            Product::create([
                'name' => "Comida rapida nro $i",
                'slug' => "comida-nro-$i",
                'details' => 'detalles',
                'price' => rand(9.90, 32.90),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(1);
        }

        // Make Laptop 1 a Desktop as well. Just to test multiple categories
        $product = Product::find(1);
        $product->categories()->attach(2);

        // desktops
        foreach($count as $i) {
            Product::create([
                'name' => "Pizza $i",
                'slug' => "pizza-nro-$i",
                'details' => 'detalles',
                'price' => rand(9.90, 38.90),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(2);
        }

        // Phones
        foreach($count as $i) {
            Product::create([
                'name' => "Poke $i",
                'slug' => "poke-nro-$i",
                'details' => 'detalles',
                'price' => rand(14, 34),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(3);
        }

        // Tablets
        foreach($count as $i) {
            Product::create([
                'name' => "Comida Clasica $i",
                'slug' => "classic-nro-$i",
                'details' => 'detalles',
                'price' => rand(11, 44),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(4);
        }

        // TVs
        foreach($count as $i) {
            Product::create([
                'name' => "Vegana $i",
                'slug' => "vegan-nro-$i",
                'details' => 'detalles',
                'price' => rand(14, 24),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(5);
        }

        // Cameras
        foreach($count as $i) {
            Product::create([
                'name' => "Postre $i",
                'slug' => "Postre-nro-$i",
                'details' => 'detalles',
                'price' => rand(9, 24),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(6);
        }

        // Appliances
        foreach($count as $i) {
            Product::create([
                'name' => "Polleria $i",
                'slug' => "polleria-nro-$i",
                'details' => 'detalles',
                'price' => rand(14, 59),
                'description' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum temporibus iusto ipsa, asperiores voluptas unde aspernatur praesentium in? Aliquam, dolore!',
            ])->categories()->attach(7);
        }

        // Select random entries to be featured
        Product::whereIn('id', [1, 12, 22, 31, 41, 43, 47, 51, 53,61, 69, 73, 80])->update(['featured' => true]);
    }
}
