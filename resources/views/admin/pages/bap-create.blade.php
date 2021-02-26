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
                                <h4 class="card-title font-weight-normal">Berita Acara Praktikum PTI</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="pertemuan">Pertemuan</label>
                                <input type="text" class="form-control" id="pertemuan">
                            </div>
                            <h5>Absensi</h5>
                            <div class="row">
                                <div class="col">
                                    <label for="alfa">Alfa</label>
                                    <input type="number" class="form-control" id="alfa">
                                </div>
                                <div class="col">
                                    <label for="izin">Izin</label>
                                    <input type="number" class="form-control" id="izin">
                                </div>
                                <div class="col">
                                    <label for="sakit">Sakit</label>
                                    <input type="number" class="form-control" id="sakit">
                                </div>
                                <div class="col">
                                    <label for="total-praktikan">Jumlah Praktikan</label>
                                    <input type="number" class="form-control" id="total-praktikan">
                                </div>
                            </div>
                            <hr>
                            <h5>Tugas Laporan</h5>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lap-akhir">Laporan Akhir</label>
                                        <textarea class="form-control" id="lap-akhir" rows="5"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="lap-awal">Laporan Awal ( Pertemuan Selanjutnya )</label>
                                        <textarea class="form-control" id="lap-awal" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-bap">
                                <a href="" class="btn btn-success d-block">Submit</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection