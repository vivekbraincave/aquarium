@extends('layouts.admin')

@section('title') {{'FAQ - Frequently Asked Questions'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Frequently Asked Questions (FAQs)</h4>
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
                        <h4 class="card-title mb-4">Frequently Asked Questions
                            @can('faq-create')<a href="{{ route('admin.faqs.create') }}" class="float-end btn btn-success btn-sm">
                            Create FAQ</a>@endcan
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
                                    <th>Question</th>
                                    <th>Status</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->id }}</td>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ $faq->status }}</td>
                                        <td class="text-center">
                                            <div class="d-flex">
                                                <a href="{{ route('admin.faqs.show', $faq->id) }}" class="btn btn-success btn-sm me-1"><span class="mdi mdi-eye-outline"></span></a>
                                        
                                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="btn btn-primary btn-sm me-1"><i class='bx bxs-edit'></i></a>
                                        
                                                <form action="{{ route('admin.faqs.destroy', $faq->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this FAQ?')">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-sm"><span class="mdi mdi-delete"></span></button>
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