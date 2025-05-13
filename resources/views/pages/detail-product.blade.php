@extends("layouts.layout")
@section('title', 'Chi tiết sản phẩm')

@section("contents")
    <div class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Trang chi tiết sản phẩm</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->


    <!-- ***** Product Area Starts ***** -->
    <section class="section" id="product">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="left-images">
                        <img src="{{asset('storage/' . $product->firstImage)}}" alt="">
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-content">
                        <h4>{{ $product->name }}</h4>
                        <span class="price">{{ $product->price }}</span>
                        <ul class="stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod kon tempor incididunt
                            ut labore.</span>
                        <div class="quote">
                            <i class="fa fa-quote-left"></i>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiuski smod.</p>
                        </div>
                        <form action="{{ route('cart.add', $product->id) }}" method="POST">
                            @csrf
                            <div class="quantity-content">
                                <div class="left-content">
                                    <h6>No. of Orders</h6>
                                </div>
                                <div class="right-content">
                                    <div class="quantity buttons_added">
                                        <input type="button" value="-" class="minus">
                                        <input type="number" step="1" min="1" name="quantity" value="1" title="Qty"
                                            class="input-text qty text" size="4">
                                        <input type="button" value="+" class="plus">
                                    </div>
                                </div>
                            </div>

                            <div class="total">
                                <h4 id="total-amount">Total: {{ number_format($product->price) }} VND</h4>
                                <div class="main-border-button">
                                    <button type="submit">Add To Cart</button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const minusButton = document.querySelector('.minus');
            const plusButton = document.querySelector('.plus');
            const quantityInput = document.querySelector('.qty');
            const totalAmount = document.getElementById('total-amount');
            const unitPrice = {{ $product->price }}; // Giá đơn vị

            function formatCurrency(number) {
                return number.toLocaleString('en-US', {
                    style: 'currency',
                    currency: 'USD',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0
                });
            }

            function updateTotal() {
                const quantity = parseInt(quantityInput.value);
                const total = quantity * unitPrice;
                totalAmount.textContent = formatCurrency(total);
            }

            minusButton.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                    updateTotal();
                }
            });

            plusButton.addEventListener('click', function () {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
                updateTotal();
            });

            quantityInput.addEventListener('change', function () {
                updateTotal();
            });

            updateTotal(); // Cập nhật tổng số khi trang tải
        });
    </script>
@endsection
