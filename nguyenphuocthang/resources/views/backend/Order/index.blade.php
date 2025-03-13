@extends('layouts.admin')
@section('title','Quản lí giỏ hàng')

@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí giỏ hàng</h1>
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
                <a class="btn btn-sm btn-danger" href="menu_trash.html">
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
                            <th style="width: 90px;" class="text-center">delivery_name</th>
                            <th style="width: 130px;" class="text-center">delivery_gender</th>

                            <th style="width: 130px;" class="text-center">delivery_email</th>
                            <th style="width: 130px;" class="text-center">delivery_phone</th>
                            <th style="width: 130px;" class="text-center">delivery_address</th>
                            
                            <th style="width: 180px;" class="text-center">Chức năng</th>
                            <th style="width: 30px;" class="text-center">ID</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $row)
                            
                        <tr>
                            <td class="text-center">
                                <input type="checkbox">
                            </td>
                            <td>{{$row->delivery_name}}</td>
                            <td>{{$row->delivery_gender}}</td>

                            <td>{{$row->delivery_email}}</td>
                            <td>{{$row->delivery_phone}}</td>
                            <td>{{$row->delivery_address}}</td>
                            
                            <td class="text-center">
                              @php
                              $args=['id'=> $row->id];
                              @endphp

                                <a href="{{route('admin.order.status',$args)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.order.show',$args)}}"class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.order.edit',$args)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.order.delete',$args)}}" class="btn btn-sm btn-danger">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td class="text-center">
                                {{$row->id}}
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
