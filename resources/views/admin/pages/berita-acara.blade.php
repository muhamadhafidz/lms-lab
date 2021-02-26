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
                            <div class="col text-right">
                                <a href="" class="btn btn-primary btn-sm">+ Tambah Berita Acara</a>
                            </div>
                        </div>
                        <div class="detail-bap px-4 py-3">
                            <div class="row">
                                <div class="col-1">
                                    <h5>Hari</h5>
                                </div>
                                <div class="col">
                                    <h5>: Senin</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <h5>Shift</h5>
                                </div>
                                <div class="col">
                                    <h5>: 1 ( 11.30 - 13.30 )</h5>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <h5 class="mb-0">Kelas</h5>
                                </div>
                                <div class="col">
                                    <h5 class="mb-0">: 105</h5>
                                </div>
                            </div>
                        </div> 
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Pertemuan</th>
                                <th>Tanggal</th>
                                <th>Absensi</th>
                                <th>Laporan Akhir</th>
                                <th>Laporan Awal</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>P1</td>
                                    <td>12 Januari 2021</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary">Ubah</a>
                                        <a href="" class="btn btn-danger ml-3">Hapus</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>P2</td>
                                    <td>20 Januari 2021</td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary">Ubah</a>
                                        <a href="" class="btn btn-danger ml-3">Hapus</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection