@extends('layouts.admin')

@section('title') {{'Manage Gallery'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Image Gallery</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-12">
                                    
            <div class="row mb-3">
                <div class="col-xl-4 col-sm-6">
                    <div class="mt-2">
                        <h5>Gallery Images</h5>
                    </div>
                </div>
                <div class="col-lg-8 col-sm-6">
                    <form class="mt-4 mt-sm-0 float-sm-end d-sm-flex align-items-center">
                        <a href="{{ route('admin.gallery.create') }}" class="btn btn-success">Add Images</a>
                    </form>
                </div>
                <div class="div mt-3">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif                   
                </div>
            </div>
            <div class="row">
                @foreach ($gallery_images as $galleryimg)
                    <div class="col-xl-4 col-sm-6">
                        <div class="card shadow-lg">
                            <div class="card-body">
                                <div class="product-img position-relative">
                                    <img src="{{ asset('storage/' . $galleryimg->image_path) }}" alt="{{ $galleryimg->img_alt }}" title="{{ $galleryimg->img_title }}" class="img-fluid mx-auto d-block">
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('admin.gallery.edit', $galleryimg->id) }}" class="btn btn-primary btn-sm">Edit Image</a>
                                    <form action="{{ route('admin.gallery.destroy', $galleryimg->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Are you sure you want to delete this image?');" class="btn btn-danger btn-sm">Delete Image</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-lg-12">
                    {{-- <ul class="pagination pagination-rounded justify-content-center mt-3 mb-4 pb-1">
                        <li class="page-item disabled">
                            <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                        </li>
                        <li class="page-item">
                            <a href="javascript: void(0);" class="page-link">1</a>
                        </li>
                        <li class="page-item active">
                            <a href="javascript: void(0);" class="page-link">2</a>
                        </li>
                        <li class="page-item">
                            <a href="javascript: void(0);" class="page-link">3</a>
                        </li>
                        <li class="page-item">
                            <a href="javascript: void(0);" class="page-link">4</a>
                        </li>
                        <li class="page-item">
                            <a href="javascript: void(0);" class="page-link">5</a>
                        </li>
                        <li class="page-item">
                            <a href="javascript: void(0);" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                        </li>
                    </ul> --}}
                </div>
            </div>
        </div>

    </div>
</div>

@endsection