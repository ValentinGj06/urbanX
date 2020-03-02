@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit User Role</div>

                <div class="card-body">
                    <table class="table table-striped table-dark">
                        <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Name</th>
                          <th scope="col">Email</th>
                          <th scope="col">Role</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <th scope="row">{{ $user->id }}</th>
                          <td>{{ $user->first_name.' '. $user->last_name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>
                          <select id="role" type="text" class="form-control @error('role') is-invalid @enderror" name="roles[]" required autofocus>
                            @foreach($roles as $role)
                              <option value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) selected @endif >{{ $role->name }}</option>
                            @endforeach
                          </select>
                          </td>
                          <td>
                            @can('edit')
                            <form action="{{ route('users.update', $user) }}" method="POST" class="float-left">
                                @csrf
                                {{ method_field('PUT')}}
                                <button type="submit" class="btn btn-danger">Update</button>
                            </form>
                            @endcan
                          </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
