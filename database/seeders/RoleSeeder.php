<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = [
            ['name_role' => 'superadmin'],
            ['name_role' => 'admin'],
        ];

        foreach ($role as $roles) {
            Role::create($roles);
        }
    }
}
