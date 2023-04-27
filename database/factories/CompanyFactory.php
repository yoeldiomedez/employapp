<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'           => \App\Models\User::factory(),
            'business_name'     => Str::upper(fake()->company()),
            'ruc'               => fake()->ruc(false), 
            'address'           => Str::upper(fake()->address()), 
            'phone_or_mobile'   => fake()->unique()->randomNumber(9),
        ];
    }
}
