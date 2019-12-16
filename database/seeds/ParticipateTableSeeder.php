<?php

use Illuminate\Database\Seeder;
use App\Participate;

class ParticipateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Participate::insert([
        [
            'idUser' =>1,
            'idEvent' => 1,
        ],
        [
            'idUser' =>1,
            'idEvent' => 3,
        ],
        [
            'idUser' =>1,
            'idEvent' => 6,
        ],
        [
            'idUser' =>1,
            'idEvent' => 12,
        ],
        [
            'idUser' =>1,
            'idEvent' => 13,
        ],
        [
            'idUser' =>2,
            'idEvent' => 1,
        ],
        [
            'idUser' =>2,
            'idEvent' => 2,
        ],
        [
            'idUser' =>2,
            'idEvent' => 3,
        ],
        [
            'idUser' =>2,
            'idEvent' => 10,
        ],
        [
            'idUser' =>2,
            'idEvent' => 11,
        ],
        [
            'idUser' =>2,
            'idEvent' => 14,
        ],
        [
            'idUser' =>3,
            'idEvent' => 1,
        ],
        [
            'idUser' =>3,
            'idEvent' => 2,
        ],
        [
            'idUser' =>3,
            'idEvent' => 7,
        ],
        [
            'idUser' =>3,
            'idEvent' => 10,
        ],
        [
            'idUser' =>3,
            'idEvent' => 11,
        ],
        [
            'idUser' =>4,
            'idEvent' => 1,
        ],
        [
            'idUser' =>4,
            'idEvent' => 3,
        ],
        [
            'idUser' =>4,
            'idEvent' => 6,
        ],
        [
            'idUser' =>4,
            'idEvent' => 7,
        ],
        [
            'idUser' =>4,
            'idEvent' => 10,
        ],
        [
            'idUser' =>4,
            'idEvent' => 13,
        ],
        [
            'idUser' =>5,
            'idEvent' => 1,
        ],
        [
            'idUser' =>5,
            'idEvent' => 6,
        ],
        [
            'idUser' =>5,
            'idEvent' => 8,
        ],
        [
            'idUser' =>5,
            'idEvent' => 9,
        ],
        [
            'idUser' =>5,
            'idEvent' => 12,
        ],
        [
            'idUser' =>5,
            'idEvent' => 14,
        ],
        ]);
    }
}
