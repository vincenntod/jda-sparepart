<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $supplier = [
            ['name_supplier' => 'PT. Mencari Cinta Sejati'],
            ['name_supplier' => 'PT. Ura Eru'],
            ['name_supplier' => 'PT. Indobangsatkom'],
            ['name_supplier' => 'PT. Alul'],
        ];

        foreach ($supplier as $suppliers) {
            Supplier::create($suppliers);
        }
    }
}
