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
                                <h4 class="card-title font-weight-normal">Daftar Absensi Laboratorium</h4>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Pertemuan</th>
                                <th>Praktikum</th>
                                <th>Hari</th>
                                <th>Shift</th>
                                <th>Tanggal</th>
                                <th>Absen</th>
                                <th>Keterangan</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->pertemuan }}</td>
                                    <td>{{ $item->jadwal->matkul->nama_matkul }}</td>
                                    <td>{{ ucwords($item->jadwal->hari) }}</td>
                                    <td>{{ $item->jadwal->shift }}</td>
                                    <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                                    <td> 
                                        @if ($item->status == 'aktif')
                                            
                                        
                                            @if (!$absensi->where('user_id', Auth::user()->id)->where('bap_id', $item->id)->first())
                                                <form method="POST" action="{{ route('admin.absensi.absen', $item->id ) }}" id="form-absen-{{ $item->id }}" class="d-inline">
                                                    @csrf
                                                    <button type="button" onclick="absen({{ $item->id }})" class="btn btn-success mr-2 ">Hadir</button>
                                                </form>
                                                @if ($item->jadwal->instruktur->first()->user_id == Auth::user()->id)
                                                    {{-- <button type="button" class="btn btn-warning " data-toggle="modal" data-target="#exampleModal">
                                                        Izin
                                                    </button> --}}
                                                    <a href="#mymodal" data-remote="{{ route('admin.absensi.show', [Auth::user()->id, $item->id] ) }}" class="btn btn-warning" data-toggle="modal" data-target="#mymodal" data-title="Detail " >
                                                        Izin
                                                    </a>
                                                @endif
                                            @else
                                                <button type="button" class="btn btn-secondary mr-2" disabled>Hadir</button>
                                                @if ($item->jadwal->instruktur->first()->user_id == Auth::user()->id)
                                                    <button type="button" class="btn btn-secondary " disabled>
                                                        Izin
                                                    </button>
                                                @endif
                                            @endif
                                        @else

                                            <button type="button" class="btn btn-secondary mr-2" disabled>Hadir</button>
                                            @if ($item->jadwal->instruktur->first()->user_id == Auth::user()->id)
                                                <button type="button" class="btn btn-secondary " disabled>
                                                    Izin
                                                </button>
                                            @endif
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $bsn = $absensi->where('user_id', Auth::user()->id)->where('bap_id', $item->id)->first();
                                            
                                        @endphp
                                        @if ($bsn != null)
                                            @if ($bsn->status == 'izin')
                                                Izin / Tidak Hadir
                                            @else
                                                {{ ucwords($bsn->status) }}
                                            @endif
                                        @else
                                            {{ "Belum Absen" }}
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
    $(document).ready(function(){
        $('#mymodal').on('show.bs.modal', function(e) {
            var button = $(e.relatedTarget);
            var modal = $(this);
            modal.find('.modal-body').load(button.data("remote"));
            modal.find('.modal-title').html(button.data("title"));
        }); 
    });
    function absen(id){
        Swal.fire({
            title: 'Lakukan absensi pada pertemuan ini?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya saya hadir!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-absen-'+id).submit();
            }
            });
        }
</script>
@endpush