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
        $this->call(ParameterSeeder::class);
        $this->call(ParameterSkorSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(IdentityRespondenSeeder::class);
    }
}
