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
                                <h4 class="card-title font-weight-normal">Daftar Akun Asisten Lab</h4>
                            </div>
                            <div class="col text-right">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalJadwal">
                                    + Tambah Akun Asisten
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="crudTable">
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
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->npm }}</td>
                                    <td>{{ ucwords($item->nama) }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->no_telp }}</td>
                                    <td>
                                        {{-- <a href="{{ route('admin.kelas.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a> --}}
                                        @if ($item->id != Auth::user()->id)
                                        <form action="{{ route('admin.asisten.delete', $item->id) }}" method="post" class="ml-1 d-inline" id="form-hapus-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                        @endif
                                        
                                        <form action="{{ route('admin.asisten.resetPassword', $item->id) }}" method="post" class="ml-1 d-inline" id="form-reset-{{ $item->id }}">
                                            @csrf
                                            <button type="button" onclick="resetPass({{ $item->id }})" class="btn btn-warning btn-sm">Reset password</button>
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

    $(document).ready(function(){
        $('#crudTable').DataTable();
    });
    function hapus(id){
        Swal.fire({
        title: 'Yakin menghapus akun asisten ini?',
        text: "Kamu tidak akan bisa mengembalikan datanya!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin, hapus akun asisten ini!'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#form-hapus-'+id).submit();
        }
        });
    }
    function resetPass(id){
        Swal.fire({
            title: 'Yakin reset password akun asisten ini?',
            text: "Kamu tidak akan bisa mengembalikan datanya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin, reset password akun asisten ini!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-reset-'+id).submit();
            }
        });
    }
</script>
@endpush