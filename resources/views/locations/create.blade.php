@extends('layouts.layout')

@section('title', 'Create')


@section('content')
<div class="container">
    <h1 class="title">Create New Location</h1>
    <form method="POST" action="/locations">
        @csrf
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Location Name</label>
            <div class="col-sm-3">   
                <input type="text" name="name" class="form-control" placeholder="Location Name" value="{{ old('name') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="email" name="email" class="form-control" placeholder="Location Email" value="{{ old('email') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ old('address') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
            <div class="col-sm-3">
                <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ old('latitude') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
            <div class="col-sm-3">
                <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{ old('longitude') }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone number</label>
            <div class="col-sm-3">
                <input type="text" name="phone_number" class="form-control" placeholder="Phone number" value="{{ old('phone_number') }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-primary">Create Location</button>
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
