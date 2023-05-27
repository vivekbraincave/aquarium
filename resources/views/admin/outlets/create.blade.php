@extends('layouts.admin')

@section('title') {{'Create Outlets'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><i class='bx bx-store-alt'></i> Create Outlets</h4>
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
                        <h4 class="card-title mb-4">Create Outlet
                            <a href="{{ route('admin.outlets.index') }}" class="float-end btn btn-success btn-sm">
                            View All Outlets</a>
                        </h4>
                        <form action="{{ route('admin.outlets.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="outlet_name">Outlet Name:</label>
                                        <input type="text" name="outlet_name" class="form-control">
                                        @error('outlet_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                    <div class="form-group">
                                        <label for="image">Outlet Image:</label>
                                        <input type="file" name="image" class="form-control">
                                        @error('image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input type="text" name="address" class="form-control">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="opening_time">Working Hours (Opening Time):</label>
                                        <input type="time" name="opening_time" class="form-control">
                                        @error('opening_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="closing_time">Working Hours (Closing Time):</label>
                                        <input type="time" name="closing_time" class="form-control">
                                        @error('closing_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="second_address">Second Address:</label>
                                        <input type="text" name="second_address" class="form-control">
                                        @error('second_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="telephone">Contact Number:</label>
                                        <input type="number" name="telephone" class="form-control">
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_src">IFrame Source (Map):</label>
                                        <input type="text" name="iframe_src" class="form-control">
                                        @error('iframe_src')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_width">IFrame Width:</label>
                                        <input type="number" name="iframe_width" class="form-control">
                                        @error('iframe_width')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_height">IFrame Height:</label>
                                        <input type="number" name="iframe_height" class="form-control">
                                        @error('iframe_height')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Create Outlet</button>
                                </div>
                            </div>
                        </form>                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection