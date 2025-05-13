@extends("layouts.layout")

@section("contents")
<div class="page-heading" id="top">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-content">
                    <h2>Single Product Page</h2>
                    <span>Awesome &amp; Creative HTML CSS layout by TemplateMo</span>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">

    @if(!$item)
        <p>Giỏ hàng trống.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Sản phẩm</th>
                    <th>Giá</th>
                    <th>Số lượng</th>
                    <th>Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                @foreach($item->products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ number_format($product->price) }} VND</td>
                        <td>{{ $product->pivot->quantity }}</td>
                        <td>{{ number_format($product->price * $product->pivot->quantity) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <h4 class="mt-3">Tổng cộng: <strong>{{ number_format($total) }} VND</strong></h4>
    @endif
</div>
@endsection
