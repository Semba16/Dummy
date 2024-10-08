@extends('layouts.default')

@section('title', 'Home Page')

@section('content')

  <a href="#modal-dialog" class="btn btn-sm btn-success w-100px" data-bs-toggle="modal">Demo</a>

  <!-- #modal-dialog -->
  <div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Modal Dialog</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
        </div>
        <div class="modal-body">
          <p>
            NIK ktp
            NIK karyawan
            npwp
            Nama
            alamat ktp
            alamat domisili
            no telpon keluarga lain yg bisa dihubung
            no telpon
            tgl lahir
            jenis kelamin
            nik
            npwp
            upload cv

          </p>
        </div>
        <div class="modal-footer">
          <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Close</a>
          <a href="javascript:;" class="btn btn-success">Action</a>
        </div>
      </div>
    </div>
  </div>

  <!-- begin breadcrumb -->
  <ol class="breadcrumb float-xl-end">
    <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
    <li class="breadcrumb-item"><a href="javascript:;">Library</a></li>
    <li class="breadcrumb-item active"><a href="javascript:;">Data</a></li>
  </ol>
  <!-- end breadcrumb -->
  <!-- begin page-header -->
  <h1 class="page-header">CoA <small>Chart of Accounts.</small></h1>
  <!-- end page-header -->

  @foreach ($accounts as $account)
    <!-- begin panel -->
    <div class="panel panel-inverse">
      <div class="panel-heading">
        <h4 class="panel-title">Tabel Akun: {{ $account->name }}</h4>
        <div class="panel-heading-btn">
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
          <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
      </div>
      <div class="panel-body">

        <table class="table table-bordered">
          <thead>
            <tr>
              <th>Account Name</th>
              <th>Deskripsi</th>
              <th>Code</th>
            </tr>
          </thead>
          <tbody>
            @include('pages.authenticated.employee.table.row', [
                'accounts' => $account->childs,
                'depth' => 0,
                'code' => $account->code,
            ])
          </tbody>
        </table>
      </div>
    </div>
    <!-- end panel -->
  @endforeach
@endsection
