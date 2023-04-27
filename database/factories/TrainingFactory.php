<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start_date = Carbon::now()->subYears(fake()->numberBetween(1, 10))->subMonths(fake()->numberBetween(1, 12))->subDays(fake()->numberBetween(1, 30));
        $end_date   = Carbon::parse($start_date)->addMonths(fake()->numberBetween(1, 12));
        $hours      = $start_date->diffInHours($end_date);
        return [
            'user_id'     => \App\Models\User::factory(), 
            'country_id'  => \App\Models\Country::inRandomOrder()->first()->id, 
            'description' => Str::upper(fake()->jobTitle()),
            'start_date'  => $start_date,
            'end_date'    => $end_date,
            'institution' => Str::upper(fake()->company()),
            'city'        => Str::upper(fake()->city()),
            'hours'       => $hours,
        ];
    }
}
