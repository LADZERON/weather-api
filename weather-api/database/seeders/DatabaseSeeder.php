<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::beginTransaction();
        $this->call([
            PermissionTableSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
        ]);
        DB::commit();
    }
}
