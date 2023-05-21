<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Pedro',
            'lastname' => 'Souza',
            'username' => 'pedro',
            'email' => 'pedro@gmail.com',
            'email_verified' => 0,
            'password' => 'ABCabc123',
            'avatar' => '/images/default.png',
            'gender' => 'M',
            'birthday' => '1991-01-01',
            'created_at' => '2023-05-19 02:56:23',
            'updated_at' => '2023-05-19 02:56:23'
        ]);
    }
}
