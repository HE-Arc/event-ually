<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
        [
            'name' => 'admin',
            'password' => bcrypt('password'),
            'email' => Str::random(10).'@gmail.com',
        ],
        [
            'name' => 'Gandalf',
            'password' => bcrypt('password'),
            'email' => 'mithrandir@the-shire.com',
        ],
        [
            'name' => 'Myrtille',
            'password' => bcrypt('password'),
            'email' => 'barbare.des.steppes@kwzprtt.com',
        ],
        [
            'name' => 'Daenerys Targaryen',
            'password' => bcrypt('password'),
            'email' => 'breakerOfChains_unburnt_motherOfDragons@muh-queen.com',
        ],
        [
            'name' => 'Sandor Clegane',
            'password' => bcrypt('password'),
            'email' => 'juicymuttonchops@harenhall.com'
        ],
        ]);
    }
}
