@extends('layouts.admin')
@section('title', 'Quản lí khách hàng')

@section('maincontent')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lí khách hàng</h1>
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
                        <a class="btn btn-sm btn-success" href="{{ route('admin.user.create') }}">
                            <i class="fas fa-plus"></i> Thêm
                        </a>
                        <a class="btn btn-sm btn-danger" href="{{ route('admin.user.trash') }}">
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
                                    <th style="width: 30px;" class="text-center">#</th>
                                    <th class="text-center">name</th>
                                    <th class="text-center">username</th>
                                    <th class="text-center">gender</th>
                                    <th style="width: 20px;" class="text-center">phone</th>
                                    <th style="width: 30px;" class="text-center">email</th>
                                    <th style="width: 180px;" class="text-center">Chức năng</th>
                                    <th style="width: 40px;" class="text-center">id</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($list as $row)
                                    <tr>
                                        <td class="text-center">
                                            <input type="checkbox">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>{{ $row->username }}</td>
                                        <td>{{ $row->gender }}</td>
                                        <td>{{ $row->phone }}</td>
                                        <td>{{ $row->email }}</td>
                                        <td class="text-center">
                                            @php
                                                $args = ['id' => $row->id];
                                            @endphp
                                            @if ($row->status == 1)
                                                <a href="{{ route('admin.user.status', $args) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="fa fa-toggle-on" aria-hidden="true"></i>
                                                </a>
                                            @else
                                                <a href="{{ route('admin.user.status', $args) }}"
                                                    class="btn btn-sm btn-danger">
                                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                                </a>
                                            @endif
                                            <a
                                                href="{{ route('admin.topic.show', $args) }}"class="btn btn-sm btn-info d-inline-block me-1">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{ route('admin.topic.edit', $args) }}"
                                                class="btn btn-sm btn-primary d-inline-block me-1">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <form action="{{ route('admin.user.delete', ['id' => $row->id]) }}"
                                                method="post" class="d-inline-block me-1 mt-1">
                                                @csrf
                                                @method('delete')
                                                <button name="delete" type="submit" class="btn btn-sm btn-danger">
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                        <td>{{ $row->id }}</td>
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
