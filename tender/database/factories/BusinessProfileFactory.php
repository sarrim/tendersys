<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessProfile>
 */
class BusinessProfileFactory extends Factory
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

        $business_status = array('1', '2', '3');
        $key_status = array_rand($business_status);
        return [
            'user_id' => $user_ids[$key_ids],
            'business_name' => fake()->firstName() . ' ' . fake()->lastName(),
            'email_address' => fake()->unique()->safeEmail(),
            'contact_person' => fake()->name(),
            'contact_number' => fake()->phoneNumber(),
            'business_city' => fake()->city(),
            'postal_code' => fake()->postcode(),
            'business_address' => fake()->address(),
            'business_latitude' => fake()->latitude(),
            'business_longitude' => fake()->longitude(),
            'business_profile' => fake()->paragraph(),
            'business_status' => $business_status[$key_status],
            'business_logo' => fake()->imageUrl(),
        ];
    }

}
