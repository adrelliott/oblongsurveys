<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SurveySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = \App\Models\Client::all();

        $clients->each(function($client) {
            \App\Models\Surveys\Survey::factory(3)->create([
                'client_id' => $client->id,
                'tenant_id' => $client->tenant_id,
            ]);
        });
    }
}
