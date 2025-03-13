@extends('layouts.admin')
@section('title', 'Edit Product')

@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Product</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Edit Product</li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Edit Product</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.product.update',['id'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="form-group mb-3">
                    <label for="name">Product Name</label>
                    <input type="text" value="{{ old('name') }}" name="name" id="name"
                        class="form-control">
                    @error('name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="detail">Product Detail</label>
                    <textarea name="detail" class="form-control" id="detail" required>
                        {{ old('detail', $product->detail) }}
                    </textarea>
                </div>
                <div class="form-group">
                    <label for="price">Product Price</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{ old('price') }}" required>
                </div>
                <div class="form-group">
                    <label for="image">Product Image</label>
                    <input type="file" name="image" class="form-control-file" id="image">
                    
                </div>

                <button type="submit" class="btn btn-primary">Update Product</button>
            </form>
        </div>
    </div>
</section>

@endsection
