@extends('layouts/master')

@section('title', 'Posts')

@section('content')
    <div class="container-fluid px-4">
        <div class="row mt-3">


            <div class="card mt-12">
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card-header">
                    <h3>WebSite Setting</h3>
                </div>
                <div class="card-body">
                    <form action="{{ url('admin/settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="">Website Name</label>
                            <input type="text" name="website_name" required
                                @if ($setting) value="{{ $setting->website_name }}" @endif
                                class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Website logo</label>
                            <input type="file" name="website_logo" required class="form-control" />
                            @if ($setting)
                                <img src="{{ asset('uploads/settings' . $setting->logo) }}" width="70px" height="70px"
                                    alt="logo">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Website Favicon</label>
                            <input type="file" name="website_favicon" class="form-control" />
                            @if ($setting)
                                <img src="{{ asset('uploads/settings' . $setting->favicon) }}" width="70px" height="70px"
                                    alt="favicon">
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" required class="form-control">
@if ($setting)
{{ $setting->description }}
@endif
</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Title</label>
                            <input type="text" name="meta_title"
                                @if ($setting) value="{{ $setting->meta_title }}" @endif required
                                class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Keyword</label>
                            <textarea rows="3" name="meta_keyword"
                                @if ($setting) value="{{ $setting->meta_keyword }}" @endif required class="form-control">
@if ($setting)
{{ $setting->meta_keyword }}
@endif
</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3"
                                @if ($setting) value="{{ $setting->meta_description }}" @endif required class="form-control">
@if ($setting)
{{ $setting->meta_description }}
@endif
</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" required class="btn btn-success">Save</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
