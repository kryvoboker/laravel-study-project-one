<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--CSRF Token -->

    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/alt/adminlte.light.css') }}">

    <title>Авторизация</title>
</head>
<body>

<h1>Вход</h1>

<form class="col-3 offset-4 border rounded" method="post" action="{{ route('user.login') }}">
    @csrf

    <div class="form-group">
        <label for="email" class="col-form-label-lg">Ваш email</label>
        <input class="form-control" type="text" name="email" id="email" value="" placeholder="Email">
        @error('email')
        <div class="alert-light alert-default-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password" class="col-form-label-lg">Пароль</label>
        <input class="form-control" type="text" name="password" id="password" value="" placeholder="password">
        @error('password')
        <div class="alert-light alert-default-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button class="btn-light btn-lg btn-primary" type="submit" name="sendMe" value="1">
            Войти
        </button>
    </div>
</form>

</body>
</html>
