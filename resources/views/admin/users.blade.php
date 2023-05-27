@extends('layouts.admin')

@section('title') {{'Users'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">All Registered Users</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-12 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-success btn-sm">Create User</a>
                    </div>
                    <div class="card-body">
                        <div class="div mt-3">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif                   
                        </div>
                        <table id="example" class="table table-striped border" style="width:100%">
                            <thead class="text-center mx-auto">
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    @can('user-edit')
                                        <th>Edit</th>
                                    @endcan
                                    @can('user-delete')
                                        <th>Delete</th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        @can('user-edit')
                                            <td>
                                                <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                            </td>
                                        @endcan
                                        @can('user-delete')
                                        <td>
                                            <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this User?')">Delete
                                                </button>                                            
                                            </form>
                                        </td>
                                        @endcan
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