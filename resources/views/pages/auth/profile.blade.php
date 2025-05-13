@extends("layouts.layout")
@section('title', 'Thông tin cá nhân')

@section("contents")
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Thông tin cá nhân</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        @auth
                                <h4>{{ Auth::user()->name }}</h4>
                                <span class="price">{{ Auth::user()->email }}</span>
                                {{-- <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor
                                    incididunt
                                    ut labore.</span>
                                <div class="quote">
                                    <i class="fa fa-quote-left"></i>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                                </div> --}}
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
