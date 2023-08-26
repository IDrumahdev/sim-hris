@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/dataTables.bootstrap5.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/sweetalert2.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/toastify.css') }}">
@endpush

@section('tittle')
| List Employee
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-4 order-md-1 order-last">
                <a href="{{ route('employee.create') }}" class="btn icon icon-left btn-primary btn-sm me-1 mb-1">
                    <i class="fas fa-plus-circle"></i>
                    Create
                </a>
            </div>
            <div class="col-12 col-md-4 order-md-1 order-first">
                <h3>Data Employee</h3>
            </div>
            <div class="col-12 col-md-4 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Master Data</li>
                        <li class="breadcrumb-item active" aria-current="page">Data Employee</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="card">
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableEmployee">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-center" width="50px">
                                Action
                            </th>
                            <th class="text-left" width="20px">
                                No.
                            </th>
                            <th class="text-left" width="150px">
                                NIM
                            </th>
                            <th class="text-left" width="150px">
                                Full Name
                            </th>
                            <th class="text-left" width="100px">
                                Birth Day
                            </th>
                            <th class="text-left" width="100px">
                                Gender
                            </th>
                            <th class="text-left" width="150px">
                                Address
                            </th>
                            <th class="text-left" width="100px">
                                Mobilephone
                            </th>
                            <th class="text-left" width="100px">
                                Email
                            </th>
                            <th class="text-left" width="100px">
                                Active Date
                            </th>
                            <th class="text-left" width="100px">
                                Job Title
                            </th>
                            <th class="text-left" width="200px">
                                Department
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
@include('master.data.employee.tabel.employee')
@endpush

@push('Alert')
<script src="{{ asset('assets/system/js/toastify.js') }}"></script>
@if(Session::has('message'))
    @include('layouts.part._notif')
@endif
@endpush
