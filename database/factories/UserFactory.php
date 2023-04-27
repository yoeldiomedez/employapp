<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = fake()->randomElement(['M', 'F']);
        $name   = ($gender == 'M') ? fake()->firstNameMale() : fake()->firstNameFemale() ;

        return [
            
            'dni'               => fake()->dni(),
            'name'              => Str::upper($name),
            'paternal_surname'  => Str::upper(fake()->lastName()),
            'maternal_surname'  => Str::upper(fake()->lastName()),
            'birth_date'        => \Carbon\Carbon::now()->subYears(fake()->numberBetween(18, 50))
                                                        ->subMonths(fake()->numberBetween(1, 12))
                                                        ->subDays(fake()->numberBetween(1, 30)),
            'gender'            => $gender,
            'email'             => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password'          => bcrypt('password'),
            'remember_token'    => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
