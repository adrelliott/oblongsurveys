<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tenants = \App\Models\Tenant::all();

        $tenants->each(function($tenant) {
            \App\Models\User::factory(10)->create([
                'tenant_id' => $tenant->id,
            ]);
        });

        // Make a superadmin (no tenant)
         // \App\Models\User::factory()->create([
         //    'name' => 'Al Superadmin',
         //    'email' => 'admin@admin.com',
         //    'is_superadmin' => TRUE,
         //    'tenant_id' => 0
         // ]);
    }
}
