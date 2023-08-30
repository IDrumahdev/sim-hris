@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker/datepicker.css') }}">
@endpush

@section('tittle')
| Create Department
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Create Department
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Department
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Department
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
                    <form class="form" action="" method="POST">
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('departments.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1">
                                        <i class="fas fa-plus-circle"></i>
                                        Create
                                    </button>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="department_name">
                                            Department Name
                                        </label>
                                        <input type="text" id="department_name" class="form-control @error('department_name') is-invalid @enderror"
                                               name="department_name" placeholder="Department Name..."
                                               value="{{ old('department_name') }}" autocomplete="off" autofocus>

                                        
                                            @error('department_name')
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description"></textarea>
                                        <label>Description</label>

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
