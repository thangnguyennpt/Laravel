@extends('layouts.site')
@section('title', 'trang chu')
@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection
@section('maincontent')

    <x-banner-slide />

    <div class="container">
        <x-flash-sale />
    </div>

    <div class="container">
        <x-product-new />
    </div>
    
    <x-product-category-home />

    <x-new-post />

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
@endsection
