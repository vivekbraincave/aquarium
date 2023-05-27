@extends('layouts.template')

@section('title') {{'Contact Us - That Aquarium'}} @endsection

@section('content')

        <div class="inner-page-banner" style="background-image: url({{ asset($banner->image_path) }}); padding: 120px 0;">
            <div class="container">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-lg-6 align-items-center">
                        <div class="banner-content">
                            <h1>Contact Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6"></div>
                </div>
            </div>
        </div>

        <!-- this is outlet section -->
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-12">
                    <div class="section-title2 text-center">
                        <h2>Our Outlets</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                @foreach($outlets as $outlet)
                    <div class="col-md-6 mb-4">
                        <div class="site-outlets">
                            <h5>{{ $outlet->outlet_name }}</h5>
                            <img src="{{ asset('storage/' . $outlet->image) }}" alt="" class="img-fluid" />
                            <p>{{ $outlet->address }}</p>
                            <p><strong>Operating Hours:</strong> {{ \Carbon\Carbon::parse($outlet->opening_time)->format('h.iA') }} to {{ \Carbon\Carbon::parse($outlet->closing_time)->format('h.iA') }}</p>
                            <p>
                                {{ $outlet->second_address }}<br>
                                <strong>Telephone:</strong> {{ $outlet->telephone }}
                            </p>
                            <iframe src="{{ $outlet->iframe_src }}" width="100%" height="{{ $outlet->iframe_height }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
        <div class="contact-pages pt-120 mb-120">
            <div class="container">
                <div class="row align-items-center g-lg-4 gy-5">
                    <div class="col-lg-5">
                        <div class="contact-left">
                            <div class="hotline mb-80">
                                <h3>Call Us Now</h3>
                                <div class="icon">
                                    <img src="{{ asset('main/images/icon/phone-icon4.svg') }}" alt />
                                </div>
                                <div class="info">
                                    <h6><a href="tel:+6587781447">(+65) 8778 1447 (Tampines)</a></h6>
                                    <h6><a href="tel:+6567585488">(+65) 6758 5488 (Yishun)</a></h6>
                                    <h6><a href="tel:+6597801839">(+65) 9780 1839 (Changi)</a></h6>
                                    <h6><a href="tel:+6591705488">(+65) 9170 5488 (Clementi)</a></h6>
                                </div>
                            </div>
                            <div class="location">
                                <h3>Mail Us Now</h3>
                                <div class="icon">
                                    <img src="{{ asset('main/images/icon/envlope-icon.svg') }}" alt="" style="width: 50px;" />
                                </div>
                                <div class="info">
                                    <h6>
                                        <a href="mailto:admin@thataquarium.com">admin@thataquarium.com</a> <br />
                                        <a href="mailto:info@thataquarium.com">info@thataquarium.com</a>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="contact-form">
                            <h2>Have Any Questions</h2>
                            <div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success">
                                        {{Session::get('success')}}
                                    </div>
                                @endif
                            </div>
                            <form action="{{ route('contact.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-12 mb-40">
                                        <div class="form-inner">
                                            <input type="text" value="{{old('name')}}" name="name" placeholder="Enter your name" />
                                        </div>
                                        <div class="mt-2">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-40">
                                        <div class="form-inner">
                                            <input type="text" value="{{ old('email') }}" name="email" placeholder="Enter your email" />
                                        </div>
                                        <div class="mt-2">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-40">
                                        <div class="form-inner">
                                            <input type="text" value="{{ old('mobile_number') }}" name="mobile_number" placeholder="Enter Mobile No." />
                                        </div>
                                        <div class="mt-2">
                                            @error('mobile_number')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-40">
                                        <div class="form-inner">
                                            <textarea name="message" placeholder="Your message">{{ old('message') }}</textarea>
                                        </div>
                                        <div class="mt-2">
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>                                    
                                    <div class="col-lg-12">
                                        <div class="form-inner">
                                            <button class="primary-btn1">Send Message <i class="bi bi-arrow-right"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection