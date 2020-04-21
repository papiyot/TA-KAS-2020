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
                ],[
                    'id' => 'US-2',
                    'name' => 'Ichsan',
                    'jabatan' => 'manager',
                    'email' => 'manager@email.com',
                    'password' => Hash::make('password'),
                ],[
                    'id' => 'US-3',
                    'name' => 'Ayu',
                    'jabatan' => 'pembelian',
                    'email' => 'pembelian@email.com',
                    'password' => Hash::make('password'),
                ],[
                    'id' => 'US-4',
                    'name' => 'Irawati',
                    'jabatan' => 'penjualan',
                    'email' => 'penjualan@email.com',
                    'password' => Hash::make('password'),
                ],
            ]
        );
    }
}
