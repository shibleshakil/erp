<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class User extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Super Admin', 'username' => 'superadmin', 'email' => 'superadmin@example.com', 
            'role_id' => 1, 'password' => bcrypt('admin'), 'is_active' => 1 ]
        ]);
    }
}
