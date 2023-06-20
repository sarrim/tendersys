<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{

    public function definition()
    {
        $user_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_ids = array_rand($user_ids);

        $business_ids = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10');
        $key_business = array_rand($business_ids);

        $category_status = array('1', '2', '3');
        $key_status = array_rand($category_status);
        return [
            'business_id' => $business_ids[$key_business],
            'category_name' => fake()->firstName(),
            'category_slug' => fake()->slug(),
            'category_status' => $category_status[$key_status],
            'category_thumbnail' => fake()->imageUrl(),
            'created_by' => $user_ids[$key_ids],
        ];
    }
}
