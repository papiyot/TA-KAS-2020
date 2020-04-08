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
                ],
            ]
        );
    }
}
