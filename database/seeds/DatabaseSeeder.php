<?php

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
        $this->call(AllianceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SystemSeeder::class);

    }
}
