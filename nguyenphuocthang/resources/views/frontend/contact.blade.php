@extends('layouts.site')

@section('title', 'Liên Hệ')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <style>
        .centered-form {
            max-width: 1000px;
            margin: 0 auto;
        }
    </style>
@endsection

@section('maincontent')
    <h1 class="text-center text-success mb-2 mt-2">ĐIỀN THÔNG TIN LIÊN HỆ</h1>
    <div class="san container my-5 centered-form">
        <form method="post">
            @csrf
            <div class="mb-3">
                <label for="makh" class="form-label">Mã khách hàng:</label>
                <input type="text" class="form-control" id="makh" placeholder="Nhập mã khách hàng" name="ma">
            </div>
            <div class="mb-3">
                <label for="tenkh" class="form-label">Họ Tên:</label>
                <input type="text" class="form-control" id="tenkh" placeholder="Nhập tên khách hàng" name="ht">
            </div>
            <div class="mb-3">
                <label for="diachi" class="form-label">Địa chỉ:</label>
                <input type="text" class="form-control" id="diachi" placeholder="Nhập địa chỉ" name="dc">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Nhập email" name="email">
            </div>
            <div class="text-center">
                <button type="submit" class="butten btn btn-success">Lấy thông tin</button>
            </div>
        </form>
    </div>
@endsection
