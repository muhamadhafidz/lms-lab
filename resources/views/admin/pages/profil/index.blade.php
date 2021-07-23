@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card profil">
                    <div class="card-body">
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <div class="foto w-50 mx-auto">
                                        <img src="{{ asset(Auth::user()->dir_foto) }}" class="img-fluid rounded-circle mb-2" alt="">
                                        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#gantiFoto">
                                            Ganti foto
                                        </button>
                                    </div>
                                    <h3 class="font-weight-bold">{{ Auth::user()->nama }}</h3>
                                    <p class="">{{ ucwords(Auth::user()->roles) }} Lab</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-weight-bold mb-1">Nomor Mahasiswa</h5>
                                    <h5>{{ Auth::user()->npm }}</h5>
                                    <h5 class="font-weight-bold mb-1">Email</h5>
                                    <h5>{{ Auth::user()->email }}</h5>
                                    <h5 class="font-weight-bold mb-1">Nomor Telepon</h5>
                                    <h5>{{ Auth::user()->no_telp }}</h5>

                                    <div class="btn-profil mt-5">
                                        <a href="{{ route('admin.profil.edit') }}" class="btn btn-primary">Ubah profil</a>
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#gantiPass">
                                            Ubah Password
                                        </button>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal ganti foto -->
<div class="modal fade" id="gantiFoto" tabindex="-1" aria-labelledby="ganti-foto" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ganti-foto">Ganti Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.profil.update-foto' ) }}" id="foto-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                  <label for="file_foto">Pilih file foto</label>
                  <input type="file" class="form-control-file" id="file_foto" name="file_foto">
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="submitFoto()" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</div>

<!-- Modal ganti pass -->
<div class="modal fade" id="gantiPass" tabindex="-1" aria-labelledby="ganti-pass" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ganti-pass">Ganti Foto</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="POST" action="{{ route('admin.profil.update-password') }}" id="pass-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="password_old">Password Lama</label>
                    <input type="password" class="form-control" id="password_old" name="password_old" required >
                </div>
                <div class="form-group">
                    <label for="password_new">Password Baru</label>
                    <input type="password" class="form-control" id="password_new" name="password_new" required>
                </div>
                <div class="form-group">
                    <label for="password_new_konf">Konfirmasi Password Baru</label>
                    <input type="password" class="form-control" id="password_new_konf" name="password_confirm" required>
                </div>
                <button type="submit" class="btn btn-primary " id="submit-form" hidden>Simpan</button>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" onclick="submitPass()" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
</div>
@endsection
@push('after-script')
    <script>
        function submitFoto(){
            $('#foto-form').submit();
        }
        function submitPass(){
            // var lama = $("#password_old").val();
            // var baru = $("#password_new").val();
            // var konf = $("#password_new_konf").val();
            // if (lama == "") {
                
            // }
            $('#submit-form').click();
        }
    </script>
@endpush