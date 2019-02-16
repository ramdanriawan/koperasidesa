<?php

use Illuminate\Database\Seeder;
use Faker\Provider\id_ID\Person;
use Faker\Provider\id_ID\Address;
use Faker\Provider\id_ID\PhoneNumber;
use App\Anggota;

class AnggotaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Person $fakerPerson, Address $fakerAddress, PhoneNumber $fakerPhoneNumber)
    {
        Anggota::create([
            'nama' => $fakerPerson->lastNameMale(),
            'alamat' => $fakerAddress->address(),
            'no_hp' => $fakerPhoneNumber->phoneNumber(),
            'no_ktp' => $fakerPerson->nik()
        ]);

        Anggota::create([
            'nama' => $fakerPerson->lastNameFemale(),
            'alamat' => $fakerAddress->address(),
            'no_hp' => $fakerPhoneNumber->phoneNumber(),
            'no_ktp' => $fakerPerson->nik()
        ]);
    }
}
