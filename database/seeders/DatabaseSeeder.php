<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(50)->create();
        $this->call(BacTableSeeder::class);
        Student::factory(30)->create();
        $this->call(MatiereTableSeeder::class);
        //$this->call(StudentsTableSeeder::class);
    }
}
