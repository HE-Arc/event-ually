<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Neutre'],
            ['name' => 'Romantique'],
            ['name' => 'Sport'],
            ['name' => 'Loisirs'],
            ['name' => 'Relax'],
            ['name' => 'Festival'],
            ['name' => 'Education']
        ]);
    }
}
