<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class oder_detail extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('oder_detail')->insert([
            ['product_id'=>1 , 'oder_id' =>1 , 'price'=>123 , 'quantity'=>234],
            ['product_id'=>2 , 'oder_id' =>2 , 'price'=>123 , 'quantity'=>234],
            ['product_id'=>3 , 'oder_id' =>3 , 'price'=>123 , 'quantity'=>234],
        ]);
    }
}
