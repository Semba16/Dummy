@extends('layouts.empty')

@section('title', 'Login')

@section('content')
  <!-- BEGIN #app -->
  <div id="app" class="app">
    <!-- BEGIN login -->
    <div class="login login-v2 fw-bold">
      <!-- BEGIN login-cover -->
      <div class="login-cover">
        <div class="login-cover-img" style="background-image: url({{ asset('assets/img/login-bg/login-bg-18.jpg') }})" data-id="login-cover-image"></div>
        <div class="login-cover-bg"></div>
      </div>
      <!-- END login-cover -->

      <!-- BEGIN login-container -->
      <div class="login-container">
        <!-- BEGIN login-header -->
        <div class="login-header">
          <div class="brand">
            <div class="d-flex align-items-center">
              <span class="logo"></span> <b>DLab's</b>&nbsp;ERP
            </div>
            <small>Enterprise Resource Planning</small>
          </div>
          <div class="icon">
            <i class="fa fa-lock"></i>
          </div>
        </div>
        <!-- END login-header -->

        <!-- BEGIN login-content -->
        <div class="login-content">
          <form action="{{ route('auth.login.store') }}" method="POST">
            @csrf

            @if ($errors->any())
              {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif

            @if ($errors->has('firstname'))
              <div class="error">{{ $errors->first('firstname') }}</div>
            @endif

            <div class="form-floating mb-20px">
              <input type="text" name="user" class="form-control fs-13px h-45px border-0" placeholder="Username / Email" id="user" />
              <label for="user" class="d-flex align-items-center text-gray-600 fs-13px">Username / Email</label>
            </div>
            <div class="form-floating mb-20px">
              <input type="password" name="password" class="form-control fs-13px h-45px border-0" placeholder="Password" id="password" />
              <label for="password" class="d-flex align-items-center text-gray-600 fs-13px">Password</label>
            </div>
            <div class="form-check mb-20px">
              <input name="remember" class="form-check-input border-0" type="checkbox" value="1" id="remember" />
              <label class="form-check-label fs-13px text-gray-500" for="remember">
                Ingat Saya
              </label>
            </div>
            <div class="mb-20px">
              <button type="submit" class="btn btn-theme d-block w-100 h-45px btn-lg">Login</button>
            </div>
            <div class="text-gray-500">
              Pendaftaran Karyawan atau Peserta Magang <a href="{{ url('/') }}" class="text-white">disini</a>.
            </div>
          </form>
        </div>
        <!-- END login-content -->
      </div>
      <!-- END login-container -->
    </div>
    <!-- END login -->
  </div>
  <!-- END #app -->
@endsection
