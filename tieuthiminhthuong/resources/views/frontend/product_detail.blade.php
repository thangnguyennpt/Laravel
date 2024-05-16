@extends('layouts.site')
@section('title','chi tiet san pham')
@section('maincontent')
       <div class="maincontent mb-5">
        <div class="p-4">
            <div class="row">
                <div class="col-md-6">
                    <img src="" alt=""
                        class="img-fluid w-100 rounded" />
                </div>
                <div class="col-md-6">
                    <h1>Tên sảm phẩm</h1>
                    <h2>Gía</h2>
                    <input class="me-4 py-2 rounded" type="number" />
                    <button class="btn btn-primary mb-1">
                        <strong class="text-white me-2 px-5">Thêm</strong>
                        <!--  -->
                    </button>
                </div>
            </div>
        </div>
        <h2 class="ms-4">Chi tiết sản phẩm</h2>
        <div class="row ms-4">
            <div class="col-12">
                <p>chi tiết sản phẩm</p>
            </div>
        </div>
        <h2 class="ms-4">Sản phẩm khác</h2>

        <div class="row ms-4">
            <div class="scrollable-row">
                <div class="row san">
                <?php
                $products = [
                    [
                        'name' => 'váy nữ 1',
                        'description' => 'váy nữ 1.',
                        'price' => '200,000 VND',
                        'image' => 'images/hinh1.jpg'
                    ],
                    [
                        'name' => 'váy nữ 2',
                        'description' => 'váy nữ 2.',
                        'price' => '200,000 VND',
                        'image' => 'images/hinh2.jpg'
                    ],
                    [
                        'name' => 'váy nữ 3',
                        'description' => 'váy nữ 3.',
                        'price' => '350,000 VND',
                        'image' => 'images/hinh3.jpg'
                    ],
                    [
                        'name' => 'váy nữ 4',
                        'description' => 'váy nữ 4.',
                        'price' => '200,000 VND',
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
        </div>
    </div>
  @endsection
  @section('header')
  <link rel="stylesheet"href="home.css">
  @endsection