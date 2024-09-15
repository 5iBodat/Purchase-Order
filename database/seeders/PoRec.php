<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoRec extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('po_receive')->insert([
            [
                'sph_code' => 'SPH001/002',
                'po_no' => '092542943-407000',
                'po_file' => 'bagus.jpg',
                'po_status' => 1,
                'received_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sph_code' => 'SPH001/003',
                'po_no' => '092542943-40889',
                'po_file' => 'ok.jpg',
                'po_status' => 1,
                'received_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
