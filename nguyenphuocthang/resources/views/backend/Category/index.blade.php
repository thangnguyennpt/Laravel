@extends('layouts.admin')
@section('title', 'Category')

@section('maincontent')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản Lí Danh Mục</h1>
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
                        <a href="{{ route('admin.category.trash') }}" class="btn btn-sm btn-danger mt-1" title="Delete">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <!-- form them -->
                        <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="name">Tên danh mục</label>
                                <input type="text" value="{{ old('name') }}" name="name" id="name"
                                    class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Mô tả</label>
                                <textarea name="description" id="description" class="form-control">
                                {{ old('description') }}
                              </textarea>
                            </div>

                            <div class="mb-3">
                                <label for="parent_id">Danh mục cha</label>
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0">None</option>
                                    {!! $htmlparentid !!}
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="sort_order">Sắp xếp</label>
                                <select name="sort_order" id="sort_order" class="form-control">
                                    <option value="0">None</option>
                                    {!! $htmlsortorder !!}
                                </select>
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
                            <div class="mb-3">
                                <button type="submit" name="create" class="btn btn-success">Thêm danh mục</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-8">
                        <div style="overflow-y: auto; height: 500px;">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="thead-info">
                                    <tr>
                                        <th style="width: 30px;" class="text-center">#</th>
                                        <th style="width: 90px;" class="text-center">Hình</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Mô tả</th>
                                        <th style="width: 180px;" class="text-center">Chức năng</th>
                                        <th style="width: 30px;" class="text-center">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr>
                                            <td class="text-center">
                                                <input type="checkbox" name="checkId[]" id="checkId" value="1">
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('images/categorys/' . $row->image) }}"
                                                    class="img-fluid rounded" alt="{{ $row->name }}"
                                                    style="max-width: 80px;">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->description }}</td>
                                            <td class="text-center">
                                                @php
                                                    $args = ['id' => $row->id];
                                                @endphp
                                                @if ($row->status == 1)
                                                    <a href="{{ route('admin.category.status', $args) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.category.status', $args) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                    </a>
                                                @endif
                                                <a href="{{ route('admin.category.show', $args) }}"
                                                    class="btn btn-sm btn-info mt-1" title="View">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.category.edit', $args) }}"
                                                    class="btn btn-sm btn-primary mt-1" title="Edit">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route('admin.category.delete', ['id' => $row->id]) }}" method="post" class="mt-1">
                                                    @csrf
                                                    @method('delete')
                                                    <button name="delete" type="submit" class="btn btn-sm btn-danger">
                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">{{ $row->id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
