<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SubCategory>
 */
class SubCategoryFactory extends Factory
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

        $subcategory_status = array('1', '2', '3');
        $key_status = array_rand($subcategory_status);
        return [
            'business_id' => $business_ids[$key_business],
            'category_id' => $category_ids[$key_category],
            'subcategory_name' => fake()->firstName(),
            'subcategory_slug' => fake()->slug(),
            'subcategory_status' => $subcategory_status[$key_status],
            'subcategory_thumbnail' => fake()->imageUrl(),
            'created_by' => $user_ids[$key_ids],
        ];
    }
}
