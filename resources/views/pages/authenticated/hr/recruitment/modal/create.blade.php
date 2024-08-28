<div class="modal fade" id="modal-dialog">
    <div class="modal-dialog">
        <form action="{{ route('integration.oauth2.store') }}" method="POST" class="modal-content" enctype="multipart/form-data" data-parsley-validate>
            @csrf

            <div class="modal-header text-bg-inverse">
                <h4 class="modal-title">Tambah Baru: Postingan Lowongan Pekerjaan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-3 required">Nama Posisi *</label>
                    <div class="col-md-9">
                        <input type="text" name="name" data-parsley-required="true" class="form-control mb-5px"
                            placeholder="Contoh: Mattermost" required />
                    </div>
                </div>

                <div class="row mb-15px">
                    <label class="form-label col-form-label col-md-3 required">Redirect URL *</label>
                    <div class="col-md-9">
                        <input type="text" name="redirect" data-parsley-required="true" class="form-control mb-5px"
                            placeholder="Contoh: https://office.dlabs.id/signup/gitlab/complete" required />
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <a href="javascript:;" class="btn btn-white" data-bs-dismiss="modal">Keluar</a>
                <button type="submit" class="btn btn-success">Simpan</button>
            </div>
        </form>
    </div>
</div>
