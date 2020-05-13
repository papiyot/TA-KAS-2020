<?php

use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('biaya')->insert(
            [
                [
                    'biaya_id' => 'BY-1',
                    'biaya_nama' => 'Biaya Angkut',
                    'created_at' => '2020-04-22 09:45:24',
                ],[
                    'biaya_id' => 'BY-2',
                    'biaya_nama' => 'Biaya Antar',
                    'created_at' => '2020-04-22 09:45:25',
                ],[
                    'biaya_id' => 'BY-3',
                    'biaya_nama' => 'Biaya Listrik',
                    'created_at' => '2020-04-22 09:45:26',
                ],[
                    'biaya_id' => 'BY-4',
                    'biaya_nama' => 'Biaya Gaji',
                    'created_at' => '2020-04-22 09:45:27',
                ],
            ]
        );
    }
}
