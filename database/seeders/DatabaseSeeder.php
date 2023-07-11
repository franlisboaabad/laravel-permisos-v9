<?php

namespace Database\Seeders;

use App\Models\Invitado;
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
        // \App\Models\User::factory(10)->create();

        $this->call(RoleSeeder::class);


        \App\Models\User::factory()->create(
            [
                'name' => 'Frank Lisboa Abad',
                'email' => 'frank@admin.com',
                'email_verified_at' => now(),
                'password' => bcrypt('secret'), // password
            ]
        )->assignRole('Admin');

        Invitado::factory()->count(30)->create();
        User::factory()->count(10)->create();
    }
}
