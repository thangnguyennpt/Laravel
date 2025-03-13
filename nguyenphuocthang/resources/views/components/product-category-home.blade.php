<link href="{{ asset('css/category_home.css') }}" rel="stylesheet">

<div class="container mt-4">
    <h2 class="text-center mb-4">Category</h2>
    <div class="row">
        @foreach($list->filter(function($category) { return $category->parent_id == '12'; })->take(3) as $category)
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="row">
                    <div class="col-md-8 card-content">
                        <h6 class="card-title">Sản phẩm</h6>
                        <h5 class="card-description">{{ $category->name }}</h5>
                    </div>
                    <div class="col-md-4">
                        <a href="{{ $category->slug }}" class="btn btn-primary">more</a>
                    </div>
                </div>
                <img src="{{ asset('images/categorys/' . $category->image) }}" class="img-fluid" alt="{{ $category->name }}" />
            </div>
        </div>
        @endforeach
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>