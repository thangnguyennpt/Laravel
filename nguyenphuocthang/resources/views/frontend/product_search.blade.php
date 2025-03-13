@extends('layouts.site')

@section('title', 'Sản phẩm theo category')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
@endsection

@section('maincontent')
    <div class="row">
        @if ($list_product->isEmpty())
            <div class="col-md-12">
                <p>No results found</p>
            </div>
        @else
            @foreach ($list_product as $productitem)
                <div class="col-md-4 ">
                    <a class="" href="{{ url('/chi-tiet-san-pham', $productitem->slug) }}">
                        <x-product-card :$productitem />
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection
