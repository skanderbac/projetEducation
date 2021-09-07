<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("cours")->insert([
            ["titre"=>"Fonctions logarithmes","matiere_bac_id"=>1],
        ]);
    }
}
