@extends('layouts.layout')

@section('title', 'Add')


@section('content')
<div class="container">
    <h1 class="title">Add New Car</h1>
    <form method="POST" action="/cars">
        @csrf
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        <input type="hidden" name="location_id" value="{{ $location->id }}">
        <div class="form-group row">
            <label for="brand" class="col-sm-2 col-form-label">Brand</label>
            <div class="col-sm-3">   
                <input type="text" name="brand" class="form-control" placeholder="Brand" value="{{ old('brand') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="model" class="col-sm-2 col-form-label">Model</label>
            <div class="col-sm-3">   
                <input type="text" name="model" class="form-control" placeholder="Model" value="{{ old('model') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="year" class="col-sm-2 col-form-label">Year</label>
            <div class="col-sm-3">
                <input type="text" name="year" class="form-control" placeholder="Year" value="{{ old('year') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="type_of_fuel" class="col-sm-2 col-form-label">Type of Fuel</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="type_of_fuel" placeholder="Type of Fuel" value="{{ old('type_of_fuel') }}">
            </div>
        </div>
        <div class="form-group row">
            <label for="price_per_day" class="col-sm-2 col-form-label">Price Per Day</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="price_per_day" placeholder="Price Per Day" value="{{ old('price_per_day') }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Add Car</button>
            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-warning" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</div>
@endsection