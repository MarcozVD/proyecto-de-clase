<?php

namespace Database\Factories;

use App\Models\CardItem;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CardItem>
 */
class CardItemFactory extends Factory
{
    protected $model= CardItem::class;
    
    public function definition(): array
    {
        return [
            "user_id"=>User::inRandomOrder()->first()->id,
            "product_id"=>Product::inRandomOrder()->first()->id,
            "quantituy"=>fake()->numberBetween(1,5),
        ];
    }
}
