@extends('layouts.admin')
@section('title', 'Category Show')
@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Chi tiết danh mục</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Category Show</li>
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
                    <a href="{{ route('admin.category.edit', ['id' => $category->id]) }}" class="btn btn-sm btn-primary">
                        <i class="far fa-edit"></i> Sửa
                    </a>
                    <form action="{{ route('admin.category.delete', ['id' => $category->id]) }}" method="post" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i> Xóa
                        </button>
                    </form>
                    <a class="btn btn-sm btn-info" href="{{ route('admin.category.index') }}">
                        <i class="fa fa-arrow-left"></i> Về danh sách
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="text-center" style="width:30%;">
                            <strong>Tên trường</strong>
                        </th>
                        <th class="text-center" style="width:70%;">Giá trị</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tên sản phẩm</td>
                        <td>{{ $category->name }}</td>
                    </tr>
                    <tr>
                        <td>Mô tả</td>
                        <td>{{ $category->description }}</td>
                    </tr>
                    <tr>
                        <td>Hình</td>
                        <td><img src="{{ asset('images/categorys/' . $category->image) }}" class="img-fluid rounded" alt="{{ $category->name }}" style="max-width: 150px;"></td>
                    </tr>
                    <tr>
                        <td>Trạng thái</td>
                        <td>{{ $category->status == 1 ? 'Active' : 'Inactive' }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
