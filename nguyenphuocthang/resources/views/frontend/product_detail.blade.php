@extends('layouts.site')

@section('title', 'Chi tiết sản phẩm')

@section('maincontent')
    <div class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ asset('images/products/' . $product->image) }}" class="dti img-fluid rounded" alt="Product Image">
            </div>
            <div class="col-lg-6">
                <h1 class="mb-4 mt-2">{{ $product->name }}</h1>
                <p class="text-muted">mo ta: {{ $product->description }}</p>
                <div class="price-box">
                    @if ($product->pricesale > 0 && $product->pricesale < $product->price)
                        <div class="col-9">
                            price: {{ number_format($product->pricesale) }}
                            <del>{{ number_format($product->price) }}</del>
                        </div>
                    @else
                        <div class="col-12">
                            {{ number_format($product->price) }}
                        </div>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <span class="">&nbsp;&nbsp;&nbsp;&nbsp; </span>
                    <input type="number" value="1" min="0" aria-describedat="basic-addon2" id="qty">
                    <button class="input-group-text" onclick="handleAddCart({{ $product->id }})" id="basic-addon2">Đặt
                        mua</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>detail</h3>
                {!! $product->detail !!}
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-12">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home"
                            type="button" role="tab" aria-controls="nav-home" aria-selected="true">san pham lien
                            quan</button>
                        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile"
                            type="button" role="tab" aria-controls="nav-profile" aria-selected="false">comment</button>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab"
                        tabindex="0">

                        <div class="row">
                            @foreach ($list_product as $productitem)
                                <div class="col-md-3 ">
                                    <a class="" href="{{ url('/chi-tiet-san-pham', $productitem->slug) }}">
                                        <x-product-card :$productitem />
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab"
                        tabindex="0">fb</div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('header')
    <link rel="stylesheet" href="{{ asset('css/product_detail.css') }}">
@endsection
@section('footer')
    <script>
        function handleAddCart(productid) {
            let qty = document.getElementById("qty").value;
            $.ajax({
                url: "{{ route('site.cart.addcart') }}",
                type: "GET",
                data: {
                    productid: productid,
                    qty: qty
                },
                success: function(result, status, xhr) {
                    document.getElementById("showcount").innerHTML = result;
                    alert("Them sp vao gio hang thanh cong");
                    console.log(result);

                },
                error: function(xhr, status, error) {
                    alert(error);
                }
            });
        }
    </script>
@endsection
