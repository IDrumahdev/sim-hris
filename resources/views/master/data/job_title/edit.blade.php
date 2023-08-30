@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker/datepicker.css') }}">
@endpush

@section('tittle')
| Edit Job Title
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Edit Job Title
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Job Title
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Job Title
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-12 col-8">
            <div class="card">
                <div class="card-body">
                    <form class="form" action="{{ route('jobTitle.update',$result->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('jobTitle.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-success icon icon-left me-1 mb-1">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="job_title">
                                            job_title Name
                                        </label>
                                        <input type="text" id="job_title" class="form-control @error('job_title') is-invalid @enderror"
                                               name="job_title" placeholder="Job Title Name..."
                                               value="{{ old('job_title',$result->job_title_name) }}" autocomplete="off" autofocus>

                                        
                                            @error('job_title')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="first-name-vertical">
                                        Description
                                    </label>
                                    <div class="form-group with-title mb-3">
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('description',$result->description) }}</textarea>
                                        <label>Description Salary Cut</label>

                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
    <script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/system/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('assets/system/js/datepicker/datepicker.js') }}"></script>
@endpush
