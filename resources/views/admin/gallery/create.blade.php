@extends('layouts.admin')

@section('title') {{'Add Images'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Images</h4>
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
                        <h4 class="card-title mb-4">Add Images
                            <a href="{{ route('admin.gallery.index') }}" class="float-end btn btn-success btn-sm">
                            View Image Gallery</a>
                        </h4>

                        <form action="{{ route('admin.gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="images">Images:</label>
                                        <input type="file" id="files" name="images[]" multiple class="form-control" />
                                        @error('images.*')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="status">Status:</label>
                                        <select name="status" class="form-control">
                                            <option value="visible">Visible</option>
                                            <option value="hidden">Hidden</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="img_alt">Image Alt Text:</label>
                                        <input type="text" name="img_alt" class="form-control" />
                                        @error('img_alt')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label for="img_title">Image Title:</label>
                                        <input type="text" name="img_title" class="form-control" />
                                        @error('img_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                
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