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
          <div class="alert alert-default">
            <div @class(['text-center', 'fs-4'])>
              <b>{{ $app->name }}</b>
              <i class="fa fa-check text-success mx-3"></i>
              <b>DLab's ERP</b>
            </div>
          </div>

          <form action="{{ route('oauth.authorize.store') }}" method="POST" class="card">
            @csrf
            <input type="hidden" name="response_type" value="{{ request()->get('response_type') ?? 'code' }}">
            <input type="hidden" name="client_id" value="{{ request()->get('client_id') ?? 'code' }}">
            <input type="hidden" name="redirect_uri" value="{{ request()->get('redirect_uri') ?? 'code' }}">
            <input type="hidden" name="state" value="{{ request()->get('state') ?? 'code' }}">

            <div class="card-body">
              <p>Ingin mengakses akun <b>{{ $user->username }}</b>:</p>

              <ul>
                <li><b>Data Pribadi Anda:</b> email, nama.</li>
              </ul>
            </div>
            <div class="card-footer text-end">
              <button type="submit" name="action" value="cancel" class="btn btn-dark">Batal</button>
              <button type="submit" name="action" value="authorize" class="btn btn-theme">Izinkan {{ $app->name }}</button>
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
