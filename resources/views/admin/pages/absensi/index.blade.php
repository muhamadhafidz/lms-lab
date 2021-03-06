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
                                <h4 class="card-title font-weight-normal">Absensi Laboratorium</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Pertemuan</th>
                                <th>Hari</th>
                                <th>Shift</th>
                                <th>Tanggal</th>
                                <th>Keterangan</th>
                                <th>Absen</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->pertemuan }}</td>
                                    <td>{{ $item->jadwal->hari }}</td>
                                    <td>{{ $item->jadwal->shift }}</td>
                                    <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                                    <td>{{ $item->jadwal->matkul->nama_matkul }}</td>
                                    <td> 
                                        @if ($absensi->where('user_id', 1)->where('bap_id', $item->id)->first())
                                            <button type="button" class="btn btn-secondary mr-2" disabled>Hadir</button>
                                            <button type="button" class="btn btn-secondary " disabled>
                                                Izin
                                            </button>
                                        @else
                                            <form method="POST" action="{{ route('admin.absensi.absen') }}">
                                                @csrf
                                                <button type="submit" class="btn btn-success mr-2">Hadir</button>
                                            </form>

                                            <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#exampleModal">
                                                Izin
                                            </button>
                                        @endif
                                        
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
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pilih Instruktur Pengganti</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="" method="POST">
            <div class="modal-body">
                <div class="form-group">
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Simpan</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection