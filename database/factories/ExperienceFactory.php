<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Experience>
 */
class ExperienceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = Carbon::now()->subYears(fake()->numberBetween(1, 10))->subMonths(fake()->numberBetween(1, 12))->subDays(fake()->numberBetween(1, 30));
        $end_date   = Carbon::parse($start_date)->addYears(fake()->numberBetween(1, 5));
        
        return [
            'user_id'     => \App\Models\User::factory(), 
            'company'     => Str::upper(fake()->company()), 
            'position'    => Str::upper(fake()->jobTitle()),
            'start_date'  => $start_date,
            'end_date'    => Carbon::now()->gt($end_date) ? null : $end_date,
            'description' => Str::upper(fake()->text()),
        ];
    }
}
