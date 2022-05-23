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
                'primary_category_id' => 2,
                'name' => 'XAMPP',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Docker',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'Eclipse',
            ]
        ]);
    }
}
