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
                        <table class="table table-striped">
                            <thead>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>SAP</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ ucwords($item->nama_matkul) }}</td>
                                    <td>
                                        <a href="{{ route('admin.matkul.download', $item->id) }}" class="btn btn-success btn-sm">Unduh SAP</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.matkul.edit', $item->id) }}" class="btn btn-warning btn-sm">Ubah</a>

                                        <form action="{{ route('admin.matkul.delete', $item->id) }}" method="post">
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

  
  <!-- Modal -->
  <div class="modal fade" id="mymodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Instruktur Pengganti</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                
            </div>
      </div>
    </div>
  </div>
@endsection

@push('after-script')
<script>
    jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        }); 
    });
</script>
@endpush