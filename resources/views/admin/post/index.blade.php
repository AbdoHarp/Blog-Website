@extends('layouts/master')

@section('title', 'Posts')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">


            <div class="card-header">
                <h4>View Post
                    <a href="{{ url('admin/add_post') }}" class="btn btn-success float-end">Add Post</a>
                </h4>
            </div>
            <div class="card-body">

                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Post Name</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->category->name }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'Visible' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_post/' . $item->id) }}" class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/delete_post/' . $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>


            </div>
        </div>


    </div>
@endsection
