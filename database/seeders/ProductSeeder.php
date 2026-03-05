<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $product1 = new Product();
        $product1->name='casa';
        $product1->description="esta es la descripcion del casa ";
        $product1->price=2000;
        $product1 -> category_id=Category::inRandomOrder()->first()->id;

        $product1->save();

        $product2 = new Product();
        $product2->name='apt';
        $product2->description="esta es la descripcion del apt ";
        $product2->price=2000;
        $product2 -> category_id=Category::inRandomOrder()->first()->id;

        $product2->save();
    }
}
