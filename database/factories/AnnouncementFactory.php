<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'company_id' => \App\Models\Company::factory(),
            'start_date' => Carbon::now(), 
            'end_date'   => Carbon::now()->addMonths(fake()->numberBetween(1, 6)), 
            'position'   => Str::upper(fake()->jobTitle()),
            'bases'      => null,
        ];
    }
}
