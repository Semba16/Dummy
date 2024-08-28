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
              <b>{{ $client->name }}</b>
              <i class="fa fa-check text-success mx-3"></i>
              <b>DLab's ERP</b>
            </div>
          </div>

          <div class="card">
            @csrf

            <div class="card-body">
              <p class="mb-2"><strong>{{ $client->name }}</strong> Ingin mengakses akun <b>{{ $user->employee->nama }}</b>.</p>

              <!-- Scope List -->
              @if (count($scopes) > 0)
                <div class="scopes">
                  <p class="mb-2 mt-2"><strong>Aplikasi ini akan mendapatkan akses ke:</strong></p>

                  <ul>
                    @foreach ($scopes as $scope)
                      <li>{{ $scope->description }}</li>
                    @endforeach
                  </ul>
                </div>
              @endif
            </div>
            <div class="card-footer d-flex justify-content-center gap-2">
              <!-- Cancel Button -->
              <form method="post" action="{{ route('passport.authorizations.deny') }}">
                @csrf
                @method('DELETE')

                <input type="hidden" name="state" value="{{ $request->state }}">
                <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                <button class="btn btn-danger">Batal</button>
              </form>

              <!-- Authorize Button -->
              <form method="post" action="{{ route('passport.authorizations.approve') }}">
                @csrf

                <input type="hidden" name="state" value="{{ $request->state }}">
                <input type="hidden" name="client_id" value="{{ $client->getKey() }}">
                <input type="hidden" name="auth_token" value="{{ $authToken }}">
                <button type="submit" class="btn btn-theme">Izinkan {{ $client->name }}</button>
              </form>

            </div>
          </div>
        </div>
        <!-- END login-content -->
      </div>
      <!-- END login-container -->
    </div>
    <!-- END login -->
  </div>
  <!-- END #app -->
@endsection
