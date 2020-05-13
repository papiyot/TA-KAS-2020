<?php

use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert(
            [
                [
                    'barang_id' => 'BR-1',
                    'barang_nama' => 'Bolpen',
                    'barang_harga_pembelian' => '3000',
                    'barang_harga_penjualan' => '4000',
                    'barang_satuan' => 'Buah',
                    'barang_stok' => '5.00',
                    'created_at' => '2020-04-22 09:45:24',
                ],[
                    'barang_id' => 'BR-2',
                    'barang_nama' => 'Tipe-X',
                    'barang_harga_pembelian' => '3500',
                    'barang_harga_penjualan' => '4500',
                    'barang_satuan' => 'Buah',
                    'barang_stok' => '5.00',
                    'created_at' => '2020-04-22 09:45:25',
                ],[
                    'barang_id' => 'BR-3',
                    'barang_nama' => 'Penggaris',
                    'barang_harga_pembelian' => '4000',
                    'barang_harga_penjualan' => '5000',
                    'barang_satuan' => 'Buah',
                    'barang_stok' => '5.00',
                    'created_at' => '2020-04-22 09:45:26',
                ],[
                    'barang_id' => 'BR-4',
                    'barang_nama' => 'Penghapus',
                    'barang_harga_pembelian' => '2000',
                    'barang_harga_penjualan' => '3000',
                    'barang_satuan' => 'Buah',
                    'barang_stok' => '5.00',
                    'created_at' => '2020-04-22 09:45:27',
                ],
            ]
        );
    }
}
