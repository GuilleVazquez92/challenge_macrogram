<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Macrogram',
            'email' => 'user@macrogramec.com',
            'password' => bcrypt('macrogramec123')
        ]);

        $this->call([
            AuthorSeeder::class,
            BookSeeder::class,
        ]);
    }
}
