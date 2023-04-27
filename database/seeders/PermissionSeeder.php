<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usuarios
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.destroy']);

        // Roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.destroy']);

        // Postulantes
        Permission::create(['name' => 'applicants.edit']);
        Permission::create(['name' => 'applicants.destroy']);

        // Departamentos
        Permission::create(['name' => 'departments.index']);
        Permission::create(['name' => 'departments.show']);

        // Provincias
        Permission::create(['name' => 'provinces.show']);

        // Paises
        Permission::create(['name' => 'countries.index']);

        // Grados o Titulos
        Permission::create(['name' => 'degrees.index']);

        // Estudios
        Permission::create(['name' => 'education.index']);
        Permission::create(['name' => 'education.create']);
        Permission::create(['name' => 'education.edit']);
        Permission::create(['name' => 'education.destroy']);

        // Capacitación
        Permission::create(['name' => 'trainings.index']);
        Permission::create(['name' => 'trainings.create']);
        Permission::create(['name' => 'trainings.edit']);
        Permission::create(['name' => 'trainings.destroy']);

        // Experiencia
        Permission::create(['name' => 'experiences.index']);
        Permission::create(['name' => 'experiences.create']);
        Permission::create(['name' => 'experiences.edit']);
        Permission::create(['name' => 'experiences.destroy']);

        // Documentos
        Permission::create(['name' => 'documents.edit']);
        Permission::create(['name' => 'documents.destroy']);

        // Convocatorias
        Permission::create(['name' => 'announcements.index']);
        Permission::create(['name' => 'announcements.create']);
        Permission::create(['name' => 'announcements.edit']);
        Permission::create(['name' => 'announcements.destroy']);
        Permission::create(['name' => 'announcements.select']);
        Permission::create(['name' => 'announcements.apply']);

        // Historial
        Permission::create(['name' => 'records.index']);
        Permission::create(['name' => 'records.show']);

        // Empresas
        Permission::create(['name' => 'business.index']);
        Permission::create(['name' => 'business.create']);
        Permission::create(['name' => 'business.edit']);
        Permission::create(['name' => 'business.destroy']);
    }
}
