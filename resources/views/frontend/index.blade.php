@extends('layouts.app')


@section('title', "$setting->meta_title")
@section('meta_description', "$setting->meta_keyword")
@section('meta_keyword', "$setting->meta_description")


@section('content')

    <div class="bg-secondary py-5">
        <div class="container">
            <div class="row">
                <div class="col-mb-12">
                    <div class="owl-carousel category-carousel owl-theme">
                        @foreach ($all_category as $all_cate_item)
                            <div class="item">
                                <a href="{{ url('tutorial/' . $all_cate_item->slug) }}" class="text-decoration-none">
                                    <div class="card">
                                        <img src="{{ asset('uploads/category/' . $all_cate_item->image) }}" alt="img">
                                        <div class="card-body text-center">
                                            <h5 class="text-dark">{{ $all_cate_item->name }}</h5>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-2  bg-gary">
        <div class="container">
            <div class="border text-center p-3">
                <h3>Advertise here</h3>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>AbdelRahman Of Web It </h4>
                    <div class="underline"></div>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat temporibus molestias quia
                        debitis tempora reprehenderit nulla! Voluptate dolor esse facere debitis quasi voluptatibus
                        praesentium aspernatur dignissimos. Facere unde aliquid eum?
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quaerat temporibus molestias quia
                        debitis tempora reprehenderit nulla! Voluptate dolor esse facere debitis quasi voluptatibus
                        praesentium aspernatur dignissimos. Facere unde aliquid eum?
                    </p>

                </div>
            </div>
        </div>
    </div>

    <div class="py-5 bg-gary">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>All Categorys List </h4>
                    <div class="underline"></div>
                </div>
                @foreach ($all_category as $all_cateitem)
                    <div class="col-md-3">
                        <div class="card card-body">
                            <a href="{{ url('tutorial/' . $all_cateitem->slug) }}" class="text-decoration-none">
                                <h4 class="text-dark">{{ $all_cateitem->name }}</h4>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-5 bg-white">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h4>Latest Posts </h4>
                    <div class="underline"></div>
                </div>
                <div class="col-md-8">
                    @foreach ($latest_posts as $latest_post_item)
                        <div class="card card-body bg-gary shadow mb-3">
                            <a href="{{ url('tutorial/' . $latest_post_item->category->slug . '/' . $latest_post_item->slug) }}"
                                class="text-decoration-none">
                                <h4 class="text-dark">{{ $latest_post_item->name }}</h4>
                            </a>
                            <span class="ms-3">Posted
                                On : {{ $latest_post_item->category->created_at->format('d-m-Y') }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="col-md-4">
                    <div class="border text-center p-3">
                        <h3>Advertise here</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
