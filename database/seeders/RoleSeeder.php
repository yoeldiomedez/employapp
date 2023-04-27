<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Role::create(['name' => 'ADMINISTRADOR']);
        $admin->syncPermissions([1, 2, 3, 4, 5, 6, 7, 37, 38, 40]);

        $applicant = Role::create(['name' => 'POSTULANTE']);
        $applicant->syncPermissions([
                                         8,  9, 
        10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 
        20, 21, 22, 23, 24, 25, 26, 27, 28, 29,
                        34, 35
        ]);

        $company = Role::create(['name' => 'EMPRESA']);
        $company->syncPermissions([29, 30, 31, 32, 33, 36, 39]);
    }
}
