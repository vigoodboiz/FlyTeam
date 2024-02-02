<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class delivery_status extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('delivery_status')->insert([
            ['oder_id'=>1 , 'status' => 'miễn phí vận chuyển'],
        ]);
    }
}
