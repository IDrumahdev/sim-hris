@push('customCss')

@endpush

@section('tittle')
| Edit Data Payrol
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Edit Data Payrol
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Data Payrol
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Data Payrol
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
                    <form class="form" action="{{ route('payroll.update',$result->id) }}" method="POST">
                        @method('PUT')
                        @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('payroll.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-success icon icon-left me-1 mb-1">
                                        <i class="fas fa-edit"></i>
                                        Edit
                                    </button>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Employee
                                    </label>
                                        <select class="form-select @error('employee_id') is-invalid @enderror" name="employee_id">
                                            <option value="" selected>Choose Employee...</option>
                                            @foreach($employees as $employee)
                                                @if (old('employee_id') == $employee->id)
                                                    <option value="{{ $employee->id }}" selected>
                                                        {{ ucwords($employee->full_name) }} - {{  $employee->nip }}
                                                    </option>
                                                @else
                                                    <option value="{{ $employee->id }}" {{ $employee->id == $result->employee_id ? 'selected' : '' }}>
                                                        {{ ucwords($employee->full_name) }} - {{  $employee->nip }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    
                                                @error('employee_id')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basic_salary">
                                            Basic Salary
                                        </label>
                                        <input type="number" class="form-control @error('basic_salary') is-invalid @enderror"
                                               name="basic_salary" placeholder="Basic Salary..."
                                               value="{{ old('basic_salary',$result->basic_salary) }}" autocomplete="off">

                                        
                                            @error('basic_salary')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="allowance">
                                            Allowance
                                        </label>
                                        <input type="number" id="allowance" class="form-control @error('allowance') is-invalid @enderror"
                                               name="allowance" placeholder="Allowance..."
                                               value="{{ old('allowance',$result->allowance) }}" autocomplete="off" autofocus>

                                        
                                            @error('allowance')
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
