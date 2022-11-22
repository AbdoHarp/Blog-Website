@extends('layouts/master')

@section('title', 'Edit Post')

@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-3">



            <div class="card-header">
                <h4>Edit Post
                    <a href="{{ url('admin/posts') }}" class="btn btn-danger float-end">Back</a>
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

                <form action="{{ url('admin/update_post/' . $post->id) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="">Category</label>
                        <select name="category_id" class="form-control">
                            <option value="">-- Select category --</option>
                            @foreach ($category as $cateitem)
                                <option value="{{ $cateitem->id }}"
                                    {{ $post->category_id == $cateitem->id ? 'selected' : '' }}>
                                    {{ $cateitem->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="">Post Name</label>
                        <input type="text" value="{{ $post->name }}" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="">Slug</label>
                        <input type="text" value="{{ $post->slug }}" class="form-control" name="slug">
                    </div>
                    <div class="mb-3">
                        <label for="">Description</label>
                        <textarea rows="4" class="form-control" id="mySummernote" value="" name="description">{!! $post->description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Youtube Iframe Link</label>
                        <input type="text" class="form-control" value="{{ $post->yt_iframe }}" name="yt_iframe">
                    </div>
                    <h4>SEO Tags</h4>
                    <div class="mb-3">
                        <label for="">Meta_Title</label>
                        <input type="text" class="form-control" value="{{ $post->meta_title }}" name="meta_title">
                    </div>
                    <div class="mb-3">
                        <label for="">Meta_Description</label>
                        <textarea rows="3" class="form-control" value="" name="meta_description">{!! $post->meta_description !!}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="">Meta_Keyword</label>
                        <textarea rows="3" class="form-control" value="" name="meta_keyword">{!! $post->meta_keyword !!}</textarea>
                    </div>
                    <h4>Status</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" {{ $post->status == '1' ? 'checked' : '' }} name="status">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <button type="submit" class="btn btn-success float-end ">Update Post</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
@endsection
