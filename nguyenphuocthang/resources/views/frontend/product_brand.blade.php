@extends('layouts.site')

@section('title', 'Sản phẩm theo brand')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('maincontent')
    <div class="maincontent mb-5">
        <div class="container">
            <h3 class="py-3 text-center">{{ $row->name }}</h3>
            <div class="row">
                <!-- Sidebar for filters -->
                <div class="col-md-3">
                    <div class="filter-section">
                        <!-- Dropdown for list_menu -->
                        <div class="mb-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    Chọn danh mục
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($list_menu as $item)
                                        @if ($item->type == 'category')
                                            <li>
                                                <a class="dropdown-item" href="{{ url('/' . $item->link) }}">{{ $item->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    Chọn thương hiệu
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    @foreach ($list_menu as $item)
                                        @if ($item->type == 'brand')
                                            <li>
                                                <a class="dropdown-item"
                                                    href="{{ url('/' . $item->link) }}">{{ $item->name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <p class="filter-title"><strong>Lọc giá</strong></p>
                            <input type="range" class="form-range" min="10000" max="1000000" step="10000"
                                id="priceRange">
                            <div class="d-flex justify-content-between">
                                <span>10,000</span>
                                <span>1,000,000</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product listing -->
                <div class="col-md-9">
                    <h2 class="text-center">Product</h2>
                    <div class="row">
                        @foreach ($list_product as $productitem)
                            <div class="col-md-4 ">
                                <a class="" href="{{ url('/chi-tiet-san-pham', $productitem->slug) }}">
                                    <x-product-card :$productitem />
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row mt-5">
                        <div class="col-12 d-flex justify-content-center">
                            {{ $list_product->links() }}
                        </div>
                    </div>

                    {{-- product new --}}
                    <div class="text-center">
                        <x-product-new />
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
