@extends('layouts/master')

@section('title', 'Edit Users')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">


            <div class="card-header">
                <h4>Edit Users
                    <a href="{{ url('admin/users') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">


                <div class="mt-3">
                    <label>Full Name</label>
                    <p class="form-control">{{ $user->name }}</p>
                </div>
                <div class="mt-3">
                    <label>Email</label>
                    <p class="form-control">{{ $user->email }}</p>
                </div>
                <div class="mt-3">
                    <label>Created_at</label>
                    <p class="form-control">{{ $user->created_at->format('d/m/y') }}</p>
                </div>
                <h5>Role_AS</h5>
                <form action="{{ url('admin/update_user/' . $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>Role_As</label>
                        <select name="role_as" class="form-control">
                            <option value="1" {{ $user->role_as == '1' ? 'selected' : '' }}>Admin</option>
                            <option value="0" {{ $user->role_as == '0' ? 'selected' : '' }}>User</option>
                            <option value="2" {{ $user->role_as == '2' ? 'selected' : '' }}>Blogger</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success float-end ">Update user Role</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
