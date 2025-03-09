<?php

namespace Database\Seeders;

use App\Models\TipePenjualanModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipePenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipePenjualanModel::create([
            'nama_penjualan' => 'Regular'
        ]);
        TipePenjualanModel::create([
            'nama_penjualan' => 'Danusan'
        ]);
    }
}
