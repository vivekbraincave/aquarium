@extends('layouts.admin')

@section('title') {{'Add Brands'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Add Brands</h4>
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
                        <h4 class="card-title mb-4">Add Brands
                            <a href="{{ route('admin.brands.index') }}" class="float-end btn btn-success btn-sm">
                            View Brands</a>
                        </h4>

                        <form action="{{ route('admin.brands.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="name">Brand Name:</label>
                                        <input type="text" name="name" placeholder="Enter Brand Name" class="form-control" />
                                        @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        
                                    <div class="form-group mt-4">
                                        <label for="image">Brand Image:</label>
                                        <input type="file" name="image" class="form-control" />
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                        
                                    <div class="form-group mt-4">
                                        <label for="status">Brand Status:</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" value="visible" {{ old('status') ? 'checked' : '' }}>
                                            <label class="form-check-label">Choose Brand status</label>
                                        </div>
                                        <small class="form-text text-muted">Check the box if you want the brand to be visible, leave it unchecked for a hidden status.</small>
                                    </div>                                    
                                                                        
                                </div>
                            </div>
                            <div class="mt-4">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection