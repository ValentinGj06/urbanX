@extends('layouts.layout')

@section('title', 'Location')


@section('content')
    <h1 class="title">{{ $location->name }}</h1>
    @can('cars-management')
    <button class="btn btn-primary" form="add_car">Add New Car</button>
    <form action="/{{ $location->id }}/cars/create" id="add_car" method="post">
    @csrf
    <input type="hidden" name="location_id" value="{{ $location->id }}">
    </form>
    @endcan
    @if ($cars)
    <h1 class="title">Cars</h1>
    
    <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>Brand</th>
            <th>Model</th>
            <th>Year</th>
            <th>Type of Fuel</th>
            <th>Price Per Day</th>
            <th>Status</th>
            <!-- <th>Location</th> -->
            <th>Actions</th>
         </tr>
         </thead>
         <tbody>
            @foreach($cars as $car)
                <tr>
                   <td>{{ $car->id }}</td>
                   <td>{{ $car->brand }}</td>
                   <td>{{ $car->model }}</td>
                   <td>{{ $car->year }}</td>
                   <td>{{ $car->type_of_fuel }}</td>
                   <td>{{ '$'.$car->price_per_day }}</td>
                   <td><span class="badge <?= ($car->status === 'available') ? 'badge-success' : 'badge-info' ?>">{{ $car->status }}</span></td>
                   <!-- <td>{{ $car->location->name.', '.$car->location->address }}</td> -->
                   <td>
                        <a href="/cars/{{ $car->id }}"><button class="btn btn-primary float-left mr-2">View</button></a>
                        @if($car->status === 'available')
                        @can('rent')
                        <form action="/cars/{{ $car->id }}" method="POST" class="float-left mr-2">
                            @csrf
                            {{ method_field('PATCH')}}
                            <input type="hidden" name="status" value="rented">
                            <button type="submit" class="btn btn-secondary">Rent</button>
                        </form>
                        @endcan
                        @else
                        @can('cancel')
                        <form action="/cars/{{ $car->id }}" method="POST" class="float-left mr-2">
                            @csrf
                            {{ method_field('PATCH')}}
                            <input type="hidden" name="status" value="available">
                            <button type="submit" class="btn btn-success">Finish</button>
                        </form>
                        @endcan
                        @endif
                        @can('cars-management')
                        <a href="/cars/{{ $car->id }}/edit"><button class="btn btn-primary">Edit</button></a>
                        <a href="/cars/{{ $car->id }}/delete"><button class="btn btn-primary">Delete</button></a>
                        @endcan
                   </td>
                </tr>
            @endforeach
         </tbody>
      </table>
      {{ $cars->links() }}
    @endif
@endsection