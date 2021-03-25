<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\IdentitasResponden;
use Faker\Generator as Faker;

$factory->define(IdentitasResponden::class, function (Faker $faker) {
    return [
        'user_id' => \App\User::all()->random()->id,
        'identitas_instansi_pemerintah' => $faker->randomElement(['satuan kerja', 'direktorat', 'departemen']),
        'alamat' => $faker->address,
        'nomor_hp' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'nik' => $faker->nik(),
        'nip' => $faker->ean13,
        'jabatan' => $faker->randomElement(['Direktur', 'Manager', 'Officer'])
    ];
});
