@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker/datepicker.css') }}">
@endpush

@section('tittle')
| Process Jurnal Payroll
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Process Jurnal Payroll
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Jurnal Payroll
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Process Jurnal Payroll
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-4 col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form" action="" method="POST">
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('jurnalPayroll.list') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                                        <i class="fas fa-arrow-alt-circle-left"></i>
                                        Back
                                    </a>
                                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1">
                                        <i class="fas fa-random"></i>
                                        Process
                                    </button>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Period Payroll
                                    </label>
                                        <select class="form-select @error('period_payroll_id') is-invalid @enderror" name="period_payroll_id">
                                            <option value="" selected>Period Payroll...</option>
                                            @foreach($periods as $period)
                                                <option value="{{ $period->id }}"{{ old('period_payroll_id') == $period->id ? 'selected' : '' }}>
                                                    {{ ucwords($period->period_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    
                                            @error('period_payroll_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="date_payrol">
                                            Date Payroll
                                        </label>
                                        <input type="text" id="date_payrol" class="form-control @error('date_payrol') is-invalid @enderror date"
                                               name="date_payrol" placeholder="Date Payroll..."
                                               value="{{ old('date_payrol') }}" autocomplete="off">

                                        
                                            @error('date_payrol')
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
<script>
    $(function() {
        var startDate = $('.date');
        startDate.datepicker({
            autoHide: true,
            format: "yyyy-mm-dd",
        });
    });
</script>
@endpush
