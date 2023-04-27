<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Degree;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Degree::create(['description' => 'DOCTORADO']);
        Degree::create(['description' => 'MAESTRIA']);
        Degree::create(['description' => 'POSTGRADO O DIPLOMADO']);
        Degree::create(['description' => 'TITULO PROFESIONAL']);
        Degree::create(['description' => 'BACHILLER']);
        Degree::create(['description' => 'ESTUDIOS TECNICOS']);
        Degree::create(['description' => 'ESTUDIOS UNIVERSITARIOS']);
        Degree::create(['description' => 'COLEGIATURA']);
        Degree::create(['description' => 'HABILITACION']);
        Degree::create(['description' => 'OTRO']);
    }
}
