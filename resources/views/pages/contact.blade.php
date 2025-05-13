@extends("layouts.layout")
@section('title', 'Liên hệ')
@section("contents")
    <div class="page-heading about-page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-content">
                        <h2>Liên hệ & hỗ trợ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->

    <!-- ***** Contact Area Starts ***** -->
    <div class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div id="map">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.328280787929!2d105.78143567489033!3d21.059546780597543!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab000f0db71f%3A0xa6160a78b733cfe!2zVMOyYSA3OEI!5e0!3m2!1svi!2s!4v1747136035389!5m2!1svi!2s"
                            width="100%" height="400px" frameborder="0" style="border:0" allowfullscreen></iframe>

                        <!-- You can simply copy and paste "Embed a map" code from Google Maps for any location. -->

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h2>Bạn cần hỗ trợ? hãy liên hệ với chúng tôi</h2>
                    </div>
                    <form id="contact" action="" method="post">
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset>
                                    <input name="name" type="text" id="name" placeholder="Tên" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset>
                                    <input name="email" type="text" id="email" placeholder="Email" required="">
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <textarea name="message" rows="6" id="message" placeholder="Phản hồi"
                                        required=""></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset>
                                    <button type="submit" id="form-submit" class="main-dark-button"><i
                                            class="fa fa-paper-plane"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
