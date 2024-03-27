<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('programs')->insert([

            'Name' => 'Sibling_Counseling_Session',
            'Day' => 'Monday',
            'Duration' => '45',
            'CounselorId' => 1,
            'Price' => '3000',

        ]);
    }
}
