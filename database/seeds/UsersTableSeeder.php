<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'ProPay Super User',
            'email' => 'koketso.maphopha@gmail.com',
            'idNumber' => '9110251111111',
            'mobileNumber' => '0716157192',
            'language' => 'English',
            'password' => Hash::make('123')
        ]);
    }
}
