@extends('admin.layouts.default')

@section('content')
{{-- {{  }} --}}
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <div class="row mb-3">
                            <div class="col">
                                <h4 class="card-title font-weight-normal">Daftar Asisten Lab </h4>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalJadwal">
                                    + Tambah Asisten
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Nomor Telepon</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ ucwords($item->nama) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.kelas.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a> --}}
                                        <form action="{{ route('admin.asisten.delete', $item->id) }}" method="post" class="ml-1 d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Button trigger modal -->

  
@include('admin.pages.asisten.create')

@endsection

@push('after-script')
<script>
    function submit()
    {
        $('#form-modal').submit();
    }
    
</script>
@endpush