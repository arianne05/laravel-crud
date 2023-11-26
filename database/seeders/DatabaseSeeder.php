<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /* Default: You can uncomment to try the seeder 
            //\App\Models\User::factory(10)->create();

            // \App\Models\User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
        */
        
        \App\Models\User::factory(10)->create(); //add 10 users in the users database as well (optional)

        /* For studentFactory */
        //Default\Default\ModelsName::factory(number of user created)
        \App\Models\Students::factory(20)->create();
    }
}
