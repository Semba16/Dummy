@extends('layouts.default')

@section('title', 'Home Page')

@section('content')

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Integration</a></li>
    <li class="breadcrumb-item active"><a href="javascript:;">oAuth2 Apps</a></li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">oAuth2 <small>Integrasi aplikasi eksternal dengan oAuth2.</small></h1>
  <!-- end page-header -->

  <!-- begin panel -->
  <form action="{{ route('integration.oauth2.update', $data) }}" method="POST" class="panel panel-inverse" data-parsley-validate>
    @csrf
    @method('PUT')

    <div class="panel-heading">
      <h4 class="panel-title">Aplikasi</h4>
      <div class="panel-heading-btn">
      </div>
    </div>
    <div class="panel-body">

      <div class="row mb-15px">
        <label class="form-label col-form-label col-md-3 required">Nama Aplikasi *</label>
        <div class="col-md-9">
          <input type="text" name="name" data-parsley-required="true" class="form-control mb-5px" placeholder="Contoh: Mattermost" value="{{ $data->name }}" />
        </div>
      </div>

      <div class="row mb-15px">
        <label class="form-label col-form-label col-md-3 required">Redirect URL *</label>
        <div class="col-md-9">
          <input type="text" name="redirect" data-parsley-required="true" class="form-control mb-5px" placeholder="Contoh: https://office.dlabs.id/signup/gitlab/complete" value="{{ $data->redirect }}" />
        </div>
      </div>

      <div class="row mb-15px">
        <label class="form-label col-form-label col-md-3 required">Client ID</label>
        <div class="col-md-9">
          <input type="text" name="client_id" class="form-control mb-5px" readonly value="{{ $data->id }}" />
        </div>
      </div>

      <div class="row mb-10px">
        <label class="form-label col-form-label col-md-3 required">Client Secret</label>
        <div class="col-md-9">
          <input type="text" name="client_secret" class="form-control mb-5px" readonly value="{{ $data->secret }}" />
        </div>
      </div>

      <div class="row">
        <label class="form-label col-form-label col-md-3 required">&nbsp;</label>
        <div class="col-md-9">
          <button type="submit" name="regenerate" class="btn btn-outline-primary" value="1">Regenerate</button>
        </div>
      </div>
    </div>

    <div class="panel-footer text-end">
      <a href="{{ route('integration.oauth2.index') }}" class="btn btn-white">Kembali</a>
      <button type="submit" class="btn btn-success">Simpan</button>
    </div>
  </form>
  <!-- end panel -->
@endsection

@push('scripts')
  <script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
@endpush
