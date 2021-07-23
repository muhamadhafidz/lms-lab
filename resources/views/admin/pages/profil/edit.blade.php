@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="card-title font-weight-normal">Ubah Profil</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.profil.update', $data->id) }}" id="form-submit">
                            @csrf
                            @method('PUT')
                            {{-- <p><span class="text-danger">* Wajib diisi</span></p> --}}
                            <div class="form-group">
                                <label for="npm">NPM</label>
                                <input type="number" class="form-control @error('npm') is-invalid @enderror" id="npm" name="npm" required value="{{ old('npm') ? old('npm') : $data->npm }}">
                                @error('npm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama') ? old('nama') : $data->nama }}">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required value="{{ old('email') ? old('email') : $data->email }}">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="no_telp">Nomor Telepon </label>
                                <input type="tel" class="form-control @error('no_telp') is-invalid @enderror" id="no_telp" name="no_telp" value="{{ old('no_telp') ? old('no_telp') : $data->no_telp }}" required>
                                @error('no_telp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="btn-bap">
                                <button type="button" onclick="cekForm()" id="tombol" class="btn btn-success w-100">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('after-script')
    <script>
        // function btnSbmt(){
        //     // e.prevent
        //     $("#tombol").attr("type", "submit").click();
        //     // cekForm();
        // }
        function cekForm(){
            // alert("s");
            
            var npm = $("#npm").val();
            var nama = $('#nama').val();
            var email = $('#email').val();
            var no_telp = $('#no_telp').val();
            // alert(npm);
            if (npm == "" || nama == "" || email == "" || no_telp == "") {
                if ( no_telp == "" ) $("#no_telp").focus();
                if ( email == "" ) $("#email").focus();
                if ( nama == "" ) $("#nama").focus();
                if ( npm == "" ) $("#npm").focus();
                Swal.fire({
                    icon: 'warning',
                    title: 'Data tidak boleh ada yang kosong!',
                    // text: 'Something went wrong!',
                    // footer: '<a href="">Why do I have this issue?</a>'
                });
                
            }else {
                $('#form-submit').submit();
            }
            // btnSbmt();
        }
    </script>
@endpush