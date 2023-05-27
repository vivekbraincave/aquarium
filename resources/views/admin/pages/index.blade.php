@extends('layouts.admin')

@section('title') {{ 'Manage Home Page' }} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Home Page</h4>
                    <hr>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="col-lg-12">
            <h4 class="mb-sm-0 font-size-15">Change Home Page Banner</h4>
            <div class="video-wrapper mt-4">
                @if ($fileType === 'video')
                <video autoplay loop muted preload="auto" class="img-thumbnail rounded" style="width: 50%;">
                    <source src="{{ $file }}" type="video/mp4" />
                </video>
                @elseif ($fileType === 'image')
                <img src="{{ $file }}" alt="Banner image" style="width: 50%;">
                @endif
            </div>

            <form method="POST" action="{{ route('admin.pages.index') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 mt-5">
                        <div class="form-group">
                            <label for="file">File:</label>
                            <input class="form-control" type="file" name="file" accept="video/mp4,image/*" />
                        </div>

                        <div class="form-group mt-3">
                            <label for="file_type">File Type:</label>
                            <select class="form-control" name="file_type">
                                <option value="video">Video</option>
                                <option value="image">Image</option>
                            </select>
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

    </div>
</div>

@endsection
