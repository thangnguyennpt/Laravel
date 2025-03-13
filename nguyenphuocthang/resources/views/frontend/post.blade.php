@extends('layouts.site')

@section('title', 'Tất Cả Bài Viết')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/...in.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('maincontent')

    <section class="page_product section">
        <div class="container py-3">
            <div class="row">
                <h3 class="py-3 text-center">post</h3>

                <!-- Sidebar for filters -->
                <div class="col-md-3">
                    <div class="filter-section">
                        <!-- Dropdown for list_menu -->
                        <div class="mb-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Chọn chủ đề
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($list_menu as $item)
                                        @if ($item->type == 'topic')
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/' . $item->link) }}">{{ $item->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-9">
                    <div class="container">
                        <div class="row">
                            @foreach ($list_post as $postitem)
                                <div class="col-md-4 ">
                                    <x-post-card :$postitem />
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        {{ $list_post->links() }}
                    </div>

                </div>

            </div>
        </div>
    </section>
@endsection