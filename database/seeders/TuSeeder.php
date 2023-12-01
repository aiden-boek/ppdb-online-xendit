<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; // Import the Str class

class TuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert dummy data into admins table
        DB::table('tus')->insert([
            'name' => 'tu User',
            'email' => 'tu@example.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'), // Hash the password
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // You can add more dummy data if needed
    }
}
