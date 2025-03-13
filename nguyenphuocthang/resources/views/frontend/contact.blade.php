@extends('layouts.site')

@section('title', 'Liên Hệ')

@section('header')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('maincontent')
    <div class="container my-5">
        <h1 class="text-center text-success mb-4">ĐIỀN THÔNG TIN LIÊN HỆ</h1>
        <div class="centered-form">
            <form method="post" >
                @csrf
                <div class="mb-3">
                    <label for="makh" class="form-label">Mã khách hàng:</label>
                    <input type="text" class="form-control @error('ma') is-invalid @enderror" id="makh" placeholder="Nhập mã khách hàng" name="ma" value="{{ old('ma') }}">
                    @error('ma')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tenkh" class="form-label">Họ Tên:</label>
                    <input type="text" class="form-control @error('ht') is-invalid @enderror" id="tenkh" placeholder="Nhập tên khách hàng" name="ht" value="{{ old('ht') }}">
                    @error('ht')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="diachi" class="form-label">Địa chỉ:</label>
                    <input type="text" class="form-control @error('dc') is-invalid @enderror" id="diachi" placeholder="Nhập địa chỉ" name="dc" value="{{ old('dc') }}">
                    @error('dc')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Nhập email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="text-center">
                    <button type="submit" class="btn btn-success btn-custom">Lấy thông tin</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Google Map -->
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-12 col-lg-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d158858.34417106882!2d-122.4194157516075!3d37.77492950681342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808580ef57cb09e5%3A0xe13b63bfe8d03c7!2sSan%20Francisco%2C%20CA%2C%20USA!5e0!3m2!1sen!2s!4v1644082214320!5m2!1sen!2s" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
