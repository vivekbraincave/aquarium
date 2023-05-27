@extends('layouts.template')

@section('title') {{'About Us - That Aquarium'}} @endsection

@section('content')

        <div class="inner-page-banner" style="background-image: url({{ asset($banner->image_path) }}); padding: 120px 0;">
            <div class="container">
                <div class="row justify-content-center align-items-center text-center">
                    <div class="col-lg-6 align-items-center">
                        <div class="banner-content">
                            <h1>About Us</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">About Me</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="banner-img d-lg-block d-none"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="h1-story-area two mb-120 pt-120">
            <div class="container-fluid">
                <div class="row g-lg-4 gy-5">
                    <div class="col-lg-4 d-flex justify-content-lg-end justify-content-center">
                        <div class="story-img">
                            <img class="img-fluid" src="{{ asset('storage/' . $aboutUs->banner_image) }}" alt="Banner Image" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="section-title1">
                            <span><img src="{{ asset('main/images/icon/section-vec-l1.svg') }}" alt />Our Story<img src="{{ asset('main/images/icon/section-vec-r1.svg') }}" alt /></span>
                            <h2>{{ $aboutUs->heading ?? '' }}</h2>
                        </div>
                        <div class="story-content">
                            {!! nl2br(e(strip_tags($aboutUs->story_content ?? ''))) !!}
                            <div class="view-details-btn mt-4">
                                <a class="primary-btn2 btn-lg" href="{{ route('contact') }}">Contact us</a>
                            </div>
                        </div>                        
                    </div>
                </div>
            </div>
        </div>

@endsection