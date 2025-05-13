@extends("layouts.layout")
@section('title', 'Danh sách sản phẩm')

@section("contents")
    <!-- ***** Main Banner Area Start ***** -->
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Danh sách sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Products Area Starts ***** -->
    <section class="section" id="products">



        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-heading">
                        <form class="d-flex" action="{{ route('products.search') }}" role="search" method="GET">
                            <input class="form-control mr-2" type="search" name="query"
                                placeholder="Tìm kiếm theo tên sản phẩm" aria-label="Search" />
                            <button class="btn btn-outline-secondary border  " type="submit">Tìm</button>
                        </form>
                    </div>
                </div>
            </div>
            {{-- <div class="mb-3 ">
                <select name="sort" class="form-select me-2 p-1 border rounded " onchange="this.form.submit()">
                    <option class="border rounded " value="">Sắp xếp theo</option>
                    <option class="border rounded " value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Tên: A → Z
                    </option>
                    <option class="border rounded " value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Tên: Z → A
                    </option>
                    <option class="border rounded " value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Giá: Thấp →
                        Cao</option>
                    <option class="border rounded " value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Giá: Cao →
                        Thấp</option>
                </select>
            </div> --}}
            <div class="row">
                @if($products->isEmpty())
                    <div class="alert alert-warning w-100 text-center">
                        Không tìm thấy sản phẩm nào phù hợp.
                    </div>
                @else
                    @foreach($products as $product)
                        <div class="col-lg-4">
                            <div class="item">
                                <div class="thumb">
                                    <div class="hover-content">
                                        <ul>
                                            <li><a href="{{ route('detail-product', $product->slug) }}"><i
                                                        class="fa fa-eye"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-star"></i></a></li>
                                            <li><a href="single-product.html"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <img src="{{asset('storage/' . $product->firstImage)}}" alt="">
                                </div>
                                <div class="down-content">
                                    <h4>{{ $product->name }}</h4>
                                    <span>{{ number_format($product->price) }}</span>
                                    <ul class="stars">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    @endforeach
                @endif
                @if ($products->lastPage() > 1)
                    <div class="col-lg-12">
                        <div class="pagination">
                            <ul>

                                {{-- Nút "trang trước" --}}
                                @if ($products->onFirstPage())
                                    <li class="disabled">
                                        <span>
                                            </span>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ $products->previousPageUrl() }}">
                                            < </a>
                                    </li>
                                @endif

                                {{-- Các trang --}}
                                @for ($i = 1; $i <= $products->lastPage(); $i++)
                                    <li class="{{ $i == $products->currentPage() ? 'active' : '' }}">
                                        <a href="{{ $products->url($i) }}">{{ $i }}</a>
                                    </li>
                                @endfor

                                {{-- Nút "trang sau" --}}
                                @if ($products->hasMorePages())
                                    <li>
                                        <a href="{{ $products->nextPageUrl() }}">></a>
                                    </li>
                                @else
                                    <li class="disabled"><span></span></li>
                                @endif

                            </ul>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>
    <!-- ***** Products Area Ends ***** -->
@endsection
