@extends('layouts.layout')

@section('title', 'Car')

@section('content')
    <h1 class="title">{{ $car->brand.' '.$car->model }}</h1>

    {{--<button class="btn btn-primary" form="add_car">Add New car</button>--}}
    {{--<form action="/{{ $company->id }}/cars/create" id="add_car" method="post">--}}
        {{--@csrf--}}
        {{--<input type="hidden" name="company_id" value="{{ $company->id }}">--}}
    {{--</form>--}}
    @if ($car)
        <h2 class="title">Car Info</h2>

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
                <th>Location</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $car->id }}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>{{ $car->type_of_fuel }}</td>
                    <td>{{ '$'.$car->price_per_day }}</td>
                    <td><span class="badge <?= ($car->status === 'available') ? 'badge-success' : 'badge-info' ?>">{{ $car->status }}</span></td>
                    <td>{{ $location->name.', '.$location->address }}</td>
                    <td>
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
            </tbody>
        </table>
        {{--{{ $car->links() }}--}}
    @endif
@endsection