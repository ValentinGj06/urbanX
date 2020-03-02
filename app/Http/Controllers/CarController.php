<?php

namespace App\Http\Controllers;

use App\Car;
use App\Location;
use App\User;
use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Auth;

class CarController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::with('user','location')->get();
        return view ('cars.index')->with('cars', $cars);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Location $location)
    {
        if(Gate::denies('cars-management')){
            return redirect(route('cars'));
        }

        return view ('cars.create')->with('location', $location);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Car::create($this->validateLocations($request));

        return redirect('cars')->with('success', 'Car created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        $location = $car->location;

        return view ('cars.show', compact('car', 'location'));
    }

    public function showCarsFromOwner()
    {
        $cars = Car::with('user','location')->where('user_id', '=', Auth::id() )->get();
        return view ('cars.mycars')->with('cars', $cars);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        if(Gate::denies('cars-management')){
            return redirect(route('cars'));
        }

        return view ('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        if($request->status){

            $car->update(['status' => $request->status]);
        }

        $car->update($this->validateLocations($request));

        return redirect('cars')->with('success', 'Car updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if(Gate::denies('cars-management')){
            return redirect(route('cars'));
        }

        $car->delete();
        return redirect('cars')->with('success', 'Successfully deleted car!');
    }

    protected function validateLocations(Request $request) 
    {
        return $request->validate([
            'user_id' => ['required'],
            'location_id' => ['required'],
            'brand' => ['required', 'string'],
            'model' => ['required', 'string'],
            'year' => ['required', 'numeric', 'min:0000', 'max:2020'],
            'type_of_fuel' => ['required', 'string'],
            'price_per_day' => ['required', 'numeric'],
        ]);
    }
}
