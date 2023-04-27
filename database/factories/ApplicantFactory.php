<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $department_id = \App\Models\Department::inRandomOrder()->first()->id;
                    
        $province_id = \App\Models\Province::whereHas('departments', function($q) use ($department_id) { 
            $q->where('department_id', $department_id); 
        })->inRandomOrder()->first()->id;
        
        $district_id = \App\Models\District::whereHas('provinces', function($q) use ($province_id ) { 
            $q->where('province_id', $province_id); 
        })->inRandomOrder()->first()->id;

        return [
            'user_id'           => \App\Models\User::factory(), 
            'ruc'               => fake()->ruc(true),
            'cellphone_number'  => fake()->unique()->randomNumber(9),
            'marital_status'    => fake()->randomElement(['S', 'C', 'D', 'V']),
            'address'           => Str::upper(fake()->address()),
            'department_id'     => $department_id,
            'province_id'       => $province_id,
            'district_id'       => $district_id,
        ];
    }
}
