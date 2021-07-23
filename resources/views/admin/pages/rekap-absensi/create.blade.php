<!-- Modal -->
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Asisten Lab Baru</h5>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.asisten.store') }}" id="form-modal" enctype="multipart/form-data">
                @csrf
                <p><span class="text-danger">* Wajib diisi</span></p>
                <div class="form-group">
                    <label for="npm">NPM <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="npm" name="npm" required>
                </div>
                <div class="form-group">
                    <label for="nama">Nama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="nama" name="nama" required>
                </div>
                <div class="form-group">
                    <label for="email">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="no_telp">Nomor Telepon </label>
                    <input type="tel" class="form-control" id="no_telp" name="no_telp">
                </div>
                <div class="form-group">
                    <label for="dir_foto">Foto</label>
                    <input type="file" class="form-control" id="dir_foto" name="dir_foto">
                </div>
            </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="submit()" class="btn btn-success d-block">Buat Jadwal</button>
        </div>
      </div>
    </div>
  </div>