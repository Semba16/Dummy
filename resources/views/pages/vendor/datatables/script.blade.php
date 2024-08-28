<script>
  $(function() {
    window.{{ config('datatables-html.namespace', 'LaravelDataTables') }} = window.{{ config('datatables-html.namespace', 'LaravelDataTables') }} || {};
    window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"] = $("#%1$s").DataTable( % 2 $s);

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });

    {{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"].on('click', '[data-destroy]', function(e) {
      e.preventDefault();
      Swal.fire({
        title: "Apakah anda yakin?",
        text: "Anda tidak dapat mengembalikan data yang telah dihapus",
        icon: "warning",
        buttonsStyling: false,
        showCancelButton: true,
        customClass: {
          confirmButton: "btn btn-primary",
          cancelButton: "btn btn-secondary"
        },
        confirmButtonText: "Yakin!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios.delete($(this).data('destroy'), {
              '_method': 'DELETE',
            })
            .then(function(response) {
              {{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"].ajax.reload();
            })
            .catch(function(error) {
              let dataMessage = error.response.data.message;
              let dataErrors = error.response.data.errors;

              for (const errorsKey in dataErrors) {
                if (!dataErrors.hasOwnProperty(errorsKey)) continue;
                dataMessage += "\r\n" + dataErrors[errorsKey];
              }

              if (error.response) {
                Swal.fire({
                  text: dataMessage,
                  icon: "error",
                  buttonsStyling: false,
                  confirmButtonText: "Baiklah",
                  customClass: {
                    confirmButton: "btn btn-primary"
                  }
                });
              }
            });
        }
      });
    });
  });
</script>
