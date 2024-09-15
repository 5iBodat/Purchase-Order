<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PoVendor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_po_vendor')->insert([
            [
                'po_numbers' => 'KCA/TSP/213',
                'sph_code' => 'SPH001/002',
                'po_type' => 'Transporter',
                'po_date' => Carbon::parse('2000-01-01'),
                'requested_by' => 'Bu Mina',
                'shipped_by' => 'Truck',
                'fob' => 'Door To Door',
                'term' => '14 Days',
                'transport'=> ' Truck',
                'po_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'DFA/TSP/213',
                'sph_code' => 'SPH001/003',
                'po_type' => 'Transporter',
                'po_date' => Carbon::parse('2000-01-01'),
                'requested_by' => 'Bu Mina',
                'shipped_by' => 'Truck',
                'fob' => 'Door To Door',
                'term' => '14 Days',
                'transport'=> ' Truck',
                'po_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'KCA/SUP/213',
                'sph_code' => 'SPH001/002',
                'po_type' => 'Supplier',
                'po_date' => Carbon::parse('2000-01-01'),
                'requested_by' => 'Bu Mina',
                'shipped_by' => 'Truck',
                'fob' => 'Door To Door',
                'term' => '14 Days',
                'transport'=> ' Truck',
                'po_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'po_numbers' => 'DFA/SUP/213',
                'sph_code' => 'SPH001/003',
                'po_type' => 'Supplier',
                'po_date' => Carbon::parse('2000-01-01'),
                'requested_by' => 'Bu Mina',
                'shipped_by' => 'Truck',
                'fob' => 'Door To Door',
                'term' => '14 Days',
                'transport'=> ' Truck',
                'po_status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
