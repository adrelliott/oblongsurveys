<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::all();

        $users->each(function($user) {
            \App\Models\Client::factory(5)->create([
                'tenant_id' => $user->tenant_id
            ]);
        });
    }
}
