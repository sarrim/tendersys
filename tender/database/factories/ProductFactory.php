<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_ids = array_rand($user_ids);

        $business_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_business = array_rand($business_ids);

        $category_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_category = array_rand($category_ids);

        $subcategory_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_subcategory = array_rand($subcategory_ids);

        $product_status = array('1', '2', '3');
        $key_status = array_rand($product_status);

        return [
            'business_id' => $business_ids[$key_business],
            'category_id' => $category_ids[$key_category],
            'subcategory_id' => $subcategory_ids[$key_subcategory],
            'product_title' => fake()->name(),
            'product_slug' => fake()->slug(),
            'product_price' => fake()->numerify(),
            'inventory_stock' => fake()->name(),
            'product_slug' => fake()->slug(),
            'product_slug' => fake()->slug(),
            'product_status' => $product_status[$key_status],
            'product_thumbnail' => fake()->imageUrl(),
            'created_by' => $user_ids[$key_ids],
        ];
    }
}
