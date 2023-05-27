@extends('layouts.admin')

@section('title') {{ 'Edit Image' }} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit Image</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-4">Edit Image
                            <a href="{{ route('admin.gallery.index') }}" class="float-end btn btn-success btn-sm">
                                View Image Gallery
                            </a>
                        </h4>

                        <form action="{{ route('admin.gallery.update', $galleryImage->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="image">Image:</label>
                                        <input type="file" id="image" name="image" class="form-control" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset('storage/'.$galleryImage->image_path) }}" alt="Current Image" class="mt-2" style="max-width: 200px;" />
                                    </div>
                        
                                    <div class="form-group mt-4">
                                        <label for="img_alt">Image Alt Text:</label>
                                        <input type="text" name="img_alt" class="form-control" value="{{ $galleryImage->img_alt }}" />
                                        @error('img_alt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        
                                    <div class="form-group mt-4">
                                        <label for="img_title">Image Title:</label>
                                        <input type="text" name="img_title" class="form-control" value="{{ $galleryImage->img_title }}" />
                                        @error('img_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-secondary">Back</a>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection