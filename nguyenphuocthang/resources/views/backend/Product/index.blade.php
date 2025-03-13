@extends('layouts.admin')
@section('title', 'Product')

@section('maincontent')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lí sản phẩm</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
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
                        <a class="btn btn-sm btn-success" href="{{ route('admin.product.create') }}">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.product.trash') }}">
                            <i class="fas fa-trash"></i> Thùng rác
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{-- code --}}
                <div class="row">
                    <div class="col-12">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="width: 90px;" class="text-center">Hinh</th>
                                    <th>Ten san pham</th>
                                    <th>CategoryName</th>
                                    <th>BrandName</th>
                                    <th style="width: 180px;" class="text-center">Price</th>
                                    <th style="width: 200px;" class="text-center">Chuc nang</th>

                                    <th style="width: 30px;" class="text-center">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td>
                                            <img src="{{ asset('images/products/' . $row->image) }}" class="img-fluid"
                                                alt="{{ $row->name }}">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->categoryname }}</td>
                                        <td>{{ $row->brandname }}</td>
                                        <td>{{ $row->price }}</td>
                                        <td class="text-center">
                                            @php
                                                $args = ['id' => $row->id];
                                            @endphp

                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.product.status', $args) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.product.status', $args) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <a
                                                href="{{ route('admin.product.show', $args) }}"class="btn btn-sm btn-info mt-1">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.product.edit', $args) }}"
                                                class="btn btn-sm btn-primary mt-1">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('admin.product.delete', ['id' => $row->id]) }}" method="post" class="mt-1">
                                                @csrf
                                                @method('delete')
                                                <button name="delete" type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td class="text-center">
                                            {{ $row->id }}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
