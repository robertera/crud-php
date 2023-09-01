<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'manager']);
        Role::create(['name' => 'user']);

        $userAdmin = User::find(1);
        $userAdmin->assignRole('admin');

        $userManager = User::find(2);
        $userManager->assignRole('manager');

        $userUser = User::find(3);
        $userUser->assignRole('manager');

        $userUser = User::find(4);
        $userUser->assignRole('user');

    }
}
