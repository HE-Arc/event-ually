<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;


class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 15; $i++){
            DB::table('events')->insert([
                'name' => 'Rencontre Laravel',
                'place' => 'Campus HE-ARC 2',
                'description' => 'Apprendre à utiliser Laravel',
                'date' => Carbon::create('2000', '01', '01'),
                'idCategory' => 1,
                'idUser' => 1
            ]);
        }
    }
}
