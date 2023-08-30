@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@section('tittle')
| Proses Jurnal Payroll
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 d-flex justify-content-start col-md-4 order-md-1 order-last">
                <a href="{{ route('jurnalPayroll.process') }}" type="button" class="btn icon icon-left btn-primary btn-sm me-1 mb-1">
                    <i class="fas fa-random"></i>
                    Process
                </a>
            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>
                    Proses Jurnal Payroll
                </h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Process</li>
                        <li class="breadcrumb-item active" aria-current="page">Proses Jurnal Payroll</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableJurnalPayroll">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-left" width="20px">
                                No.
                            </th>
                            <th class="text-left" width="100px">
                                NIP
                            </th>
                            <th class="text-left" width="150px">
                                Full Name
                            </th>
                            <th class="text-left" width="100px">
                                Mobilephone
                            </th>
                            <th class="text-left" width="180px">
                                Job Title
                            </th>
                            <th class="text-left" width="200px">
                                Name Department
                            </th>
                            <th class="text-left" width="100px">
                                Period Name
                            </th>
                            <th class="text-left" width="150px">
                                Take Home Pay
                            </th>
                            <th class="text-left" width="100px">
                                Date Payrol
                            </th>
                            <th class="text-left" width="300px">
                                Description
                            </th>
                            <th class="text-left" width="150px">
                                Created
                            </th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
@stop
@push('customJs')
<script src="{{ asset('assets/system/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/system/js/datatables.min.js') }}"></script>
<script src="{{ asset('assets/system/js/sweetalert2.all.min.js') }}"></script>
@include('master.process.payroll.tabel.index')
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
