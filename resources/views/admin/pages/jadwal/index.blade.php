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
                                <h4 class="card-title font-weight-normal">Daftar Jadwal Praktikum </h4>
                            </div>
                            <div class="col text-right">
                                {{-- <a href="{{ route('admin.jadwal.create') }}" class="btn btn-primary btn-sm">+ Tambah Jadwal</a> --}}

                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalJadwal">
                                    + Tambah Jadwal
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>Kelas</th>
                                <th>Matkul</th>
                                <th>Hari</th>
                                <th>Shift</th>
                                <th>Instruktur</th>
                                <th>Asisten</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{ $item->kelas->kelas }}</td>
                                    <td>{{ ucwords($item->matkul->nama_matkul) }}</td>
                                    <td>{{ $item->hari }}</td>
                                    <td>{{ $item->shift }}</td>
                                    <td>{{ $item->instruktur->first()->user->nama }}</td>
                                    <td>
                                        @foreach ($item->asisten as $asisten)
                                        <div class="alert alert-secondary alert-dismissible fade show my-1 py-1" role="alert">
                                            {{$loop->iteration.". ". $asisten->user->nama  }}
                                            <button type="button" class="close py-1">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                        @endforeach
                                        <button type="button" class="btn btn-link btn-sm" data-toggle="modal" data-target="#modalAsisten" onclick="asisten({{ $item->id }}, {{ $item->instruktur->first()->user->id }})">
                                            + Tambah Asisten
                                        </button>
                                    </td>
                                    <td>
                                        {{-- <a href="{{ route('admin.jadwal.edit', $item->id) }}" class="btn btn-warning btn-sm mr-2">Ubah</a> --}}
                                        
                                        <form action="{{ route('admin.jadwal.delete', $item->id) }}" method="post">
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

@include('admin.pages.jadwal.create')
@include('admin.pages.jadwal.asisten')

@endsection

@push('after-script')
<script>
    function submitTambah()
    {
        $('#form-tambah').submit();
    }
    function submitAsisten()
    {
        $('#form-asisten').submit();
    }
    $('#kelas').change(function(){
        var value = $(this).val();
        var token = $('input[name="_token"]').val();
        // alert("test");
        $.ajax({
            url: "{{ route('admin.jadwal.getMatkul') }}",
            method: "POST",
            data:{
                value: value,
                _token: token,
            },
            success: function(result){
                $('#matkul').html(result);
            }
        });
    });

    $('#hari').change(function(){
        var value = $(this).val();
        var token = $('input[name="_token"]').val();
        // alert("test");
        $.ajax({
            url: "{{ route('admin.jadwal.getShift') }}",
            method: "POST",
            data:{
                value: value,
                _token: token,
            },
            success: function(result){
                $('#shift').html(result);
            }
        });
    });
    function asisten(id_jadwal, id_instruktur) 
    {
        // alert("waw");
        $('#jadwal_id').val(id_jadwal);
        var idJadwal = id_jadwal;
        var idInstruktur = id_instruktur;
        var token = $('input[name="_token"]').val();
        // alert("test");
        $.ajax({
            url: "{{ route('admin.jadwal.getAsisten') }}",
            method: "POST",
            data:{
                id_jadwal: idJadwal,
                id_instruktur: idInstruktur,
                _token: token,
            },
            success: function(result){
                $('#asisten').html(result);
            }
        });
    }

    // function ubah(jadwalId){
        
    //     $.ajax({
    //         url: "route('admin.jadwal.edit', "+jadwalId+")",
    //         method: "GET",
    //         data:{},
    //         success: function(result){
    //             $('#shift').html(result);
    //         }
    //     });
    // }
</script>
@endpush