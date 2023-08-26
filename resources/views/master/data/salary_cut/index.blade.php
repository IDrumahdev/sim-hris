@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@section('tittle')
| List Salary Cut
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                <a href="{{ route('salary-cut.create') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1">
                    <i class="fas fa-plus-circle"></i>
                    Create
                </a>
            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Salary Cut</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Master Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Salary Cut</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableSalaryCut">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" width="50px">
                                Action
                            </th>
                            <th class="text-left" width="20px">
                                No.
                            </th>
                            <th class="text-left" width="150px">
                                Salary Cut Name
                            </th>
                            <th class="text-left" width="150px">
                                Nominal
                            </th>
                            <th class="text-left" width="480px">
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
@include('master.data.salary_cut.tabel.index')
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
