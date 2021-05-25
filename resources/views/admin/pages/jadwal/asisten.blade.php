<!-- Modal -->
<div class="modal fade" id="modalAsisten" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Asisten Praktikum </h5>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.jadwal.storeAsisten') }}" id="form-asisten">
                @csrf
                <div class="form-group">
                    <label for="asisten1">Asisten</label>
                    <select class="form-control" id="asisten" name="asisten">
                        
                    </select>
                </div>
                <input type="text" name="jadwal_id" id="jadwal_id" value="" hidden>
            </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="submitAsisten()" class="btn btn-success d-block">Buat Jadwal</button>
        </div>
      </div>
    </div>
  </div>