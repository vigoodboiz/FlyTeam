<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::pluck('id')->toArray();
        $permissions = Permission::pluck('id')->toArray();

        foreach($roles as $role){
            foreach($permissions as $permission){
                DB::table('permission_role')->insert([
                    'role_id' => $role,
                    'permission_id' => $permission,
                ]);
            }
        }
    }
}