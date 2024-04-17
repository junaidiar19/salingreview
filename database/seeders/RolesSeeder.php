<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('roles')->truncate();

        $roles = ['super admin', 'admin', 'user'];

        foreach ($roles as $role) {
            Role::create(['name' => $role]);
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
