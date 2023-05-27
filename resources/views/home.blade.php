@extends('layouts.template')

@section('title') {{'That Aquarium'}} @endsection

@section('content')
<div class="hero2">
    <div class="video-wraper">
        @foreach ($banners as $banner)
            @if ($banner->fileType === 'video')
                <video autoplay loop muted preload="auto" style="width: 100%;">
                    <source src="{{ $banner->file }}" type="video/mp4" />
                </video>
            @elseif ($banner->fileType === 'image')
                <img src="{{ $banner->file }}" alt="Banner image" style="width: 100%;">
            @endif
        @endforeach
    </div>
    <div class="right-sidebar">
        <div class="social-area">
            <ul>
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


<!-- this is box area section-->

<div class="container">
    <div class="section-title2 text-center my-3">
        <h2>Everything You Need In A Tank</h2>
    </div>
    <div class="row">
        <div class="col-md-4 mt-3">
            @if($tankimages->count() > 0)
                <img src="{{ asset($tankimages[0]->image_path) }}" alt="" class="img-fluid" style="width: 100%; height: 460px; object-fit: cover;">
            @else
                <img src="assets/images/1.jpg" alt="" class="img-fluid" style="width: 100%; height: 460px; object-fit: cover;">
            @endif
        </div>
        <div class="col-md-8">
            <div class="row">
                @foreach($tankimages as $index => $image)
                    @if($index > 0)
                        <div class="col-md-6 mt-3"> <!-- Add the mt-3 class here -->
                            <div class="right-side-img">
                                <img src="{{ asset($image->image_path) }}" class="img-fluid" style="height: 220px; width: 100%; object-fit: cover;">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>        
    </div>    
</div>

<!-- this is partner area sections-->
<div class="partner-area my-5 py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title2 text-center">
                    <h2>Brands We Work with</h2>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="swiper h2-partner">
                <div class="swiper-wrapper">

                @foreach ($brands as $brand)

                    <div class="swiper-slide">
                        <div class="partner-logo">
                            <img class="img-fluid" src="{{ asset('images/brands/' . $brand->image) }}" />
                        </div>
                    </div>

                @endforeach

                </div>
            </div>
        </div>
    </div>
</div>

<div class="h2-testimonial-area mb-120">
    <div class="container">
        <div class="row mb-60">
            <div class="col-lg-12">
                <div class="section-title2 text-center">
                    <h2>What Our Customer Say</h2>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-lg-12">
                <div class="client-review-area">
                    <div class="single-area"></div>
                    <div class="total-review">
                        <img src="{{ asset('main/images/icon/total-review-star.svg') }}" alt />
                        <h3>4.4</h3>
                    </div>
                    <div class="single-area">
                        <div class="icon">
                            <img src="{{ asset('main/images/icon/google.svg') }}" alt />
                            <p>Rating</p>
                        </div>
                        <div class="review">
                            <ul>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                                <li><i class="bi bi-star-fill"></i></li>
                            </ul>
                            <span>390 reviews</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="swiper h2-testimonial-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-content text-center">
                                <div class="quat-icon">
                                    <img class="left-quat" src="{{ asset('main/images/icon/left-quat.svg') }}" alt />
                                    <img class="right-quat" src="{{ asset('main/images/icon/right-quat.svg') }}" alt />
                                </div>
                                <div class="foot-vector">
                                    <img class="testimonial-vec-left" src="{{ asset('main/images/icon/h2-testimonial-vec-left.svg') }}" alt />
                                    <img class="testimonial-vec-right" src="{{ asset('main/images/icon/h2-testimonial-vec-right.svg') }}" alt />
                                </div>
                                <div class="author-name-deg">
                                    <h3>Andy</h3>
                                    <span>Customer</span>
                                </div>
                                <p>
                                    Wonderful people and top class customer service. I've been buying fishes and fish food from them for years and everytime the staff were friendly and willing to help. Bought Oscars, parrot fish,
                                    betta and lots of other fishes. The staff know everything and very well experienced in every kinds of fish care. Well done and keep up the passion for the ornamental fish hobby.
                                </p>
                                <div class="review">
                                    <ul>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="testimonial-img">
                                <img src="{{ asset('main/images/bg/h1-testi1.png') }}" alt="" style="width: 100px;" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-content text-center">
                                <div class="quat-icon">
                                    <img class="left-quat" src="{{ asset('main/images/icon/left-quat.svg') }}" alt />
                                    <img class="right-quat" src="{{ asset('main/images/icon/right-quat.svg') }}" alt />
                                </div>
                                <div class="foot-vector">
                                    <img class="testimonial-vec-left" src="{{ asset('main/images/icon/h2-testimonial-vec-left.svg') }}" alt />
                                    <img class="testimonial-vec-right" src="{{ asset('main/images/icon/h2-testimonial-vec-right.svg') }}" alt />
                                </div>
                                <div class="author-name-deg">
                                    <h3>Ben Tan</h3>
                                    <span>Customer</span>
                                </div>
                                <p>
                                    This aquarium shop is well managed, fishes are properly quarantine and the range of fishes and equipments are good. Reasonable pricing. Cool to visit and see if any fishes catches your eyes 🤣 or
                                    plants or shrimps.
                                </p>
                                <div class="review">
                                    <ul>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="testimonial-img">
                                <img src="{{ asset('main/images/bg/h1-testi1.png') }}" alt="" style="width: 100px;" />
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="testimonial-wrap">
                            <div class="testimonial-content text-center">
                                <div class="quat-icon">
                                    <img class="left-quat" src="{{ asset('main/images/icon/left-quat.svg') }}" alt />
                                    <img class="right-quat" src="{{ asset('main/images/icon/right-quat.svg') }}" alt />
                                </div>
                                <div class="foot-vector">
                                    <img class="testimonial-vec-left" src="{{ asset('main/images/icon/h2-testimonial-vec-left.svg') }}" alt />
                                    <img class="testimonial-vec-right" src="{{ asset('main/images/icon/h2-testimonial-vec-right.svg') }}" alt />
                                </div>
                                <div class="author-name-deg">
                                    <h3>DL</h3>
                                    <span>Customer</span>
                                </div>
                                <p>
                                    This place is neat, loaded with almost everything you need for the hobby. You can also find super duper friendly staff. And I really mean super friendly! From the cashiers to the sales staff, the
                                    supervisor and manager all are nice sincere people! I only visit this place for my aquarium needs. And I highly recommend this place!
                                </p>
                                <div class="review">
                                    <ul>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                        <li><i class="bi bi-star-fill"></i></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="testimonial-img">
                                <img src="{{ asset('main/images/bg/h1-testi1.png') }}" alt="" style="width: 100px;" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-between">
                <div class="slider-btn prev-btn-5">
                    <i class="bi bi-arrow-left"></i>
                </div>
                <div class="swiper-scrollbar"></div>
                <div class="slider-btn next-btn-5">
                    <i class="bi bi-arrow-right"></i>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection