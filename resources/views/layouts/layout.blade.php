<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
          rel="stylesheet">
    <title> @yield('title',"Hexashop")</title>
      <link rel="icon" href="{{ asset('assets/logo.jpg') }}" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/bootstrap.min.css")}}">
    <link rel="stylesheet" type="text/css" href="{{asset("assets/css/font-awesome.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/templatemo-hexashop.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/owl-carousel.css")}}">
    <link rel="stylesheet" href="{{asset("assets/css/lightbox.css")}}">

</head>

<body>

<!-- ***** Preloader Start ***** -->
{{-- <div id="preloader">
    <div class="jumper">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div> --}}
@include("components.navbar")

@yield("contents")
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="first-item">
                    <div class="logo">
                        <img src="{{asset("assets/images/white-logo.png")}}" alt="hexashop ecommerce templatemo">
                    </div>
                    <ul>
                        <li><a href="#"></a></li>
                        <li><a href="#">vudinhdo2409@gmail.com</a></li>
                        <li><a href="#">0326-360-023</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <h4>Mua Sắm &amp; Danh Mục</h4>
                <ul>
                    <li><a href="#">Đồ Nam</a></li>
                    <li><a href="#">Đồ Nữ</a></li>
                    <li><a href="#">Đồ trẻ em</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Useful Links</h4>
                <ul>
                    <li><a href="#">Homepage</a></li>
                    <li><a href="#">About Us</a></li>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">Contact Us</a></li>
                </ul>
            </div>
            <div class="col-lg-3">
                <h4>Help &amp; Information</h4>
                <ul>
                    <li><a href="#">Help</a></li>
                    <li><a href="#">FAQ's</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Tracking ID</a></li>
                </ul>
            </div>
            <div class="col-lg-12">
                <div class="under-footer">
                    <p>Copyright © 2022 HexaShop Co., Ltd. All Rights Reserved.

                        <br>Design: <a href="https://templatemo.com" target="_parent" title="free css templates">TemplateMo</a>
                    </p>
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>


<!-- jQuery -->
<script src="{{asset("assets/js/jquery-2.1.0.min.js")}}"></script>
<script src="{{asset("assets/js/popper.js")}}"></script>
<script src="{{asset("assets/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/js/owl-carousel.js")}}"></script>
<script src="{{asset("assets/js/accordions.js")}}"></script>
<script src="{{asset("assets/js/datepicker.js")}}"></script>
<script src="{{asset("assets/js/scrollreveal.min.js")}}"></script>
<script src="{{asset("assets/js/waypoints.min.js")}}"></script>
<script src="{{asset("assets/js/jquery.counterup.min.js")}}"></script>
<script src="{{asset("assets/js/imgfix.min.js")}}"></script>
<script src="{{asset("assets/js/slick.js")}}"></script>
<script src="{{asset("assets/js/lightbox.js")}}"></script>
<script src="{{asset("assets/js/isotope.js")}}"></script>

<!-- Global Init -->
<script src="assets/js/custom.js"></script>

<script>

    $(function () {
        var selectedClass = "";
        $("p").click(function () {
            selectedClass = $(this).attr("data-rel");
            $("#portfolio").fadeTo(50, 0.1);
            $("#portfolio div").not("." + selectedClass).fadeOut();
            setTimeout(function () {
                $("." + selectedClass).fadeIn();
                $("#portfolio").fadeTo(50, 1);
            }, 500);

        });
    });

</script>

</body>
</html>
