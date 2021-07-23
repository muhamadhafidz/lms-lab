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
                                <h4 class="card-title font-weight-normal">Ubah Berita Acara Praktikum {{ $item->jadwal->matkul->nama_matkul }}</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.berita-acara.update', [$id, $bapid]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="pertemuan">Pertemuan</label>
                                <input type="text" class="form-control" id="pertemuan" name="pertemuan" value="{{ $item->pertemuan }}">
                            </div>
                            <hr>
                            <h5>Absensi</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="alfa">Alfa</label>
                                    <input type="number" class="form-control" name="alfa" value="{{ $item->alfa }}">
                                </div>
                                <div class="col">
                                    <label for="izin">Izin</label>
                                    <input type="number" class="form-control" name="izin" value="{{ $item->izin }}">
                                </div>
                                <div class="col">
                                    <label for="sakit">Sakit</label>
                                    <input type="number" class="form-control" name="sakit" value="{{ $item->sakit }}">
                                </div>
                            </div>
                            <hr>
                            <h5>Tugas Laporan</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lap-akhir">Laporan Akhir</label>
                                        <textarea class="form-control" name="lap_akhir" rows="5">{{ $item->lap_akhir }}</textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lap-awal">Laporan Awal ( Pertemuan Selanjutnya )</label>
                                        <textarea class="form-control" name="lap_awal" rows="5">{{ $item->lap_awal }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-bap">
                                <button type="submit" class="btn btn-success w-100">Ubah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection