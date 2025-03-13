@extends('layouts.admin')
@section('title','Quản lí liên hệ')

@section('maincontent')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Quản lí liên hệ</h1>
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
              <a class="btn btn-sm btn-danger" href="category_trash.html">
                  <i class="fas fa-trash"></i> Thùng rác
              </a>
          </div>
      <div class="card-body">
        {{-- code --}}
        <div class="row">
            
            <div class="col-12">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 30px;" class="text-center">#</th>
                            <th style="width: 90px;" class="text-center">name</th>
                            <th style="width: 90px;" class="text-center">email</th>
                            <th style="width: 90px;" class="text-center">phone</th>
                            <th style="width: 90px;" class="text-center">title</th>
                            <th style="width: 90px;" class="text-center">content</th>



                            
                           
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
                            <td>{{$row->name}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->phone}}</td>
                            <td>{{$row->title}}</td>
                            <td>{{$row->content}}</td>


                            
                            <td class="text-center">
                              @php
                              $args=['id'=> $row->id];
                              @endphp

                                <a href="{{route('admin.contact.status',$args)}}" class="btn btn-sm btn-success">
                                    <i class="fa fa-toggle-off" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.contact.show',$args)}}"class="btn btn-sm btn-info">
                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.contact.edit',$args)}}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                </a>
                                <a href="{{route('admin.contact.delete',$args)}}" class="btn btn-sm btn-danger">
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
