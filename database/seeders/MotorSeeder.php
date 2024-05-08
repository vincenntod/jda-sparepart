<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Motor;

class MotorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $motors = [
            ['name_motor' => 'Hondu CBR', 'year_production' => '2024', 'id_brand' => 1, 'id_sparepart' => 1, 'id_category_motor' => 1],
            ['name_motor' => 'Yameyameha MT15', 'year_production' => '2024', 'id_brand' => 2, 'id_sparepart' => 1, 'id_category_motor' => 2],
            ['name_motor' => 'Kawasatki ZX25', 'year_production' => '2024', 'id_brand' => 1, 'id_sparepart' => 1, 'id_category_motor' => 1],
            ['name_motor' => 'Sujuki GSX', 'year_production' => '2024', 'id_brand' => 1, 'id_sparepart' => 1, 'id_category_motor' => 1],
        ];

        foreach ($motors as $motor) {
            Motor::create($motor);
        }
    }
}
