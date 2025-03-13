@extends('layouts.admin')
@section('title', 'Thương hiệu')

@section('maincontent')


    <div class="card-body">
        {{-- code --}}
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Quản lý thương hiệu</h1>
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
                            <a class="btn btn-sm btn-danger" href="{{route('admin.brand.trash')}}">
                                <i class="fas fa-trash"></i> Thùng rác
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <form action="{{ route('admin.brand.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="name">Tên thương hiệu</label>
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
                                    <button type="submit" name="create" class="btn btn-success">Thêm thương hiệu</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-9">
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="width:30px;">#</th>
                                        <th class="text-center" style="width:90px;">Hình</th>
                                        <th>Tên thương hiêu</th>
                                        <th>Slug</th>
                                        <th class="text-center" style="width:200px;">Chức năng</th>
                                        <th class="text-center" style="width:30px;">ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($list as $row)
                                        <tr>

                                            <td class="text-center">
                                                <input type="checkbox" id="checkId" value="1" name="checkId[]">
                                            </td>
                                            <td class="text-center">
                                                <img src="{{ asset('images/brands/' . $row->image) }}" class="img-fluid"
                                                    alt="brand.png">
                                            </td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->slug }}</td>
                                            <td class="text-center">

                                                @php
                                                    $args = ['id' => $row->id];
                                                @endphp
                                                @if ($row->status == 1)
                                                    <a href="{{ route('admin.brand.status', $args) }}"
                                                        class="btn btn-sm btn-success">
                                                        <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                    </a>
                                                @else
                                                    <a href="{{ route('admin.brand.status', $args) }}"
                                                        class="btn btn-sm btn-danger">
                                                        <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                    </a>
                                                @endif

                                                <a href="{{ route('admin.brand.show', $args) }}"class="btn btn-sm btn-info">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="{{ route('admin.brand.edit', $args) }}"
                                                    class="btn btn-sm btn-primary">
                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                </a>
                                                <form action="{{ route('admin.brand.delete', ['id' => $row->id]) }}" method="post" class="mt-1">
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
