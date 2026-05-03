<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            SuperAdminSeeder::class,
            AdminUserSeeder::class,
            HostelSeeder::class,
            RoomsTableSeeder::class,
            StudentsTableSeeder::class,
        ]);
    }
}
