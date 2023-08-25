@push('customCss')
<link rel="stylesheet" href="{{ asset('assets/system/css/choices.css') }}">
@endpush

@section('tittle')
| Create Employee
@endsection

@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-first">
                <h3>
                    Create Employee
                </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-last">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            List Employee
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Create Employee
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
                    <form class="form form-vertical" action="" method="POST">
                    @csrf

                        <div class="form-body">
                            <div class="row">
                            
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('employee.index') }}" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
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
                                        <label for="full_name">
                                            Full Name
                                        </label>
                                        <input type="text" id="full_name" class="form-control @error('full_name') is-invalid @enderror"
                                               name="full_name" placeholder="Full Name..."
                                               value="{{ old('full_name') }}" autocomplete="off" autofocus>

                                        
                                            @error('full_name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="birth_day">
                                            Birth Day
                                        </label>
                                        <input type="text" id="birth_day" class="form-control @error('birth_day') is-invalid @enderror"
                                               name="birth_day" placeholder="Birth Day..."
                                               value="{{ old('birth_day') }}" autocomplete="off">

                                        
                                            @error('birth_day')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                    <label for="first-name-vertical">
                                        Gender
                                    </label>
                                        <select class="form-select @error('gender') is-invalid @enderror" name="gender">
                                            <option value="" selected>
                                                Choose...
                                            </option>            
                                            <option value="Laki-Laki" @if (old('gender') == "Laki-Laki") {{ 'selected' }} @endif>
                                                Laki-Laki
                                            </option>
                                            <option value="Perempuan" @if (old('gender') == "Perempuan") {{ 'selected' }} @endif>
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
                                               value="{{ old('mobilephone') }}" autocomplete="off">

                                        
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
                                               value="{{ old('email') }}" autocomplete="off">

                                        
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
                                        <input type="text" id="text" class="form-control @error('date_of_entry') is-invalid @enderror"
                                               name="date_of_entry" placeholder="Active Date..."
                                               value="{{ old('date_of_entry') }}" autocomplete="off">

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
                                        <select class="form-select @error('job_title') is-invalid @enderror" name="job_title">
                                            <option value="" selected>Choose Job Title...</option>
                                            @foreach($jobtitles as $jobtitle)
                                                <option value="{{ $jobtitle->id }}"{{ old('job_title') == $jobtitle->id ? 'selected' : '' }}>
                                                    {{ ucwords($jobtitle->job_title_name) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    
                                                @error('job_title')
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
                                        <select class="form-select @error('departments') is-invalid @enderror" name="departments">
                                            <option value="" selected>Choose Departments...</option>
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}"{{ old('job_title') == $department->id ? 'selected' : '' }}>
                                                    {{ ucwords($department->department_name) }}
                                                </option>
                                            @endforeach
                                        </select>

                                            @error('departments')
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
                                        <textarea class="form-control" id="address" rows="3" name="address"></textarea>
                                        <label>Address Employee</label>
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
<script src="{{ asset('assets/system/js/choices.js') }}"></script>
<script>
    let choices = document.querySelectorAll('#choices')
    let initChoice
    for (let i = 0; i < choices.length; i++) {
        initChoice = new Choices(choices[i])
    }
</script>
@endpush

