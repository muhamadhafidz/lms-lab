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
                                <h4 class="card-title font-weight-normal">Daftar Kelas </h4>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.kelas.create') }}" class="btn btn-primary btn-sm">+ Tambah Kelas</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped" id="crudTable">
                            <thead>
                                <th>No</th>
                                <th>Kelas</th>
                                <th>Jurusan</th>
                                <th>Mahasiswa</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->kelas }}</td>
                                    <td>{{ ucwords($item->jurusan) }}</td>
                                    <td>{{ $item->jumlah_mhs }}</td>
                                    <td>
                                        <a href="{{ route('admin.kelas.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>
                                        <form action="{{ route('admin.kelas.delete', $item->id) }}" method="post" class="ml-1 d-inline" id="form-hapus-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
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

  
  
@endsection

@push('after-script')
<script>
    $(document).ready(function(){
        $('#crudTable').DataTable();
    });

    function hapus(id){
        Swal.fire({
        title: 'Yakin menghapus kelas ini?',
        text: "Kamu tidak akan bisa mengembalikan datanya!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin, hapus kelas ini!'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#form-hapus-'+id).submit();
        }
        });
    }
</script>
@endpush