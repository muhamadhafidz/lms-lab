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
                        <form method="POST" action="{{ route('admin.matkul.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="nama_matkul">Nama Mata Kuliah</label>
                                <input type="text" class="form-control" id="nama_matkul" name="nama_matkul">
                            </div>
                            <div class="form-group">
                                <label for="file_sap">File SAP</label>
                                <input type="file" class="form-control" id="file_sap" name="file_sap">
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