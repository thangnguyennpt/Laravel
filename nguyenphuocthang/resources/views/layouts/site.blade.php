    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="{{asset('css/layoutsite.css')}}">
        <title>@yield('title')</title>
        @yield('header')
    </head>

    <body>
        <header>

            <section class="section_header bg-light">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container-fluid">
                        <div class="row w-100">
                            <div class="col-sm-2 d-flex justify-content-center" >
                                <img src="{{asset('images/logo.jpg')}}" class="logo img-fluid" alt="logo"
                                    style="border-radius: 5px; max-width: 100px; max-height: 100px;" />
                            </div>
                            <div class="col-sm-8 py-4 d-flex align-items-center justify-content-between">
                                <nav class="navbar navbar-expand-lg bg-light">
                                    <button class="navbar-toggler" type="button" onclick="toggleExpanded()"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                        <span class="navbar-toggler-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-grow-1">
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    Home
                                                </a>
                                            </li>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" role="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    Dropdown
                                                </a>
                                                <ul class="dropdown-menu">
                                                    <li>
                                                        <a class="dropdown-item" href="#">product</a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Contact</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Blog</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" href="#">Login</a>
                                            </li>
                                        </ul>
                                    </div>
                                </nav>
                                <form class="search-form me-4">
                                    <div style="display: flex;">
                                        <input type="search" placeholder="Search" value=""
                                            onchange="handleChange(event)" class="search-input rounded me-2"
                                            aria-label="Search" style="flex: 1;" />
                                        <button type="submit" class="buta search-button rounded">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-sm-2 d-flex justify-content-center">
                                <div class="d-flex align-items-center">
                                    <i class="fas fa-heart me-3" 
                                    style="margin-left: 10px"></i>
                                    <i class="fas fa-bell me-3"></i>
                                    <i class="fas fa-shopping-cart"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
</div>
</section>
</header>
<main>
    @yield('maincontent')
</main>

<footer>
    
    <!-- footer -->
    <footer class="mt-2">
        <div class="row p-3">
            <div class="col-sm-4">
                <h4 class="text-primary ms-2">ĐĂNG KÝ NHẮN TIN</h4>
                <input type="search" placeholder="Search" value="" onchange="handleChange(event)"
                    class="search-input rounded bg-info ms-2" aria-label="Search" style="flex: 1;" />
                <button type="submit" class="buta search-button bg-primary rounded">Đăng Ký</button>
                <h6 class="text-primary ms-2 mt-1">KẾT NỐI VỚI CHÚNG TÔI
                    <i class="fab fa-facebook-square facebook-icon"></i>
                </h6>
            </div>
            <div class="col-sm-3">
                <h5 class="text-primary">Fashion-THƯƠNG HIỆU
                    THỜI TRANG ĐẲNG CẤP DÀNH CHO PHÁI NỮ</h5>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Giới Thiệu</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Tuyển Dụng</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Hướng Dẫn</a>
                </li>
            </div>
            <div class="col-md">
                <h5 class="text-primary">WE HERE</h5>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Hướng dẫn mua</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Tra cứu bảo hành</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Quy định phiếu quà</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Điều khoản sử dụng</a>
                </li>
            </div>
            <div class="col-md">
                <h5 class="text-primary">CATEGORY</h5>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Xu hướng</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Giải đáp</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Cẩm nang</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">tin tức</a>
                </li>
                <li class="nav-link text-primary">
                    <a class="dropdown-item" href="#">Liên hệ</a>
                </li>
            </div>
        </div>
        <div class="row d-flex justify-content-center p-2">Thiết kế bởi: thang</div>
    </footer>
    <script src="assets/js/main.js"></script>
    </body>

</footer>
@yield('footer')

</body>

</html>