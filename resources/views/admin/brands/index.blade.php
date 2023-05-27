@extends('layouts.admin')

@section('title') {{'Manage Brands'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Manage Brands</h4>
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
                        <h4 class="card-title mb-4">Manage Brands
                            <a href="{{ route('admin.brands.create') }}" class="float-end btn btn-success btn-sm">
                            Add Brands</a>
                        </h4>
                        <div class="div mt-3">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif                   
                        </div>
                        <table id="example" class="table table-striped border shadow-lg" style="width:100%">
                            <thead class="text-center mx-auto">
                                <tr>
                                    <th>ID</th>
                                    <th>Brand Name</th>
                                    <th>Brand Image</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        <td>{{ $brand->id }}</td>
                                        <td>{{ $brand->name }}</td>
                                        <td>
                                            @if ($brand->image)
                                                <img src="{{ asset('images/brands/' . $brand->image) }}" alt="Brand Image" class="img-fluid" width="100" height="100">
                                            @else
                                                No Image Available
                                            @endif
                                        </td>
                                        <td>{{ $brand->status }}</td>
                                        
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a href="{{ route('admin.brands.edit', $brand->id) }}" class="btn btn-success me-1"><i class='bx bxs-edit'></i></a>
                                                <form action="{{ route('admin.brands.destroy', $brand->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this brand?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger"><i class='bx bxs-trash'></i></button>
                                                </form>
                                            </div>
                                        </td>                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection