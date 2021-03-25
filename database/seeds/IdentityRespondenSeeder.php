<?php

use Illuminate\Database\Seeder;

class IdentityRespondenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\IdentitasResponden::class, 1)->create();
    }
}
