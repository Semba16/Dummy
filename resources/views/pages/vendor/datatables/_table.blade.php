<!--begin::Table-->
{{ $dataTable->table(['class' => 'table table-bordered'], false) }}
<!--end::Table-->

@push('css')
  <link href="{{ asset('/assets/plugins/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/css/colReorder.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-keytable-bs5/css/keyTable.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/css/rowReorder.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('/assets/plugins/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@push('scripts')
  <script src="{{ asset('/assets/plugins/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-colreorder/js/dataTables.colReorder.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-colreorder-bs5/js/colReorder.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-keytable-bs5/js/keyTable.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-rowreorder/js/dataTables.rowReorder.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-rowreorder-bs5/js/rowReorder.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-select/js/dataTables.select.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-select-bs5/js/select.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.colVis.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('/assets/plugins/axios/dist/axios.min.js') }}"></script>

  {{ $dataTable->scripts() }}
@endpush
