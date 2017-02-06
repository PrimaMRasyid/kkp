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
        $admin = User::firstOrCreate([
        	'name' => 'Admin',
        	'email' => 'admin@domain.com',
        	'password' => bcrypt('password'),
        	'is_approved' => true,
        	'is_admin' => true
        ]);
    }
}
