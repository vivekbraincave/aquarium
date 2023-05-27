@extends('layouts.admin')

@section('title') {{'Manage Outlets'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Outlets</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <h4 class="card-title mb-4">Manage Outlets
                            <a href="{{ route('admin.outlets.create') }}" class="float-end btn btn-success btn-sm">
                                Create Outlets
                            </a>
                        </h4>
                        <div class="div mt-3">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                        </div>
        
                    </div>
                </div>
            </div>

        </div> 

        <div class="row">
            @foreach($outlets as $outlet)
                <div class="col-xl-6">
                    <div class="card" style="height: 400px; overflow-y: auto;">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="site-outlets">
                                <h5>{{ $outlet->outlet_name }}</h5>
                                <img src="{{ asset('storage/' . $outlet->image) }}" alt="" class="img-fluid">
                                <p>{{ $outlet->address }}</p>
                                <p><strong>Operating Hours:</strong> {{ \Carbon\Carbon::parse($outlet->opening_time)->format('h.iA') }} to {{ \Carbon\Carbon::parse($outlet->closing_time)->format('h.iA') }}</p>
                                <p>
                                    {{ $outlet->second_address }}<br>
                                    <strong>Telephone:</strong> {{ $outlet->telephone }}
                                </p>
                                <iframe src="{{ $outlet->iframe_src }}" width="100%" height="{{ $outlet->iframe_height }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            </div>
                            <div class="mt-2">
                                <a href="{{ route('admin.outlets.edit', $outlet) }}" class="btn btn-success">Edit Outlet</a>
                                <form action="{{ route('admin.outlets.destroy', $outlet) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this outlet?')">Delete Outlet</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>                
               
    </div>
</div>

@endsection