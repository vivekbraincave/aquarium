@extends('layouts.admin')

@section('title') {{ 'Manage About Page' }} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage About Page</h4>
                    <hr>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-12">
            
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <h4 class="mb-sm-0 font-size-15">Manage About Us Page</h4>
            <form action="{{ route('admin.pages.manage-about.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-4">

                        <div class="form-group">
                            <label for="heading" class="form-label">Heading</label>
                            <input type="text" class="form-control" name="heading" value="{{ $aboutUs->heading ?? '' }}">
                            @error('heading')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <div class="mb-3">
                                <label for="banner_image" class="form-label">Change Image</label>
                                <input type="file" class="form-control" id="image" name="banner_image">
                                @if($aboutUs && $aboutUs->banner_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $aboutUs->banner_image) }}" alt="Old Image" width="150">
                                    </div>
                                @endif
                                @error('banner_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>                        

                        <div class="form-group mt-3">
                            <div class="mb-3">
                                <label for="heading" class="form-label">Content</label>
                                <textarea name="story_content" class="form-control" id="" rows="10">{{ $aboutUs->story_content ?? '' }}</textarea>
                                @error('story_content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <div>
                                <button type="submit" class="btn btn-primary">Save Change</button>
                            </div>
                            <br>
                        </div>

                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

@endsection