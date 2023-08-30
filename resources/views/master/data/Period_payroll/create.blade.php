@push('customCss')

@endpush

@section('tittle')
| Create Period Payroll
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Create Period Payroll
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Period Payroll
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Period Payroll
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
                                    <a href="{{ route('periodPayroll.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1">
                                        <i class="fas fa-plus-circle"></i>
                                        Create
                                    </button>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="period_name">
                                            Period Name
                                        </label>
                                        <input type="text" class="form-control @error('period_name') is-invalid @enderror"
                                               name="period_name" placeholder="Period Name..."
                                               value="{{ old('period_name') }}" autocomplete="off" autofocus>

                                        
                                            @error('period_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-10">
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

@endpush
