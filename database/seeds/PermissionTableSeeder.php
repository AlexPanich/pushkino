<?php

use Carbon\Carbon;
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
        $permissions = [
            ['name' => 'edit_article',      'label' => 'Edit The Article'],
            ['name' => 'create_article',    'label' => 'Create The Article'],
            ['name' => 'create_message',    'label' => 'Create The Message'],
            ['name' => 'edit_message',      'label' => 'Edit message'],
            ['name' => 'edit_own_message',  'label' => 'Edit Own message'],
            ['name' => 'view_admin',        'label' => 'View Admin Panel'],
        ];

        foreach ($permissions as $permission) {
            DB::table('permissions')->insert([
                'name' => $permission['name'],
                'label' => $permission['label'],
                'created_at' => Carbon::now()->toDateTimeString(),
                'updated_at' => Carbon::now()->toDateTimeString(),
            ]);
        }
    }
}
