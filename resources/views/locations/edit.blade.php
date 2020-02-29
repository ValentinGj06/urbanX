@extends('layouts.layout')

@section('title', 'Edit')


@section('content')
<div class="container">
    <form method="POST" action="/locations/{{ $location->id }}">
        @csrf
        {{ method_field('PATCH') }}
        <div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Location Name</label>
            <div class="col-sm-3">   
                <input type="text" name="name" class="form-control" placeholder="Location Name" value="{{ $location->name }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-3">
                <input type="email" name="email" class="form-control" placeholder="Location Email" value="{{ $location->email }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="address" class="col-sm-2 col-form-label">Address</label>
            <div class="col-sm-3">
                <input type="text" class="form-control" name="address" placeholder="Address" value="{{ $location->address }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="latitude" class="col-sm-2 col-form-label">Latitude</label>
            <div class="col-sm-3">
                <input type="text" name="latitude" class="form-control" placeholder="Latitude" value="{{ $location->latitude }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="longitude" class="col-sm-2 col-form-label">Longitude</label>
            <div class="col-sm-3">
                <input type="text" name="longitude" class="form-control" placeholder="Longitude" value="{{ $location->longitude }}" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="phone_number" class="col-sm-2 col-form-label">Phone Number</label>
            <div class="col-sm-3">
                <input type="text" name="phone_number" class="form-control" placeholder="Phone Number" value="{{ $location->phone_number }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-2">
                <button type="submit" class="btn btn-block btn-primary">Update Location</button>
            </div>
            <div class="col-sm-2">
                <button type="submit" form="delete_location" class="btn btn-danger">Delete</button>
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
<form action="/locations/{{$location->id}}" id="delete_location" method="post">
    @csrf
    @method('DELETE')
</form>
@endsection
