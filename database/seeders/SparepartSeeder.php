<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sparepart;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = [
            ['id_supplier' => 1,'price' => 50000,'name_sparepart' => 'Filter CVT'],
            ['id_supplier' => 2,'price' => 120000,'name_sparepart' => 'Belt'],
            ['id_supplier' => 2,'price' => 10000,'name_sparepart' => 'Klep'],
        ];

        foreach ($supplier as $suppliers) {
            Sparepart::create($suppliers);
        }
    }
}
