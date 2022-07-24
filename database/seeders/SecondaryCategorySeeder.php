<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SecondaryCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('secondary_categories')->insert([
            [
                'primary_category_id' => 1,
                'name' => 'C言語',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Java',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Kotlin',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Python',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'PHP',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Ruby',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'JavaScript',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'C/C++',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'C#',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Go',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'Rust',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Laravel',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'CakePHP',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Ruby on Rails',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Vue.js',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'React',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'AngularJS',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Express',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Spring Framework',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Flask',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Django',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Laravel',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Bootstrap',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Tailwind CSS',
            ],
        ]);
    }
}
