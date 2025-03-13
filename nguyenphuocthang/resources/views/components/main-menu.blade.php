<section class="section_header bg-light py-3">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="row w-100 align-items-center">
                <div class="col-sm-2 d-flex justify-content-center">
                    <img src="{{ asset('images/logo.jpg') }}" class="lg img-fluid animated-logo"
                        alt="logo" />
                </div>
                <div class="col-sm-8 py-4 d-flex align-items-center justify-content-between">
                    <nav class="navbar navbar-expand-lg w-100">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                @foreach ($list as $item)
                                    @if ($item->type == 'custom')
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{ url('/' . $item->link) }}">{{ $item->name }}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </nav>
                    <form action="{{ route('site.product.search') }}" method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="search" name="product">
                            <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
                        </div>
                    </form>
                    
                </div>
                <div class="col-sm-2 d-flex justify-content-center align-items-center">
                    <ul class="nav jutify-content-end">
                        <li class="nav-item px-2">
                            <i class="fa-solid fa-magnifying glass"></i>
                        </li>
                        @if (Auth::check())
                            @php
                                $user = Auth::user();
                            @endphp
                            <li class="nav-item px-3">
                                {{ $user->name }}
                                <a href="{{ route('website.logout') }}">Đăng xuất</a>
                            </li>
                        @else
                            <li class="nav-item px-3">
                                <a href="{{ route('website.getlogin') }}">Đăng nhập</a>
                            </li>
                        @endif
                        <li class="nav-item px-2 position-relative">
                            @php
                                $cart = session('carts', []);
                                $count = is_array($cart) && count($cart) > 0 ? count($cart) : 0;
                            @endphp
                            <a class="item-link position-relative text-dark"
                                href="{{ route('site.cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span
                                    class="position-abs
                                    olute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    (<span id="showcount">{{ $count }}</span>)
                                </span>
                            </a>
                        </li>

                    </ul>


                </div>

            </div>
        </div>
    </nav>
</section>