<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                [
                    'id' => 'US-1',
                    'name' => 'Marfiana',
                    'jabatan' => 'admin',
                    'email' => 'admin@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-04-22 09:45:24',
                ],[
                    'id' => 'US-2',
                    'name' => 'Ichsan',
                    'jabatan' => 'manager',
                    'email' => 'manager@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-04-22 09:45:25',
                ],[
                    'id' => 'US-3',
                    'name' => 'Ayu',
                    'jabatan' => 'pembelian',
                    'email' => 'pembelian@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-04-22 09:45:26',
                ],[
                    'id' => 'US-4',
                    'name' => 'Irawati',
                    'jabatan' => 'penjualan',
                    'email' => 'penjualan@email.com',
                    'password' => Hash::make('password'),
                    'created_at' => '2020-04-22 09:45:27',
                ],
            ]
        );
    }
}
