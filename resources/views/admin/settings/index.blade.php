@extends('layouts.admin')

@section('title') {{ 'Settings' }} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18"><i class='bx bx-cog bx-spin bx-rotate-90'></i> Settings</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.settings.index.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            {{-- Website Logo & Favicon --}}
                            <div class="mt-3">
                                <div>
                                    @if (session('success'))
                                        <div class="alert alert-success">{{ session('success') }}</div>
                                    @endif
                                </div>
                                <h4 class="card-title"><i class='bx bxs-edit-alt'></i> Website Logo & Favicon</h4>
                                <p>Manage and Customize Your Website Logo and Favicon.</p>
                                <hr>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <label>Small Logo</label>
                                        <input type="file" name="small_logo" class="form-control" >

                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $settings->small_logo) }}" alt="" width="100">
                                        </div>

                                        @error('small_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6">
                                        <label>Large Logo</label>
                                        <input type="file" name="large_logo" class="form-control" >

                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $settings->large_logo) }}" alt="" height="100">
                                        </div>

                                        @error('large_logo')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="col-sm-6 mt-4">
                                        <label>Favicon</label>
                                        <input type="file" name="favicon" class="form-control" >

                                        <div class="mt-3">
                                            <img src="{{ asset('storage/' . $settings->favicon) }}" alt="" width="80">
                                        </div>

                                        @error('favicon')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror

                                    </div>

                                </div>
                            </div>

                            {{-- Website Details --}}
                            <div class="mt-5">
                                <h4 class="card-title"><i class='bx bx-detail'></i> Website Details</h4>
                                <p>Manage and update your website details and information.</p>
                                <hr>
                                <div class="row">

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name"><i class='bx bx-globe'></i> Website Name</label>
                                            <input type="text" name="website_name" class="form-control" value="{{ $settings->website_name ?? '' }}">
                                            @error('website_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label><i class='bx bx-buildings'></i> Address</label>
                                            <input type="text" value="{{ $settings->address ?? '' }}" name="address" class="form-control">
                                            @error('address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- Contact Numbers --}}

                                    <div class="col-sm-3 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-phone-call'></i> Contact Number</label>
                                            <input type="number" value="{{ $settings->contact_number1 ?? '' }}" name="contact_number1" class="form-control">
                                            @error('contact_number1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-phone-call'></i> Contact Number </label>
                                            <input type="number" value="{{ $settings->contact_number2 ?? '' }}" name="contact_number2" class="form-control">
                                            @error('contact_number2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-phone-call'></i> Contact Number </label>
                                            <input type="number" name="contact_number3" class="form-control" value="{{ $settings->contact_number3 ?? '' }}">
                                            @error('contact_number3')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-3 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-phone-call'></i> Contact Number </label>
                                            <input type="number" value="{{ $settings->contact_number4 ?? '' }}" name="contact_number4" class="form-control">
                                            @error('contact_number4')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- E-mails --}}

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-envelope'></i> E-mail Address</label>
                                            <input type="email" value="{{ $settings->email_address1 ?? '' }}" name="email_address1" class="form-control">
                                            @error('email_address1')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bx-envelope'></i> E-mail Address</label>
                                            <input type="email" name="email_address2" class="form-control" value="{{ $settings->email_address2 ?? '' }}">
                                            @error('email_address2')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bxl-facebook-circle'></i> Facebook URL</label>
                                            <input type="text" name="facebook_url" class="form-control" value="{{ $settings->facebook_url ?? '' }}">
                                            @error('facebook_url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-sm-6 mt-3">
                                        <div class="form-group">
                                            <label><i class='bx bxl-instagram'></i> Instagram URL</label>
                                            <input type="text" name="instagram_url" class="form-control" value="{{ $settings->instagram_url ?? '' }}">
                                            @error('instagram_url')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                                <div class="mt-4">
                                    <button class="btn btn-primary">Update Details</button>
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