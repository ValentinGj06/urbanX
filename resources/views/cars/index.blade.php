@extends('layouts.layout')

@section('title', 'Cars')


@section('content')
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
<!--                    <td>{{ $car->location->name.', '.$car->location->address }}</td>
 -->                   <td>
                        <a href="/cars/{{ $car->id }}"><button class="btn btn-primary">View</button></a>
                        <a href="/cars/{{ $car->id }}/edit"><button class="btn btn-primary">Edit</button></a>
                        <a href="/cars/{{ $car->id }}/delete"><button class="btn btn-primary">Delete</button></a>
                   </td>
                </tr>
            @endforeach
         </tbody>
      </table>
      {{--{{ $cars->links() }}--}}
@endsection