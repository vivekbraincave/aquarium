@extends('layouts.admin')

@section('title') {{ 'Manage Pages Banner' }} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Pages Banner</h4>
                    <hr>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-12">
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @elseif (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <h4 class="mb-sm-0 font-size-15">Manage Pages Banner</h4>
            <hr>

            <div class="col-lg-12">
                @if ($banner)
                    <img src="{{ asset($banner->image_path) }}" alt="Banner Image" class="img-fluid">
                @endif
            </div>

            <form action="{{ route('admin.pages.update-banner') }}" method="POST" enctype="multipart/form-data">
                @csrf
            
                <div class="mb-3 mt-4">
                    <label for="image_path" class="form-label">Change Banner Image</label>
                    <input type="file" class="form-control" id="image_path" name="image_path">
                    @error('image_path')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Upload Image</button>
                </div>
            </form>            
        </div>

    </div>
</div>

@endsection