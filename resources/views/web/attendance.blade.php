<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        {{ env('APP_NAME') }} | Attendance Employee
    </title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet"/>
    <link rel="stylesheet" href="{{ asset('assets/auth/css/boxicons.css') }}">
    
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/auth/css/theme-default.css') }}" class="template-customizer-theme-css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="{{ asset('assets/auth/css/page-auth.css') }}" />
    <link href="{{ asset('assets/auth/css/avatar.min.css') }}" rel="stylesheet">
    <script src="{{ asset('assets/auth/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/auth/js/config.js') }}"></script>
</head>
<body>
    <!-- Content -->
    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
          <div class="card">
            <div class="card-body shadow rounded">

              <div class="d-flex justify-content-center">
                <a href="{{ route('login') }}" class="app-brand-link gap-2">
                  <h4>
                    Attendance Employee
                  </h4>
                </a>
              </div>
              
              <form id="formAuthentication" class="mb-3" method="POST" action="">
                @csrf

                <div class="mb-3">
                  <label for="datetimeInput" class="form-label">Date Time Syetem</label>
                  <input type="text" class="form-control" value="{{ old('datetimeInput') }}" autocomplete="off" id="datetimeInput" readonly />
                </div>

                <div class="mb-3">
                    <label for="nip_employee" class="form-label">NIP Employee</label>
                    <input type="text" class="form-control @error('nip_employee') is-invalid @enderror" id="nip_employee" name="nip_employee" placeholder="NIP Employee..." value="{{ old('nip_employee') }}" autocomplete="off" required  autofocus/>
  
                      @error('nip_employee')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
  
                </div>

                <div class="col-12 d-flex justify-content-start">
                    <button type="reset" class="btn btn-outline-secondary icon icon-left me-1 mb-1">
                        <i class="fas fa-redo-alt"></i>
                        Reset
                    </button>
                    <button type="submit" class="btn btn-primary icon icon-left me-1 mb-1">
                        <i class="fas fa-fingerprint"></i>
                        Submit
                    </button>
                </div>

              </form>

            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" integrity="sha512-Tn2m0TIpgVyTzzvmxLNuqbSJH3JP8jm+Cy3hvHrW7ndTDcJ1w5mBiksqDBb8GpE2ksktFvDB/ykZ0mDpsZj20w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/auth/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/auth/js/popper.js') }}"></script>
    <script src="{{ asset('assets/auth/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/auth/js/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/auth/js/menu.js') }}"></script>
    <script src="{{ asset('assets/auth/js/main.js') }}"></script>

    <script>
        function formatDateTime(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
        
        return `${day}-${month}-${year} ${hours}:${minutes}:${seconds}`;
        }

        function updateDateTime() {
        const now = new Date();
        const formattedDateTime = formatDateTime(now);
        
        document.getElementById('datetimeInput').value = formattedDateTime;
        }
        setInterval(updateDateTime, 1000);
        updateDateTime();
      </script>
  </body>
</html>