@extends('layouts.admin')

@section('title') {{'Contact Messages'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Contact Messages</h4>
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
                        <h4 class="card-title mb-4">All Contact Messages</h4>
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
                                    <th>Name</th>
                                    <th>E-mail</th>
                                    <th>Phone Number</th>
                                    <th>Message</th>
                                    <th class="text-center">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td>{{ $contact->id }}</td>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->mobile_number }}</td>
                                        <td>{{ $contact->message }}</td>
                                        <td>
                                            <form action="{{ route('admin.contacts.destroy', ['id' => $contact->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return confirm('Are you sure you want to delete this message?')" type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>                                            
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