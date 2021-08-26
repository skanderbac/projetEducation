<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MatiereTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("matieres")->insert([
            ["nom"=>"Mathématiques"],
            ["nom"=>"Informatique"],
            ["nom"=>"Disc. techniques"],
            ["nom"=>"Sciences physiques"],
            ["nom"=>"Sciences de la vie et de la terre"],
            ["nom"=>"Gestion"],
            ["nom"=>"Économie"],
            ["nom"=>"Anglais"],
            ["nom"=>"Arabe"],
            ["nom"=>"Français"],
            ["nom"=>"Hist et géo"],
            ["nom"=>"Philosophie"],
            ["nom"=>"Allemand"],
            ["nom"=>"Espagnol"],
            ["nom"=>"Russe"],
            ["nom"=>"Chinois"],
            ["nom"=>"Turque"],
            ["nom"=>"Géographie"],
            ["nom"=>"Portugais"],
            ["nom"=>"Histoire"],
            ["nom"=>"Italien"],
            ["nom"=>"Pensée islamique"],
            ["nom"=>"Éducation Musicale"],
            ["nom"=>"Arts & Plastiques"],
            ["nom"=>"Sport"],
            ["nom"=>"Théâtre"],
            ["nom"=>"Algorithmes"],
            ["nom"=>"Bases de données"],
        ]);
    }
}
