@extends('layouts.site')

@section('title', 'san pham')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/product.css') }}">
@endsection

@section('maincontent')
    <div class="maincontent mb-5">
        <div class="p-4">
            <h1 class="text-center text-success mb-4">TẤT CẢ SẢN PHẨM MỚI</h1>
            <div class="row san">
                <?php
                $products = [
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '500,000 VND',
                        'image' => 'images/ao1.jpg'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao2.jpg'
                    ],
                    [
                        'name' => 'Sản phẩm 3',
                        'description' => 'Mô tả ngắn về sản phẩm 3.',
                        'price' => '750,000 VND',
                        'image' => 'images/ao3.webp'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao4.jpg'
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

        <div class="p-4">
            <h1 class="text-center text-success mb-4">TẤT CẢ SẢN PHẨM SALE</h1>
            <div class="row san">
                <?php
                $products = [
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '500,000 VND',
                        'image' => 'images/ao1.jpg'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao2.jpg'
                    ],
                    [
                        'name' => 'Sản phẩm 3',
                        'description' => 'Mô tả ngắn về sản phẩm 3.',
                        'price' => '750,000 VND',
                        'image' => 'images/ao3.webp'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao4.jpg'
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

        <div class="p-4">
            <h1 class="text-center text-success mb-4">TẤT CẢ BÀI VIẾT MỚI</h1>
            <div class="row san">
                <?php
                $products = [
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '500,000 VND',
                        'image' => 'images/ao1.jpg'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao2.jpg'
                    ],
                    [
                        'name' => 'Sản phẩm 3',
                        'description' => 'Mô tả ngắn về sản phẩm 3.',
                        'price' => '750,000 VND',
                        'image' => 'images/ao3.webp'
                    ],
                    [
                        'name' => 'Ao so mi',
                        'description' => 'Ao so mi.',
                        'price' => '1,200,000 VND',
                        'image' => 'images/ao4.jpg'
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
@endsection
