@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title font-weight-normal">Daftar Praktikum</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Praktikum</th>
                                <th>Kelas</th>
                                <th>Instruktur</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Algo A</td>
                                    <td>204</td>
                                    <td>Muhamad Nur Hafidz</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Berita Acara</a>
                                        <a href="" class="btn btn-success ml-3">Absen</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>PTI</td>
                                    <td>101</td>
                                    <td>Muhamad Nur Hafidz</td>
                                    <td>
                                        <a href="" class="btn btn-primary">Berita Acara</a>
                                        <a href="" class="btn btn-success ml-3">Absen</a>
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