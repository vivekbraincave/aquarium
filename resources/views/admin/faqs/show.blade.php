@extends('layouts.admin')

@section('title') {{'View FAQ'}} @endsection

@section('content')

<div class="page-content">
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">View FAQ Details</h4>
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
                        <h4 class="card-title mb-4">FAQ Details
                            @can('faq-list')<a href="{{ route('admin.faqs.index') }}" class="float-end btn btn-success btn-sm">
                            View FAQs</a>@endcan
                        </h4>
                        <div class="row">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label for="question">Question:</label>
                                    <textarea name="question" rows="5" readonly class="form-control">{{ trim($faqs->question) }}</textarea>             
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-4">
                                <div class="form-group">
                                    <label for="answer">Answer:</label>
                                    <textarea name="answer" readonly rows="5" class="form-control">{{ trim($faqs->answer) }}</textarea>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12 mt-4 fs-5">
                                <p>Status: {{ $faqs->status }}</p>
                            </div>
                            <div class="mt-3">
                                <a href="javascript:void(0)" onclick="window.history.back()" class="btn btn-secondary btn-lg">Back</a>
                                <a href="{{ route('admin.faqs.edit',$faqs->id) }}" class="btn btn-primary btn-lg">Edit This FAQ</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection