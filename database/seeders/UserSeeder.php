<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id' => '1',
            'user_code' => 'ph28975',
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12341234'),
            'gender' => '0',
            'phone' => '0345166934',
            'address' => 'Nam du, linh nam, ha noi',
            'role_id' => '2',
            'remember_token' => null,
        ]);
    }
}