<?php

use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'edit_article',
            'label' => 'Edit The Article',
        ]);

        DB::table('permissions')->insert([
            'name' => 'create_article',
            'label' => 'Create The Article',
        ]);

        DB::table('permissions')->insert([
            'name' => 'create_message',
            'label' => 'Create The Message',
        ]);

        DB::table('permissions')->insert([
            'name' => 'edit_message',
            'label' => 'Edit message',
        ]);

        DB::table('permissions')->insert([
            'name' => 'edit_own_message',
            'label' => 'Edit Own message',
        ]);

        DB::table('permissions')->insert([
            'name' => 'view_admin',
            'label' => 'View Admin Panel',
        ]);
    }
}
