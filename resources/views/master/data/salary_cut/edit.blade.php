@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker/datepicker.css') }}">
@endpush

@section('tittle')
| Edit Salary Cut
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Edit Salary Cut
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Salary Cut
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Salary Cut
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
                    @method('PUT')
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('salary-cut.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
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
                                        <label for="salary_cut_name">
                                            Salary Cut Name
                                        </label>
                                        <input type="text" id="salary_cut_name" class="form-control @error('salary_cut_name') is-invalid @enderror"
                                               name="salary_cut_name" placeholder="Salary Cut Name..."
                                               value="{{ old('salary_cut_name',$result->salary_cut_name) }}" autocomplete="off" autofocus>

                                        
                                            @error('salary_cut_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nominal">
                                            Nominal
                                        </label>
                                        <input type="number" class="form-control @error('nominal') is-invalid @enderror"
                                               name="nominal" placeholder="Nominal..."
                                               value="{{ old('nominal',$result->nominal) }}" autocomplete="off">

                                        
                                            @error('nominal')
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
                                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ old('nominal',$result->description) }}</textarea>
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
