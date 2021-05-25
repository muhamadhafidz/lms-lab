<!-- Modal -->
<div class="modal fade" id="modalJadwal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Jadwal Praktikum Baru</h5>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.jadwal.store') }}" id="form-tambah">
                @csrf
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option>Pilih Kelas</option>
                        @foreach ($kelas as $item_kls)
                        <option value="{{ $item_kls->id }}">{{ $item_kls->kelas }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="matkul">Matkul</label>
                    <select class="form-control" id="matkul" name="matkul">
                        <option>Pilih Matkul</option>
                        @foreach ($matkul as $item_mtkl)
                        <option value="{{ $item_mtkl->id }}">{{ $item_mtkl->nama_matkul }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="hari">Hari</label>
                    <select class="form-control" id="hari" name="hari">
                        <option>Pilih Hari</option>
                        @if ($senin != 'full')
                        <option value="senin">Senin</option>
                        @endif
                        @if ($selasa != 'full')
                        <option value="selasa">Selasa</option>
                        @endif
                        @if ($rabu != 'full')
                        <option value="rabu">Rabu</option>
                        @endif
                        @if ($kamis != 'full')
                        <option value="kamis">Kamis</option>
                        @endif
                        @if ($jumat != 'full')    
                        <option value="jumat">Jumat</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label for="shift">Shift</label>
                    <select class="form-control" id="shift" name="shift">
                        <option>Pilih Shift</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="instruktur">Instruktur</label>
                    <select class="form-control" id="instruktur" name="instruktur">
                        <option>Pilih Instruktur</option>
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->nama }}</option>
                        @endforeach
                    </select>
                </div>
                @csrf
            </form>
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="submitTambah()" class="btn btn-success d-block">Buat Jadwal</button>
        </div>
      </div>
    </div>
  </div>