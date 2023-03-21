@extends('admin.layouts.body')

@section('title', 'AdminLTE 3 | Registration Page (v2)')

@section('styles')
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href={{asset("assets/admin/plugins/fontawesome-free/css/all.min.css")}}>
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href={{asset("assets/admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css")}}>
    <!-- Theme style -->
    <link rel="stylesheet" href={{asset("assets/admin/dist/css/adminlte.min.css")}}>
@endsection

@section('body_class', 'hold-transition register-page')

@section('navbar')
@endsection

@section('main_sidebar')
@endsection

@section('content-wrapper')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <h1>
                    <b>Registration of admin user</b>
                </h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.registration.store') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="name" class="form-control" value="{{ old('name') }}"
                               placeholder="Your name" aria-label="Name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control"
                               placeholder="Email" aria-label="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        @error('email')
                        <div class="alert alert-danger mt-3" style="text-align: center;" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control"  placeholder="Password"
                        aria-label="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password_confirmation" class="form-control"
                               placeholder="Confirmation password" aria-label="Confirmation password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                <label for="agreeTerms">
                                    I agree to the <a href="javascript:void(0);">terms</a>
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->

                        @if ($errors->any())
                            <div class="alert alert-danger mt-3" style="text-align: center;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <b> {{ $error }}</b><br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </form>

                <a href="{{ route('admin.login.show') }}" class="text-center">
                    I already have a membership
                </a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
@endsection

@section('sidebar')
@endsection

@section('footer')
@endsection

@section('scripts')
    <!-- jQuery -->
    <script src={{asset("assets/admin/plugins/jquery/jquery.min.js")}}></script>
    <!-- Bootstrap 4 -->
    <script src={{asset("assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js")}}></script>
    <!-- AdminLTE App -->
    <script src={{asset("assets/admin/dist/js/adminlte.min.js")}}></script>
@endsection


