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
                    <b>Login in admin panel</b>
                </h1>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.login.auth') }}" method="post">
                    @csrf
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
                        <input type="text" name="password" class="form-control"  placeholder="Password"
                               aria-label="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- /.col -->
                        <div class="col">
                            <button type="submit" class="btn btn-primary btn-block">
                                Login
                            </button>
                        </div>
                        <!-- /.col -->

                        @if (count($errors) > 1)
                            <div class="alert alert-danger mt-3" style="text-align: center;" role="alert">
                                @foreach ($errors->all() as $error)
                                    <b> {{ $error }}</b><br>
                                @endforeach
                            </div>
                        @endif
                    </div>
                </form>

                <a href="{{ route('admin.registration.create') }}" class="text-center">
                    Registration
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


