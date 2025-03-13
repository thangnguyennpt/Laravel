@extends('layouts.admin')
@section('title', 'Bang dieu khien')

@section('maincontent')

    {{-- Form for creating a new product --}}
    <form action="{{ route('admin.product.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Thêm sản phẩm</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Thêm sản phẩm</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-sm btn-success">
                                <i class="fa fa-save"></i> Lưu
                            </button>
                            <a class="btn btn-sm btn-info" href="{{ route('admin.product.index') }}">
                                <i class="fa fa-arrow-left"></i> Về danh sách
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label for="name">Tên sản phẩm</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="detail">Chi tiết</label>
                                <textarea name="detail" id="detail" rows="8" class="form-control"></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label for="category_id">Danh mục</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Chọn danh mục</option>
                                    @foreach ($list_category as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="brand_id">Thương hiệu</label>
                                <select name="brand_id" id="brand_id" class="form-control">
                                    <option value="">Chọn thương hiệu</option>
                                    @foreach ($list_brand as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="price">Giá</label>
                                <input type="number" value="" name="price" id="price" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="pricesale">Giá khuyến mãi</label>
                                <input type="number" value="" name="pricesale" id="pricesale" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="qty">Số lượng</label>
                                <input type="number" value="" name="qty" id="qty" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="image">Hình</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="status">Trạng thái</label>
                                <select name="status" id="status" class="form-control">
                                    <option value="2">Chưa xuất bản</option>
                                    <option value="1">Xuất bản</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

    {{-- Form for adding a new category --}}
    <form action="{{ route('admin.category.store') }}" method="post">
        @csrf
        <div class="card">
            <div class="card-header" id="headingCategory">
                <a class="d-block" data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true" aria-controls="collapseCategory">
                    Thêm danh mục
                </a>
            </div>
            <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory">
                <div class="card-body">
                    <div class="form-check mb-2">
                        <input type="text" name="category_name" id="category_name" class="form-control" placeholder="Tên danh mục">
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Thêm danh mục</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection
