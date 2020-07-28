<?php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Course::create([
            'title' => 'Língua Portuguesa', 'description' => \Faker\Factory::create()->unique()->text
        ]);

        Course::create([
            'title' => 'Matemática', 'description' => \Faker\Factory::create()->unique()->text
        ]);

        Course::create([
            'title' => 'Ciências', 'description' => \Faker\Factory::create()->unique()->text
        ]);
    }
}
