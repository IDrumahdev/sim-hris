@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
<link rel="stylesheet" href="{{ asset('assets/system/css/datepicker/datepicker.css') }}">
@endpush

@section('tittle')
| Edit Employee
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Edit Employee
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Employee
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Edit Employee
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    
    <section class="section">
        <div class="col-md-12 col-12">
            <div class="card">
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('employee.update',$result->id) }}" method="POST">
                    @method('PUT')
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-start">
                                    <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
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
                                        <label for="full_name">
                                            Full Name
                                        </label>
                                        <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror"
                                               name="full_name" placeholder="Full Name..."
                                               value="{{ old('full_name',$result->full_name) }}" autocomplete="off" autofocus>

                                        
                                            @error('full_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="date_birth_day">
                                            Birth Day
                                        </label>
                                        <input type="text" class="form-control @error('date_birth_day') is-invalid @enderror date"
                                               name="date_birth_day" placeholder="Birth Day..."
                                               value="{{ old('date_birth_day',$result->birth_day) }}" autocomplete="off">

                                        
                                            @error('date_birth_day')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Genderdepartment_id
                                    </label>
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                            <option value="" selected>
                                                Choose...
                                            </option>            
                                            <option value="Pria" @if (old('gender',$result->gender) == "Pria") {{ 'selected' }} @endif>
                                                Pria
                                            </option>
                                            <option value="Perempuan" @if (old('gender',$result->gender) == "Perempuan") {{ 'selected' }} @endif>
                                                Perempuan
                                            </option>
                                        </select>

                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="mobilephone">
                                            Mobilephone
                                        </label>
                                        <input type="text" id="mobilephone" class="form-control @error('mobilephone') is-invalid @enderror"
                                               name="mobilephone" placeholder="Mobilephone..."
                                               value="{{ old('mobilephone',$result->mobilephone) }}" autocomplete="off">

                                        
                                            @error('mobilephone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="email">
                                            Email
                                        </label>
                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                               name="email" placeholder="Email..."
                                               value="{{ old('email',$result->email ) }}" autocomplete="off">

                                        
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="date_of_entry">
                                            Active Date
                                        </label>
                                        <input type="text" class="form-control @error('date_of_entry') is-invalid @enderror date"
                                               name="date_of_entry" placeholder="Active Date..."
                                               value="{{ old('date_of_entry',$result->date_of_entry) }}" autocomplete="off">

                                            @error('date_of_entry')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Job Title
                                    </label>
                                        <select class="form-select @error('job_title_id') is-invalid @enderror" name="job_title_id">
                                            <option value="" selected>Choose Departments...</option>
                                            @foreach($jobtitles as $jobtitle)
                                                @if (old('job_title_id') == $jobtitle->id)
                                                    <option value="{{ $jobtitle->id }}" selected>
                                                        {{ ucwords($jobtitle->job_title_name) }}
                                                    </option>
                                                @else
                                                    <option value="{{ $jobtitle->id }}" {{ $jobtitle->id == $result->job_title_id ? 'selected' : '' }}>
                                                        {{ ucwords($jobtitle->job_title_name) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    
                                            @error('job_title_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Departments
                                    </label>
                                        <select class="form-select @error('department_id') is-invalid @enderror" name="department_id">
                                            <option value="" selected>Choose Departments...</option>
                                            @foreach($departments as $department)
                                                @if (old('department_id') == $department->id)
                                                    <option value="{{ $department->id }}" selected>
                                                        {{ ucwords($department->department_name) }}
                                                    </option>
                                                @else
                                                    <option value="{{ $department->id }}" {{ $department->id == $result->department_id ? 'selected' : '' }}>
                                                        {{ ucwords($department->department_name) }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>

                                            @error('department_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-8">
                                    <label for="first-name-vertical">
                                        Address
                                    </label>
                                    <div class="form-group with-title mb-3">
                                        <textarea class="form-control @error('address') is-invalid @enderror" id="address" rows="3" name="address">{{ old('address',$result->address) }}</textarea>
                                        <label>Address Employee</label>

                                        @error('address')
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
