<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />
    <style>
        span {
            font-size: 13px !important;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <img src="{{ asset('assets/images/logo.svg') }}" alt="logo">
                            </div>
                            <h4>Baru disini?</h4>
                            <h6 class="font-weight-light">Buruan daftar! hanya butuh beberapa langkah.</h6>
                            <form action="{{ route('registrasi') }}" method="POST" class="pt-3">
                                @csrf
                                <div class="form-group">
                                    <label for="nama_lengkap" class="font-weight-light">Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap" value="{{ old('nama_lengkap') }}" placeholder="nama lengkap">
                                    @error('nama_lengkap')
                                    <style>
                                        #nama_lengkap {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username" class="font-weight-light">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" value="{{ old('username') }}" placeholder="username">
                                    @error('username')
                                    <style>
                                        #username {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email" class="font-weight-light">Email</label>
                                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="email">
                                    @error('email')
                                    <style>
                                        #email {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password" class="font-weight-light">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="password">
                                    @error('password')
                                    <style>
                                        #password {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="konfirmasi password" class="font-weight-light">Konfirmasi Password</label>
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="konfirmasi password">
                                    @error('password_confirmation')
                                    <style>
                                        #password_confirmation {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nomor hp" class="font-weight-light">Nomor Hp</label>
                                    <input type="number" class="form-control" name="no_hp" id="no_hp" value="{{ old('no_hp') }}" placeholder="nomor hp">
                                    @error('no_hp')
                                    <style>
                                        #no_hp {
                                            border: 1px solid #FF4747;
                                            color: #FF4747;
                                        }
                                    </style>
                                    <div class="mt-2">
                                        <span class="text-danger">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Registrasi</a>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    Sudah punya akun? <a href="{{ route('login') }}" class="text-primary">Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    @include('sweetalert::alert')
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- endinject -->
</body>

</html>