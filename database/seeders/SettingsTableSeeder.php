<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'key' => 'invoice_format',
                'remarks' => 'format invoice yang digunakan',
                'value' => 'INVMM/0201',
                'group' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'entity_type',
                'remarks' => 'Tipe entitas MMLN yang digunakan',
                'value' => 'MMLN',
                'group' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'entity_type',
                'remarks' => 'Tipe entitas MMTEI yang digunakan',
                'value' => 'MMTEI',
                'group' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'key' => 'ppn',
                'remarks' => 'Setting Value PPN',
                'value' => '11',
                'group' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'key' => 'ppbkb',
                'remarks' => 'Setting Value ppbkb',
                'value' => '15',
                'group' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
