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
            ["nom"=>"Mathématiques","type"=>""],
            ["nom"=>"Informatique","type"=>""],
            ["nom"=>"Disc. techniques","type"=>""],
            ["nom"=>"Sciences physiques","type"=>""],
            ["nom"=>"Sciences de la vie et de la terre","type"=>""],
            ["nom"=>"Gestion","type"=>""],
            ["nom"=>"Économie","type"=>""],
            ["nom"=>"Anglais","type"=>""],
            ["nom"=>"Arabe","type"=>""],
            ["nom"=>"Français","type"=>""],
            ["nom"=>"Hist et géo","type"=>""],
            ["nom"=>"Philosophie","type"=>""],
            ["nom"=>"Allemand","type"=>"Option"],
            ["nom"=>"Espagnol","type"=>"Option"],
            ["nom"=>"Russe","type"=>"Option"],
            ["nom"=>"Chinois","type"=>"Option"],
            ["nom"=>"Turque","type"=>"Option"],
            ["nom"=>"Géographie","type"=>""],
            ["nom"=>"Portugais","type"=>"Option"],
            ["nom"=>"Histoire","type"=>""],
            ["nom"=>"Italien","type"=>"Option"],
            ["nom"=>"Pensée islamique","type"=>""],
            ["nom"=>"Éducation Musicale","type"=>"Option"],
            ["nom"=>"Arts & Plastiques","type"=>"Option"],
            ["nom"=>"Sport","type"=>""],
            ["nom"=>"Théâtre","type"=>"Option"],
            ["nom"=>"Algorithmes","type"=>""],
            ["nom"=>"Bases de données","type"=>""],
        ]);
    }
}
