@extends('layouts.admin')

@section('title')
{{ 'Manage Home Page Gallery' }}
@endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Home Page Gallery</h4>
                    <hr>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-12">
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            
            <form action="{{ route('admin.pages.small-gallery.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="image" class="form-label">Select Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary"><i class='bx bx-upload'></i> Upload Image</button>
            </form>
        </div>
        
        <div class="row mt-4">
            <h4 class="mb-sm-0 font-size-18">All Uploaded Images:</h4>
            <div class="col-md-12 mt-3">
                <div class="d-flex overflow-auto gap-3">
                    @foreach($images as $image)
                        <div class="col-md-2">
                            <img src="{{ asset($image->image_path) }}" alt="" class="img-fluid" style="object-fit: contain;">
                            <div class="mt-2">
                                {{-- <a href="{{ route('admin.pages.small-gallery.edit', ['id' => $image->id]) }}" class="btn btn-success"><i class='bx bxs-edit'></i></a> --}}

                                <form action="{{ route('admin.pages.small-gallery.delete', ['id' => $image->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this image?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"><i class='bx bxs-trash'></i> Delete Image</button>
                                </form>                                
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>        
    </div>
</div>

@endsection
