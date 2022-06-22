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
            'password' => Hash::make('123'),
            'role' => 'administrator'
        ]);

        App\User::create([
            'name' => 'Test User',
            'surname' => 'Number 1',
            'email' => 'koki@gmail.com',
            'idNumber' => '91102535411111',
            'mobileNumber' => '071454657192',
            'language' => 'Sotho',
            'password' => Hash::make('123')
        ]);
    }
}
