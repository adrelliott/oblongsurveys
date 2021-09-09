<?php

namespace Database\Seeders;

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
            // Set up the users, clients and contacts
            TenantSeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            ContactSeeder::class,

            // Now set up the surveys, sections and questions
            SurveySeeder::class,
            // Finally, invite some contacts to some surveys
        ]);
    }
}
