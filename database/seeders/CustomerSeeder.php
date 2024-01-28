<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::create([
            'id' => '1',
            'user_code' => 'ph28074',
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('12341234'),
            'gender' => '0',
            'phone' => '0345166934',
            'address' => 'Nam du, linh nam, ha noi',
            'role_id' => '3',
            'remember_token' => null,
        ]);
    }
}