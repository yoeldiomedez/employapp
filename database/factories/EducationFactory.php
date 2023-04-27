<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Education>
 */
class EducationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $degree_id     = \App\Models\Degree::inRandomOrder()->first()->id;
        $description   = ($degree_id == 10) ? fake()->catchPhrase() : null ;
        $has_deegre    = fake()->boolean();
        $degree_status = $has_deegre ? null : fake()->randomElement(['E', 'T', 'C']) ;
        $degree_date   = $has_deegre ? \Carbon\Carbon::now()->subYears(fake()->numberBetween(5, 10))->subMonths(fake()->numberBetween(1, 12))->subDays(fake()->numberBetween(1, 30)) : null ;
        return [
            'user_id'       => \App\Models\User::factory(), 
            'degree_id'     => $degree_id, 
            'country_id'    => \App\Models\Country::inRandomOrder()->first()->id, 
            'specialty'     => Str::upper(fake()->jobTitle()),
            'degree_date'   => $degree_date,
            'college'       => Str::upper('Universidad ' . fake()->city()),
            'city'          => Str::upper(fake()->city()),
            'degree_status' => $degree_status,
            'description'   => $description,
        ];
    }
}
