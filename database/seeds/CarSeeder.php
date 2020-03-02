<?php

use Illuminate\Database\Seeder;
use App\Location;
use App\User;
use App\Car;
class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carOne = Car::create([
        	'user_id' => 1,
        	'location_id' => 1,
            'brand' => 'Hyundai',
            'model' => 'ix35',
            'year' => '2011',
            'type_of_fuel' => 'diesel',
            'price_per_day' => 10,
            'status' => 'rented',
        ]);

        $carTwo = Car::create([
        	'user_id' => 2,
        	'location_id' => 1,
            'brand' => 'Mercedes',
            'model' => 'GLA',
            'year' => '2014',
            'type_of_fuel' => 'petrol',
            'price_per_day' => 30,
            'status' => 'available',
        ]);

        $carThree = Car::create([
        	'user_id' => 2,
        	'location_id' => 2,
            'brand' => 'Lexus',
            'model' => 'u9',
            'year' => '2017',
            'type_of_fuel' => 'hybrid',
            'price_per_day' => 20,
            'status' => 'available',
        ]);
    }
}
