@extends('layouts.template')

@section('title') {{'Gallery - That Aquarium'}} @endsection

@section('content')
<div class="inner-page-banner" style="background-image: url({{ asset($banner->image_path) }}); padding: 120px 0;">
    <div class="container">
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-lg-6 align-items-center">
                <div class="banner-content">
                    <h1>Gallery</h1>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>
    </div>
</div>

<div class="gallery-pages pt-120 mb-120 site-gallery">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 mb--70 d-flex justify-content-center"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="row grid g-4">
                    @foreach ($gallery_images as $galleryimg)
                        <div class="col-lg-4 col-md-6 col-sm-12 grid-item food">
                            <a href="{{ asset('storage/' . $galleryimg->image_path) }}" data-fancybox="gallery" class="gallery2-img">
                                <div class="gallery-img">
                                    <img class="img-fluid" src="{{ asset('storage/' . $galleryimg->image_path) }}" alt="{{ $galleryimg->img_alt }}" />
                                    <div class="overlay">
                                        <div class="zoom-icon">
                                            <i class="bi bi-zoom-in"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 pt-30 d-flex justify-content-center">
                <div class="view-details-btn">
                    @if ($gallery_images->hasMorePages())
                        <a class="primary-btn2 btn-lg" href="{{ $gallery_images->nextPageUrl() }}">Load More</a>
                    @else
                        <a class="primary-btn2 btn-lg" href="javascript:void(0)" disabled>No more images available</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection