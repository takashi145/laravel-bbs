<?php

namespace Database\Seeders;

use App\Models\Thread;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call([
            PrimaryCategorySeeder::class,
            SecondaryCategorySeeder::class,
        ]);
        
        // User::factory(10)->create()->each(function ($user) {
        //     Thread::factory(random_int(2, 5))->create(['user_id' => $user]);
        // });
    }
}
