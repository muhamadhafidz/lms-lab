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
                                <h4 class="card-title font-weight-normal">Buat Kelas Baru</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.kelas.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                  <option value="pilih">Pilih Jurusan</option>
                                  <option value="Sistem Informasi">Sistem Informasi</option>
                                  <option value="Sistem Komputer">Sistem Komputer</option>
                                  <option value="Teknik Komputer">Teknik Komputer</option>
                                  <option value="Manajemen Informatika">Manajemen Informatika</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_mhs">Jumlah Mhs</label>
                                <input type="text" class="form-control" id="jumlah_mhs" name="jumlah_mhs">
                            </div>
                            
                            <div class="btn-bap">
                                <button type="submit" class="btn btn-success d-block">Buat Kelas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection