<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CategoryMotor;

class CategoryMotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = [
            ['name_category_motor' => 'Sport'],
            ['name_category_motor' => 'Matic'],
            ['name_category_motor' => 'CB'],
        ];

        foreach ($category as $categorys) {
            CategoryMotor::create($categorys);
        }
    }
}
