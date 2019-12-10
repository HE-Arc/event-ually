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
        $faker = Faker\Factory::create();
        $faker->seed(1950);
        DB::table('events')->insert([
            [
                'name' => 'Rencontre Laravel',
                'place' => 'Campus HE-ARC 2',
                'description' => 'Apprenez à utiliser Laravel durant ce crash course de Noël',
                'date' => Carbon::create('2019', '12', '24'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' => 1, //neutre
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Paleo',
                'place' => 'Nyon',
                'description' => '70eme édition du festival au paléo avec la présence de Grunenwald',
                'date' => Carbon::create('2020', '07', '20'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' => 6, //festival
                'idUser' => 1, //admin
            ],
            [
                'name' => 'File d’attente pour savoir si la routourne va vraiment tourner',
                'place' => 'Chez Frank',
                'description' => 'File d’attente pour savoir si la routourne va vraiment tourner avec la présence de Ribery',
                'date' => Carbon::create('2020', '11', '31'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' => 4, //loisirs
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Finale coupe du monde de pétanque',
                'place' => 'En forêt',
                'description' => 'Cette édition verra s\opposer les magnifiques sélections du Rwanda et le Groenland',
                'date' => Carbon::create('2020', '02', '12'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' => 3, //sports
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Rencontre pour ceux qui tiennent la chandelle',
                'place' => 'Dans un banc',
                'description' => 'Et si on inversait les rôles ? Ouvre les yeux et change ton futur !',
                'date' => Carbon::create('2021', '02', '14'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>2, //loisirs
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Congrès mondial des paresseux',
                'place' => 'Suisse',
                'description' => 'Pour la 1ere fois, cet événement aura lieu en Suisse. Reservez vos places très vite !',
                'date' => Carbon::create('2021', '08', '10'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>5, //relax
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Enterrement du lion qui est mort ce soir',
                'place' => 'Suisse',
                'description' => 'Enterrement de notre cher ami Mufasa',
                'date' => Carbon::create('2021', '01', '01'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>1, //neutre
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Grande ronde pour tourner autour du pot',
                'place' => 'Autour du pot',
                'description' => 'Compétition pour voir qui va tenir le plus longtemps en train de tourner autour du pot',
                'date' => Carbon::create('2020', '05', '05'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>3, //sports
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Cueillete pour aider Johnny à allumer son feu',
                'place' => 'Chez Johhny',
                'description' => 'Tous ensemble nous pouvons parvenir à aider notre ami Johnny pour qu\'il puisse enfin allumer son feu',
                'date' => Carbon::create('2020', '10','10'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>6, //festival
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Réunion pour savoir si c\'est vraiment son père',
                'place' => 'Dans la maison de Dark Vador',
                'description' => 'On va enfin mettre fin à ce mystère avec des révélations exclusives',
                'date' => Carbon::create('2020', '08','12'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>2, //loisirs
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Randonnée pour savoir si tout les chemins mènent à Rome',
                'place' => 'Partout avant Rome',
                'description' => 'Partez de n\'importe où et vérifiez si tout les chemins mènent à Rome',
                'date' => Carbon::create('2020', '08','27'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>3, //festival
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Workshop d\'assembleur',
                'place' => 'Gare de Neuchatel',
                'description' => 'Venez apprendre ce magnifique langage, vous verrez, c\'est quand même cool',
                'date' => Carbon::create('2021','10','15'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>7, //education
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Calcul pour savoir si on passe l\'année avec nos moyennes',
                'place' => 'Bureau de Prêtre',
                'description' => 'As-tu ce qu\'il faut pour passer?',
                'date' => Carbon::create('2020','09','01'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>7, //education
                'idUser' => 1, //admin
            ],
            [
                'name' => 'S\'asseoir dans un coin et pleurer',
                'place' => 'Partout',
                'description' => 'On doit tous y passer un moment dans la vie...',
                'date' => Carbon::create('2020','12','25'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>1, //neutral
                'idUser' => 1, //admin
            ],
            [
                'name' => 'Manifestation contre la HE-Arc à propos des projecteurs',
                'place' => 'Campus HE-Arc 2',
                'description' => 'C\'est super quand ils s\'éteignent tout seul...',
                'date' => Carbon::create('2020','03','01'),
                'image' => $faker->imageUrl($width = 480, $height = 480),
                'idCategory' =>7, //education
                'idUser' => 1, //admin
            ],
        ]);
    }
}
