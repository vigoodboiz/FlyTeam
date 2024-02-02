<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class oder_status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('oder_status')->insert([
            ['oder_id'=>1 , 'status' => 'Đang xử lý'],
            ['oder_id'=>2 , 'status' => 'Đã giao hàng'],
            ['oder_id'=>3 , 'status' => 'Đã hủy'],
        ]);
    }
}
