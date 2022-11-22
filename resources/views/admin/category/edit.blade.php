@extends('layouts/master')

@section('title', 'Edit Category')

@section('content')
    <div class="container-fluid px-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category
                    <a href="{{ url('admin/category') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                @endif


                <form action="{{ url('/admin/update_category/' . $category->id) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Category Name</label>
                        <input type="text" class="form-control" value="{{ $category->name }}" name="name">
                    </div>
                    <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" class="form-control" value="{{ $category->slug }}" name="slug">
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea type="text" id="mySummernote" class="form-control" rows="3" name="description">{{ $category->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Image</label>
                        <input type="file" class="form-control" name="image">
                    </div>

                    <h6>SED Tags :</h6>
                    <div class="mb-3">
                        <label>Mate_Title</label>
                        <input type="text" class="form-control" value="{{ $category->mate_title }}" name="mate_title">
                    </div>
                    <div class="mb-3">
                        <label>Mate_Description</label>
                        <textarea type="text" class="form-control" rows="3" name="mate_description">{{ $category->mate_description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label>Mate_Keyword</label>
                        <textarea type="text" class="form-control" rows="3" name="mate_keyword">{{ $category->mate_keyword }}</textarea>
                    </div>
                    <h6>Status Mode :</h6>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label>navbar_status</label>
                            <input type="checkbox" name="navbar_status"
                                {{ $category->navbar_status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label>status</label>
                            <input type="checkbox" name="status" {{ $category->status == '1' ? 'checked' : '' }}>
                        </div>
                        <div class="col-mb-6">
                            <button type="submit" class="btn btn-success">Update Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
