<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SphTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('trx_sph')->insert([
            [
                'sph_code' => 'SPH001/002',
                'sph_type' => 'MMLN',
                'status' => 1,
                'company_name' => 'PT Maju Berkah',
                'company_pic' => 'Sugiono',
                'telepon_pic' => '62812889944',
                'product_name' => 'Premium ',
                'harga'  => '15000',
                'ppn' => '1650',
                'pbbkb' => '750',
                'total' => '17400',
                'oatlokasi' => 'Semarang',
                'hargaoat' => '200000',
                'notes' => 'Dikirim sebelum lebaran',
                'customer_po' => '',
                'lastupdate_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'sph_code' => 'SPH001/003',
                'sph_type' => 'MMTEI',
                'status' => 1,
                'company_name' => 'PT Pintu Kemana Saja',
                'company_pic' => 'Budi',
                'telepon_pic' => '62855994411',
                'product_name' => 'Premium ',
                'harga'  => '15000',
                'ppn' => '1650',
                'pbbkb' => '750',
                'total' => '17400',
                'oatlokasi' => 'Surabaya',
                'hargaoat' => '450000',
                'notes' => 'Dikirim sebelum tahun baru cina',
                'customer_po' => '',
                'lastupdate_by' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
