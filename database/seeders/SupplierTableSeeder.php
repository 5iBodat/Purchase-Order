<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('mst_supplier')->insert([
            [
                'customer_name' => 'PT Bangun Sejahtera Sukses',
                'compocode' => 'BSS',
                'nomer_pajak' => '09.254.294.3-407.000',
                'alamat' => 'Jalan Sudirman no 104 , Jakarta Selatan',
                'nama_pic' => 'Budi Sugiono',
                'telepon_pic' => '081122334455',
                'email_pic' => 'budis@email.com',
                'whatsapp'  => '6281122334455',
                'created_at' => now(),
                'updated_at' => now(),
                'is_customer' => 1,
            ],
            [
                'customer_name' => 'PT Pintu Kemana Saja',
                'compocode' => 'PKS',
                'nomer_pajak' => '09.456.321.2-107.000',
                'alamat' => 'Jalan MT Haryono no 88 , Jakarta Selatan',
                'nama_pic' => 'Toni Sucipto',
                'telepon_pic' => '0877889955',
                'email_pic' => 'toni@email.com',
                'whatsapp'  => '628877889955',
                'created_at' => now(),
                'updated_at' => now(),
                'is_customer' => 1,
            ],

        ]);
    }
}
