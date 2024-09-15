<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OatLokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_oat')->insert([
            [
                'name' => 'Jakarta',
                'price' => 250000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Malang',
                'price' => 500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Semarang',
                'price' => 450000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
