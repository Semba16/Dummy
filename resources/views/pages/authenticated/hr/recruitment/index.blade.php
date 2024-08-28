@extends('layouts.default')

@section('title', 'Rekruitmen')

@section('content')

    <!-- begin breadcrumb -->
    <ol class="breadcrumb float-xl-end">
        <li class="breadcrumb-item"><a href="javascript:;">Human Resource</a></li>
        <li class="breadcrumb-item active"><a href="javascript:;">Recruitment</a></li>
    </ol>
    <!-- end breadcrumb -->
    <!-- begin page-header -->
    <h1 class="page-header">Rekruitmen <small>Rekruitmen lowongan pekerjaan.</small></h1>
    <!-- end page-header -->

    <!-- begin panel -->
    <div class="panel panel-inverse">
        <div class="panel-heading">
            <h4 class="panel-title">Daftar Lowongan Pekerjaan</h4>
            <div class="panel-heading-btn">
                <a href="javascript:;" data-bs-target="#modal-dialog" data-bs-toggle="modal" class="btn btn-xs btn-primary"
                    data-click="panel-remove"><i class="fa fa-plus"></i> Tambah</a>
            </div>
        </div>
        <div class="panel-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <div @class(['mb-1'])>
                        <b>Kesalahan Validasi:</b>
                    </div>
                    <ul @class(['mb-0'])>
                        {!! implode('', $errors->all('<li>:message</li>')) !!}
                    </ul>
                </div>
            @endif
            @include('pages.vendor.datatables._table')
            
        </div>
    </div>
    <!-- end panel -->

    @include('pages.authenticated.hr.recruitment.modal.create')
@endsection
@push('scripts')
    <script src="{{ asset('/assets/plugins/parsleyjs/dist/parsley.min.js') }}"></script>
@endpush
