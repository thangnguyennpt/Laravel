<div class="container">
    <div class="row">
        <div class="col-md-4 mb-3">
            <h4 class="text-white">ĐĂNG KÝ NHẬN TIN</h4>
            <div class="input-group">
                <input type="email" class="form-control" placeholder="Email" aria-label="Email">
                <button class="btn btn-info" type="button">Đăng ký</button>
            </div>
            <div class="social-icons mt-3">
                <a href="https://www.facebook.com/profile.php?id=100048123219635&sk=about_overview" target="_blank"
                    rel="noopener noreferrer" class="text-primary social-icon">
                    <i class="fab fa-facebook fs-1"></i>
                </a>
                <a href="https://twitter.com/your_username" target="_blank" rel="noopener noreferrer"
                    class="text-primary social-icon">
                    <i class="fab fa-twitter fs-1"></i>
                </a>
                <a href="https://www.instagram.com/thanga524012004/?hl=en" target="_blank" rel="noopener noreferrer"
                    class="text-primary social-icon">
                    <i class="fab fa-instagram fs-1"></i>
                </a>
            </div>
        </div>
        <div class="col-md-3 mb-3">
            <h5 class="text-white">Fashion-THƯƠNG HIỆU</h5>
            <ul class="footer-list list-unstyled">
                <li><a href="#" class="text-white">Giới Thiệu</a></li>
                <li><a href="#" class="text-white">Tuyển Dụng</a></li>
                <li><a href="#" class="text-white">Hướng Dẫn</a></li>
            </ul>
        </div>
        <div class="col-md-3 mb-3">
            <h5 class="text-white">WE HERE</h5>
            <ul class="footer-list list-unstyled">
                @foreach ($list as $item)
                    @if ($item->type == 'page')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/' . $item->link) }}">{{ $item->name }}</a>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div class="col-md-2 mb-3">
            <h5 class="text-white">CATEGORY</h5>
            <ul class="footer-list list-unstyled">
                <li><a href="#" class="text-white">Xu hướng</a></li>
                <li><a href="#" class="text-white">Giải đáp</a></li>
                <li><a href="#" class="text-white">Cẩm nang</a></li>
                <li><a href="#" class="text-white">Tin tức</a></li>
                <li><a href="#" class="text-white">Liên hệ</a></li>
            </ul>
        </div>
    </div>
    <div class="text-center mt-3 text-white">Thiết kế bởi: Thang</div>
</div>
