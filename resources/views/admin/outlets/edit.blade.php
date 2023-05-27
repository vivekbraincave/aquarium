@extends('layouts.admin')

@section('title') {{'Edit Outlet'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><i class='bx bx-store-alt'></i> Edit Outlet</h4>
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
                        <h4 class="card-title mb-4">Edit Outlet
                            <a href="{{ route('admin.outlets.index') }}" class="float-end btn btn-success btn-sm">
                            View All Outlets</a>
                        </h4>
                        <form action="{{ route('admin.outlets.update', $outlet) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            
                            @csrf
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="outlet_name">Outlet Name:</label>
                                        <input type="text" value="{{ $outlet->outlet_name }}" name="outlet_name" class="form-control">
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

                                @if ($outlet->image)
                                    <div class="form-group mt-4">
                                        <label>Old Outlet Image:</label>
                                        <div>
                                            <img src="{{ asset('storage/' . $outlet->image) }}" alt="Old Outlet Image" class="img-fluid" style="max-height: 200px;">
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="address">Address:</label>
                                        <input value="{{ $outlet->address }}" type="text" name="address" class="form-control">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="opening_time">Working Hours (Opening Time):</label>
                                        <input value="{{ $outlet->opening_time }}" type="time" name="opening_time" class="form-control">
                                        @error('opening_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="closing_time">Working Hours (Closing Time):</label>
                                        <input value="{{ $outlet->closing_time }}" type="time" name="closing_time" class="form-control">
                                        @error('closing_time')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="second_address">Second Address:</label>
                                        <input value="{{ $outlet->second_address }}" type="text" name="second_address" class="form-control">
                                        @error('second_address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="telephone">Contact Number:</label>
                                        <input value="{{ $outlet->telephone }}" type="number" name="telephone" class="form-control">
                                        @error('telephone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_src">IFrame Source (Map):</label>
                                        <input value="{{ $outlet->iframe_src }}" type="text" name="iframe_src" class="form-control">
                                        @error('iframe_src')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_width">IFrame Width:</label>
                                        <input value="{{ $outlet->iframe_width }}" type="number" name="iframe_width" class="form-control">
                                        @error('iframe_width')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-6 col-sm-6 col-md-6 mt-3">
                                    <div class="form-group">
                                        <label for="iframe_height">IFrame Height:</label>
                                        <input value="{{ $outlet->iframe_height }}" type="number" name="iframe_height" class="form-control">
                                        @error('iframe_height')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Update Outlet</button>
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