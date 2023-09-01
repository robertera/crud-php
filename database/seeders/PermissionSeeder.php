<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissionViewGame = Permission::create(['name' => 'view_game']);
        $permissionCreateGame = Permission::create(['name' => 'create_game']);
        $permissionUpdateGame = Permission::create(['name' => 'update_game']);
        $permissionListGame = Permission::create(['name' => 'list_game']);
        $permissionDeleteGame = Permission::create(['name' => 'delete_game']);

        $roleAdmin = Role::findByName('admin');
        $roleManager = Role::findByName('manager');
        $roleUser = Role::findByName('user');

        $roleAdmin->givePermissionTo(['create_game', 'update_game', 'delete_game', 'view_game', 'list_game']);

        $roleManager->givePermissionTo(['create_game', 'update_game', 'delete_game', 'view_game', 'list_game']);

        $roleUser->givePermissionTo(['list_game']);
    }
}
