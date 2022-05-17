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
                'name' => 'ワンピース',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'ナルト',
            ],
            [
                'primary_category_id' => 1,
                'name' => 'スパイファミリー',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'ポケモン',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'モンハン',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'モンスト',
            ],
            [
                'primary_category_id' => 2,
                'name' => 'パズドラ',
            ]
        ]);
    }
}
