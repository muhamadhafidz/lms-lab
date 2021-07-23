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
                                <h4 class="card-title font-weight-normal">Daftar Mata Kuliah Praktikum </h4>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.matkul.create') }}" class="btn btn-primary btn-sm">+ Tambah Mata Kuliah</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped"  id="crudTable">
                            <thead>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>SAP</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ ucwords($item->nama_matkul) }}</td>
                                    <td>
                                        <a href="{{ route('admin.matkul.download', $item->id) }}" class="btn btn-success btn-sm">Unduh SAP</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.matkul.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Ubah</a>

                                        <form action="{{ route('admin.matkul.delete', $item->id) }}" method="post" id="form-hapus-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm hapus">Hapus</button>
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
        title: 'Yakin menghapus matkul ini?',
        text: "Kamu tidak akan bisa mengembalikan datanya!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yakin, hapus matkul ini!'
        }).then((result) => {
        if (result.isConfirmed) {
            $('#form-hapus-'+id).submit();
        }
        });
    }
</script>
@endpush