<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('oder')->insert([
            ['user_id'=>1 , 'date' => now() , 'total'=>123 , 'address'=>'hà nội'],
            ['user_id'=>2 , 'date' => now() , 'total'=>123 , 'address'=>'hà nội'],
            ['user_id'=>3 , 'date' => now() , 'total'=>123 , 'address'=>'hà nội'],
        ]);
    }
}
