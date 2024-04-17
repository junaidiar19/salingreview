<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => app()->isLocal() ? bcrypt('password') : bcrypt(env('ADMIN_PASSWORD')),
        ];

        $user = User::firstOrCreate(['email' => $data['email']], $data);
        $user->assignRole('super admin');
    }
}
