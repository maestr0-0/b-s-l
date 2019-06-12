<?php

use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'admin',
            'display_name' => 'admin_role',
            'description' => 'Admin role ',
        ]);
    }
}
