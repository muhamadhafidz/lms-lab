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
                                <h4 class="card-title font-weight-normal">Ubah Detail Kelas</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.kelas.update', $data->id) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <input type="text" class="form-control" id="kelas" name="kelas" value="{{ $data->kelas }}">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                  <option value="Sistem Informasi" {{ $data->jurusan == "Sistem Informasi" ? "selected" : "" }}>Sistem Informasi</option>
                                  <option value="Sistem Komputer" {{ $data->jurusan == "Sistem Komputer" ? "selected" : "" }}>Sistem Komputer</option>
                                  <option value="Teknik Komputer" {{ $data->jurusan == "Teknik Komputer" ? "selected" : "" }}>Teknik Komputer</option>
                                  <option value="Manajemen Informatika" {{ $data->jurusan == "Manajemen Informatika" ? "selected" : "" }}>Manajemen Informatika</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_mhs">Jumlah Mhs</label>
                                <input type="text" class="form-control" id="jumlah_mhs" name="jumlah_mhs" value="{{ $data->jumlah_mhs }}">
                            </div>
                            
                            <div class="btn-bap">
                                <button type="submit" class="btn btn-success d-block">Ubah Kelas</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection