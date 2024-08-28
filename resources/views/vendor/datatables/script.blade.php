$(function(){
window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}=window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}||{};window.{{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"]=$("#%1$s").DataTable(%2$s);

$.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});

{{ config('datatables-html.namespace', 'LaravelDataTables') }}["%1$s"].on('click', '[data-destroy]', function(e) {
e.preventDefault();
swal({
title: "Apakah anda yakin?",
text: "Anda tidak dapat mengembalikan data yang telah dihapus",
icon: "warning",
buttonsStyling: false,
buttons: {
cancel: {
text: "Batal",
value: null,
visible: true,
className: "btn btn-secondary",
closeModal: true,
},
confirm: {
text: "Yakin!",
value: true,
visible: true,
className: "btn btn-primary",
closeModal: true
}
}
}).then((result) => {
console.log(result);
if (result == true) {
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
swal({
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
