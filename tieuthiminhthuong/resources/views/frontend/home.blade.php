@extends('layouts.site')
@section('title', 'trang chu')
@section('header')
<link rel="stylesheet" href="home.css">
@endsection
@section('maincontent')
<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="" class="d-block w-100" alt="">
        </div>
        <div class="carousel-item">
            <img src="" class="d-block w-100" alt="">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="maincontent mb-5">
  <div class="p-4">
      <h1 class="text-center mb-4">TẤT CẢ SẢN PHẨM MỚI</h1>
      <div class="row san">
          <?php
          $products = [
              [
                  'name' => 'Váy nữ',
                  'description' => 'Váy nữ.',
                  'price' => '200,000 VND',
                  'image' => 'images/hinh1.jpg'
              ],
              [
                  'name' => 'Váy nữ',
                  'description' => 'Váy nữ.',
                  'price' => '300,000 VND',
                  'image' => 'images/hinh2.jpg'
              ],
              [
                  'name' => 'Váy nữ',
                  'description' => 'Váy nữ.',
                  'price' => '350,000 VND',
                  'image' => 'images/hinh3.jpg'
              ],
              [
                  'name' => 'Váy nữ',
                  'description' => 'Váy nữ.',
                  'price' => '400,000 VND',
                  'image' => 'images/hinh4.jpg'
              ],
          ];

          foreach ($products as $product) {
              echo '
              <div class="col-6 col-md-3 mb-4">
                  <div class="card h-100">
                      <img src="' . asset($product['image']) . '" class="card-img-top" alt="' . $product['name'] . '">
                      <div class="card-body">
                          <h5 class="card-title">' . $product['name'] . '</h5>
                          <p class="card-text">' . $product['description'] . '</p>
                          <p class="card-text text-success">' . $product['price'] . '</p>
                      </div>
                  </div>
              </div>
              ';
          }
          ?>
      </div>
  </div>
@endsection
