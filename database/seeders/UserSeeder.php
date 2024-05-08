<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = [
            ['name' => 'superadmin', 'email' => 'superadmin@email.com','role_id'=>1, 'password' => bcrypt('123456')],
            ['name' => 'admin', 'email' => 'admin@email.com','role_id'=>2, 'password' => bcrypt('123456')],
        ];

        foreach ($user as $users) {
            User::create($users);
        }
    }
}
