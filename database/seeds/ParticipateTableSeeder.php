<?php

use Illuminate\Database\Seeder;

class ParticipateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('participates')->insert([
            'idUser' =>1,
            'idEvent' => 1

        ]);
    }
}
