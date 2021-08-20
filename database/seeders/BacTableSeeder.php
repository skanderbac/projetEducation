<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("bacs")->insert([
            ["nom"=>"Mathématiques"],
            ["nom"=>"Sciences Expérimentales"],
            ["nom"=>"Economie et gestion"],
            ["nom"=>"Technique"],
            ["nom"=>"Lettres"],
            ["nom"=>"Sport"],
            ["nom"=>"Informatique"],
        ]);
    }
}
