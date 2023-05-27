<footer>
    <div class="container">
        <div class="row pt-90 pb-90 justify-content-center">
            <div class="col-lg-4 col-sm-6 d-flex justify-content-sm-end justify-content-start order-1">
                <div class="footer-items opening-time"></div>
            </div>
            <div class="col-lg-4 col-sm-6 order-lg-3 order-3 d-flex justify-content-sm-start justify-content-start">
                <div class="footer-items contact">
                    <h3>Contacts</h3>
                    <div class="hotline mb-30">
                        <div class="hotline-icon">
                            <img src="{{ asset('main/images/icon/phone-icon.svg') }}" alt />
                        </div>
                        <div class="hotline-info">
                            <h6 class="mb-2"><a href="tel:+65{{ $settings->contact_number1 }}">(+65) {{ $settings->contact_number1 }} (Tampines)</a></h6>
                            <h6 class="mb-2"><a href="tel:+65{{ $settings->contact_number2 }}">(+65) {{ $settings->contact_number2 }} (Yishun) </a></h6>
                            <h6 class="mb-2"><a href="tel:+65{{ $settings->contact_number3 }}">(+65) {{ $settings->contact_number3 }} (Changi) </a></h6>
                            <h6 class="mb-2"><a href="tel:+65{{ $settings->contact_number4 }}">(+65) {{ $settings->contact_number4 }} (Clementi) </a></h6>
                        </div>
                    </div>
                    <div class="email mb-30">
                        <div class="email-icon">
                            <img src="{{ asset('main/images/icon/envelope.svg') }}" alt />
                        </div>
                        <div class="email-info">
                            <h6 class="mb-10"><a href="mailto:{{ $settings->email_address1 }}">{{ $settings->email_address1 }}</a></h6>
                            <h6><a href="mailto:{{ $settings->email_address2 }}">{{ $settings->email_address2 }}</a></h6>
                        </div>
                    </div>
                    <div class="email">
                        <div class="email-info">
                            <ul class="social-icons text-center">
                                <li>
                                    <a href="{{ $settings->facebook_url }}"><i class="bx bxl-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="{{ $settings->instagram_url }}"><i class="bx bxl-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex order-lg-2 order-2 justify-content-sm-start justify-content-start">
                <div class="footer-items footer-menu-links">
                    <h3>Quick Links</h3>
                    <ul>
                        <li><a href="{{ route('home') }}">Home</a></li>
                        <li><a href="{{ route('about') }}">About</a></li>
                        <li><a href="{{ route('all-gallery') }}">Gallery</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row border-top">
            <div class="col-lg-6">
                <div class="copyright-area">
                    <p>(C) 2023 Powered by No Idea Marketing Agency and <a href="https://braincavesoft.com/" target="_blank">Braincave Software</a></p>
                </div>
            </div>
            <div class="col-lg-6 d-flex justify-content-lg-end justify-content-center">
                <ul class="footer-btm-menu">
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Help</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>