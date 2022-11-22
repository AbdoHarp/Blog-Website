@extends('layouts/master')

@section('title', 'Categorys')


@section('content')


    {{-- <div class="modal fade" id="deletemodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('admin/delete_category') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Category with its post</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="category_delete_id" id="category_id">
                        <h5>Are you sure want to delete category with its all posts. ? </h5>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Yas Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div> --}}





    <div class="container-fluid px-4">

        <div class="card">
            <div class="card-header">
                <h4>View Category
                    <a href="{{ url('/admin/add_category') }}" class="btn btn-success btn-sm float-end">
                        Add Category
                    </a>
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
                                <th>Category Name</th>
                                <th>Image</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <img src={{ 'uploads/category/' . $item->image }} width="50px" height="50px"
                                            alt="img">
                                    </td>
                                    <td>{{ $item->status == '1' ? 'Hidden' : 'show' }}</td>
                                    <td>
                                        <a href="{{ url('admin/edit_category/' . $item->id) }}"
                                            class="btn btn-success">Edit</a>
                                    </td>
                                    <td>
                                        <a href="{{ url('admin/delete_category/' . $item->id) }}"
                                            class="btn btn-danger">Delete</a>
                                        {{-- <button type="button" class="btn btn-danger deletecategorybtn"
                                            value="{{ $item->id }}">Delete</button> --}}
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


{{-- @section('script')

    <script>
        $(document).ready(function() {
            $('.deletecategorybtn') click(function(e) {
                e.preventDefault();

                var category_id = $(this).val();
                $('#category_id').val(category_id);

                $('#deletemodal').modal('show');
            })
        })
    </script>
@endsection --}}
