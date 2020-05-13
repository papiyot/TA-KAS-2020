<?php

use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('supplier')->insert(
            [
                [
                    'supplier_id' => 'SP-1',
                    'supplier_nama' => 'Jaya Abadi',
                    'supplier_telp' => '085332115224',
                    'supplier_alamat' => 'Yogyakarta',
                    'created_at' => '2020-04-22 09:45:24',
                ],[
                    'supplier_id' => 'SP-2',
                    'supplier_nama' => 'Jaya Amanah',
                    'supplier_telp' => '085332115221',
                    'supplier_alamat' => 'Wonogiri',
                    'created_at' => '2020-04-22 09:45:25',
                ],[
                    'supplier_id' => 'SP-3',
                    'supplier_nama' => 'Kusuma',
                    'supplier_telp' => '085332115227',
                    'supplier_alamat' => 'Wonosari',
                    'created_at' => '2020-04-22 09:45:26',
                ],[
                    'supplier_id' => 'SP-4',
                    'supplier_nama' => 'Yup',
                    'supplier_telp' => '085332115229',
                    'supplier_alamat' => 'Pracimantoro',
                    'created_at' => '2020-04-22 09:45:27',
                ],
            ]
        );
    }
}
