@extends('layouts.admin')
@section('title', 'product trash')

@section('maincontent')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>trash</h1>
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
                        <a href="{{ route('admin.product.index') }}" class="btn btn-sm btn-primary mt-1" title="Delete">
                            <i class="fa fa-arrow-left" aria-hidden="true"></i> back
                        </a>
                    </div>
                </div>
            </div>
            <div class="card-body">


                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th style="width: 90px;" class="text-center">Hinh</th>
                            <th>Ten san pham</th>
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
                                <td>{{ $row->price }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('admin.product.show', ['id' => $row->id]) }}"
                                            class="btn btn-sm btn-info mt-1 mr-1" title="View">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.product.restore', ['id' => $row->id]) }}"
                                            class="btn btn-sm btn-primary mt-1 mr-1" title="Edit">
                                            <i class="fa fa-undo-alt" aria-hidden="true"></i>
                                        </a>
                                        <form action="{{ route('admin.product.destroy', ['id' => $row->id]) }}"
                                            method="post" class="mt-1">
                                            @csrf
                                            @method('delete')
                                            <button name="delete" type="submit" class="btn btn-sm btn-danger">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </button>
                                        </form>
                                    </div>
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
    </section>

@endsection
