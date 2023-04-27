<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::create([
            'dni'              => '76299297',
            'name'             => 'YOEL DIOMEDEZ',
            'paternal_surname' => 'ROMERO',
            'maternal_surname' => 'ALMONTE',
            'birth_date'       => '1995-10-06',
            'gender'           => 'M',
            'email'            => 'yoeldiomedez@gmail.com',
            'password'         => bcrypt('password'),
        ]);

        $user->syncRoles([1]);
    }
}
