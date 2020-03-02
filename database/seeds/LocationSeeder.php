<?php

use Illuminate\Database\Seeder;
use App\Location;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Location::create([
            'email' => 'some@location.com',
            'name' => 'Rent a Car Skopje',
            'address' => 'Emil Zola 4',
            'latitude' => rand(-90,90),
            'longitude' => rand(-180,180),
            'phone_number' => rand(111111111,999999999),
        ]);

        Location::create([
            'email' => 'second@location.com',
            'name' => 'Rent a Car Prilep',
            'address' => 'Marko Cepenkov 4',
            'latitude' => rand(-90,90),
            'longitude' => rand(-180,180),
            'phone_number' => rand(111111111,999999999),
        ]);

        Location::create([
            'email' => 'another@location.com',
            'name' => 'Rent a Car Bitola',
            'address' => 'Solunska 4',
            'latitude' => rand(-90,90),
            'longitude' => rand(-180,180),
            'phone_number' => rand(111111111,999999999),
        ]);
    }
}
