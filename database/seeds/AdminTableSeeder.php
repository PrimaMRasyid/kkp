<?php

use App\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $admin = User::firstOrCreate([
        // 	'name' => 'Admin',
        // 	'email' => 'admin@domain.com',
        // 	'password' => bcrypt('password'),
        // 	'is_approved' => true,
        // 	'is_admin' => true
        // ]);

        // $lab = User::firstOrCreate([
        //     'name' => 'lab',
        //     'email' => 'lab@domain.com',
        //     'password' => bcrypt('password'),
        //     'is_approved' => true,
        //     'role' => 1
        // ]);

        $bank = User::firstOrCreate([
            'name' => 'Bank',
            'email' => 'bank@domain.com',
            'password' => bcrypt('password'),
            'is_approved' => true,
            'role' => 2
        ]);

        $pabean = User::firstOrCreate([
            'name' => 'Pabean',
            'email' => 'pabean@domain.com',
            'password' => bcrypt('password'),
            'is_approved' => true,
            'role' => 3
        ]);
    }
}
