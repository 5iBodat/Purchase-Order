<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PoDetails extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_po_details')->insert([
            [
                'po_id' => 'KCA/TSP/213',
                'qty' => 100,
                'description' => 'PO untuk PT KCA 100 Liter Solar',
                'unit_price' => 15000,
                'amount' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'DFA/TSP/213',
                'qty' => 250,
                'description' => 'PO untuk PT KCA 100 Liter Solar',
                'unit_price' => 15000,
                'amount' => 3750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'KCA/SUP/213',
                'qty' => 100,
                'description' => 'PO untuk PT KCA 100 Liter Solar',
                'unit_price' => 15000,
                'amount' => 1500000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'DFA/SUP/213',
                'qty' => 250,
                'description' => 'PO untuk PT KCA 100 Liter Solar',
                'unit_price' => 15000,
                'amount' => 3750000,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
