<link href="{{ asset('css/productCard.css') }}" rel="stylesheet">

<div class="alert alert-light product-card">
    <div class="text-center">
        <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">
            <img src="{{ asset('images/products/' . $product->image) }}" class="rounded product-image" alt="hinh"
            style="max-width:280px; max-height:300px;">
        </a>
    </div>
    <div class="text-center pt-3 mt-3 border-top" style="max-height:60px;">
        <span class="product-name d-block">
            <a href="{{ route('site.product.detail', ['slug' => $product->slug]) }}">{{ $product->name }}</a>
        </span>
        <div class="price-box">
            @if ($product->pricesale > 0 && $product->pricesale < $product->price)
                <div class="col-9">
                    {{ number_format($product->pricesale) }}
                    <del>{{ number_format($product->price) }}</del>
                </div>
            @else
                <div class="col-12">
                    <del>{{ number_format($product->price) }}</del>
                </div>
            @endif
        </div>
    </div>
</div>
