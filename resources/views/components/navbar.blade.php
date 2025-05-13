<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="/" class="logo">
                        <img src="{{asset("assets/images/logo.png")}}" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Trang chủ</a></li>
                        <li class="scroll-to-section"><a href="{{ route("products") }}">Tất cả sản phẩm</a></li>
                        <li class="submenu">
                            <a href="javascript:;">Danh mục</a>
                            <ul>
                                @foreach ($categories as $category)
                                    <li><a href="{{ route('category', $category->id) }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </li>
                        <li class="scroll-to-section"><a href="{{ route("about") }}">Về chúng tôi</a></li>
                        <li class="scroll-to-section"><a href="{{ route("contact") }}">Liên hệ</a></li>
                        @if (Auth::check())
                            <li class="scroll-to-section"><a href="{{ route('cart.show') }}">🛒 Giỏ hàng</a>
                            </li>
                            <li class="scroll-to-section">
                                <a href="{{ route('profile') }}">{{ Auth::user()->name }}</a>
                            </li>
                        @else
                            <li class="scroll-to-section">
                                <a href="{{ route('login') }}">Đăng Nhập</a>
                            </li>
                        @endif
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
