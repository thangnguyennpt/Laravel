<h2 class="text-center">Product new</h2>
<div class="row">
    @foreach ($product_new as $productitem)
        <div class="col-md-4 ">
            <x-product-card :productitem="$productitem"/>
        </div>
    @endforeach
</div>
