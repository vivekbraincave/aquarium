@extends('layouts.admin')

@section('title') {{'Edit User'}} @endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Edit User</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Edit User
                                <a href="{{ route('admin.users.index') }}" class="float-end btn btn-success btn-sm">View All Users</a>
                            </h4>
                            
                            <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST" class="shadow">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">

                                        <div class="form-group">
                                            <label for="name">User Name:</label>
                                            <input type="text" value="{{ $user->name }}" name="name" placeholder="Enter User Name" class="form-control" />
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="email">E-mail:</label>
                                            <input type="email" value="{{ $user->email }}" name="email" placeholder="Enter User E-mail" class="form-control" />
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group mt-3">
                                            <label for="roles">Choose Role:</label>
                                            <select name="roles[]" class="form-control" multiple>
                                                @foreach ($roles as $key => $value)
                                                    <option value="{{ $key }}" @if (in_array($key, $userRole)) selected @endif>{{ $value }}</option>
                                                @endforeach
                                            </select>                                            
                                        </div>  

                                        <div class="form-group mt-3">
                                            <button type="submit" class="btn btn-primary">Update</button>
                                            <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-secondary">Back</a>
                                        </div>  
                                        
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