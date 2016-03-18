<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'label' => 'Site Administrator',
        ]);

        DB::table('roles')->insert([
            'name' => 'user',
            'label' => 'Register User',
        ]);
    }
}
