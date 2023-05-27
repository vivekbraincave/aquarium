@extends('layouts.admin')

@section('title') {{'Edit FAQ'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Edit and Update FAQ Details</h4>
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
                        <h4 class="card-title mb-4">Edit FAQ
                            <a href="{{ route('admin.faqs.index') }}" class="float-end btn btn-success btn-sm">
                            View FAQs</a>
                        </h4>
                        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="question">Question:</label>
                                        <textarea name="question" rows="5" placeholder="Enter Question" class="form-control">{{ $faq->question }}</textarea>
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                    <div class="form-group">
                                        <label for="answer">Answer:</label>
                                        <textarea name="answer" rows="5" placeholder="Enter Answer" class="form-control">{{ $faq->answer }}</textarea>
                                        @error('answer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <div class="form-group">
                                        <label for="status">FAQ Status:</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" name="status" value="visible" {{ $faq->status == 'visible' ? 'checked' : '' }}>
                                            <label class="form-check-label">Select FAQ status</label>
                                        </div>
                                        <small class="form-text text-muted">Check the box if you want the FAQ to be visible, leave it unchecked for a hidden status.</small>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                    <button type="submit" class="btn btn-primary">Update FAQ</button>
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