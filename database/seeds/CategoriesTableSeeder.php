<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::insert([
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
