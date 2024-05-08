<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brand = [
            ['name_brand' => 'Yameyameha'],
            ['name_brand' => 'Hondu'],
            ['name_brand' => 'Kawasatki'],
            ['name_brand' => 'Sujuki'],
        ];

        foreach ($brand as $brands) {
            Brand::create($brands);
        }
    }
}
