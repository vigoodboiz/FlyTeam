<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'user_access'
            ],
            [
                'title' => 'user_create'
            ],
            [
                'title' => 'user_edit'
            ],
            [
                'title' => 'user_delete'
            ],
            [
                'title' => 'user_show'
            ]
            ];
            Permission::insert($data);
    }
}