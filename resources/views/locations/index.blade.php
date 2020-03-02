@extends('layouts.layout')

@section('title', 'Locations')


@section('content')
    <h1 class="title">Locations</h1>
    @can('locations-management')
    <a class="nav-item nav-link" href="/locations/create"><button class="btn btn-primary" form="add_location">Add New Location</button></a>
    @endcan
    <table class="table table-striped">
         <thead>
         <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Address</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Phone</th>
            <th>Actions</th>
         </tr>
         </thead>
         <tbody>
            @foreach($locations as $location)
                <tr>
                   <td>{{ $location->id }}</td>
                   <td>{{ $location->name }}</td>
                   <td>{{ $location->email }}</td>
                   <td>{{ $location->address }}</td>
                   <td>{{ $location->latitude }}</td>
                   <td>{{ $location->longitude }}</td>
                   <td>{{ $location->phone_number }}</td>
                   <td>
                        <a href="/locations/{{ $location->id }}"><button class="btn btn-primary">View</button></a>
                        @can('locations-management')
                        <a href="/locations/{{ $location->id }}/edit"><button class="btn btn-primary">Edit</button></a>
                        <a href="/locations/{{ $location->id }}/delete"><button class="btn btn-primary">Delete</button></a>
                        @endcan
                   </td>
                </tr>
            @endforeach
         </tbody>
      </table>
      {{ $locations->links() }}
@endsection