<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductVariant>
 */
class ProductVariantFactory extends Factory
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

        $product_id = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_id = array_rand($product_id);

        $variant_status = array('1', '2', '3');
        $key_status = array_rand($variant_status);

        return [
            'product_id' => $product_id[$key_id],
            'variant_type' => fake()->name(),
            'variant_value' => fake()->name(),
            'variant_price' => fake()->numerify(),
            'variant_slug' => fake()->slug(),
            'variant_image' => fake()->slug(),
            'variant_status' => $variant_status[$key_status],
            'created_by' => $user_ids[$key_ids],
        ];
    }
}
