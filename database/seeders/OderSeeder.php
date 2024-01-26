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
        $oder = [];
        for($i=1 ; $i<=5 ; $i++ ){
            $oder[] = [
                "user_id"=> 1,
                "date" => now(),
                "total" => 123,
                "address" => "hà nội".$i
            ];
        }
        DB::table('oder')->insert($oder);
    }
}
