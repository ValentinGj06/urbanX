@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Management</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                          <th scope="col">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                        <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->first_name.' '. $user->last_name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ implode(', ', $user->roles()->pluck('name')->toArray()) }}</td>
                          <td>
                            @can('edit')
                            <a href="{{ route('users.edit', $user->id) }}"><button class="btn btn-primary float-left mr-2">Edit</button></a>
                            @endcan
                            @can('delete')
                            <form action="{{ route('users.destroy', $user) }}" method="POST" class="float-left">
                                @csrf
                                {{ method_field('DELETE')}}
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                            @endcan
                          </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
