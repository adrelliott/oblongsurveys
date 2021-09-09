<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersClientsAndContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Make some random users and assign 3 clients to each
         \App\Models\User::factory()
            ->count(10)
            ->hasClients(3)
            ->create();

        // Make a superadmin
         \App\Models\User::factory()->create([
            'name' => 'Al Superadmin',
            'email' => 'admin@admin.com',
            'is_superadmin' => TRUE,
         ]);

        // Get all clients, and create some contacts for each
        $clients = \App\Models\Client::all();
        $clients->each(function($client) {
            \App\Models\Contact::factory(15)->create([
                'client_id' => $client->id
            ]);
        });
    }
}
