<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Faker\Provider\Lorem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CrosswordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while ($i < 20) {
            $answer = Lorem::word();
            DB::table('crosswords')->insert([
                'answer' => $answer,
                'clue' => Lorem::word(),
                'length' => strlen($answer),
                'date' => Carbon::now()->toDateString(),
                'direction' => 'across',
            ]);
            $i++;
        }
    }
}
