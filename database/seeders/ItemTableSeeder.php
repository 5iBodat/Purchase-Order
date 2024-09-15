<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_item')->insert([
            [
                'item_name' => 'Bio Solar',
                'item_description' => 'Bahan Bakar Solar dari Pertamina',
                'item_price' => 10000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'item_name' => 'Pertamax 92',
                'item_description' => 'Bahan Bakar Bensin dari Pertamina',
                'item_price' => 15000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
