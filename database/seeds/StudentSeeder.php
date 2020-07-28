<?php

use Illuminate\Database\Seeder;
use App\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'name' => \Faker\Factory::create()->name,
            'email' => \Faker\Factory::create()->unique()->email,
            'birth_date' => \Faker\Factory::create()->date('d/m/Y')
        ]);

        Student::create([
            'name' => \Faker\Factory::create()->name ,
            'email' => \Faker\Factory::create()->unique()->email,
            'birth_date' => \Faker\Factory::create()->date('d/m/Y')
        ]);

        Student::create([
            'name' => \Faker\Factory::create()->name ,
            'email' => \Faker\Factory::create()->unique()->email,
            'birth_date' => \Faker\Factory::create()->date('d/m/Y')
        ]);
    }
}
