@extends('layouts.site')

@section('title', 'Chi tiết bài viết')

@section('maincontent')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('images/posts/' . $post->image) }}" class="dti img-fluid rounded shadow" alt="{{ $post->name }}">
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4 mt-2">{{ $post->title }}</h1>
                <p class="text-muted">Mô tả: {{ $post->description }}</p>
                
            </div>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <h3 class="mb-4 h1">Chi tiết</h3>
                <div class="post-detail">
                    {!! $post->detail !!}
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-related-tab" data-bs-toggle="tab" data-bs-target="#nav-related"
                            type="button" role="tab" aria-controls="nav-related" aria-selected="true">Bài viết liên quan</button>
                        <button class="nav-link" id="nav-comments-tab" data-bs-toggle="tab" data-bs-target="#nav-comments"
                            type="button" role="tab" aria-controls="nav-comments" aria-selected="false">Bình luận</button>
                    </div>
                </nav>
                <div class="tab-content mt-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-related" role="tabpanel" aria-labelledby="nav-related-tab">
                        <div class="row">
                            @foreach ($list_post as $postitem)
                                <div class="col-md-3 mb-4">
                                    <a href="{{ url('/chi-tiet-san-pham', $postitem->slug) }}" class="text-decoration-none">
                                        <x-post-card :$postitem />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-comments" role="tabpanel" aria-labelledby="nav-comments-tab">
                        <!-- Facebook comments plugin code can go here -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('css/post_detail.css') }}">
@endsection
