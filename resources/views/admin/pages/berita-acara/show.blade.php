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
                                <h4 class="card-title font-weight-normal">Berita Acara Praktikum {{ $jadwal->matkul->nama_matkul }}</h4>
                            </div>
                            <div class="col text-right">
                                <a href="{{ route('admin.berita-acara.create', $id) }}" class="btn btn-primary btn-sm">+ Tambah Berita Acara</a>
                            </div>
                        </div>
                        {{-- <div class="detail-bap px-4 py-3">
                            <div class="row">
                                <div class="col-1">
                                    <span>Hari</span>
                                </div>
                                <div class="col">
                                    <span>: {{ ucwords($jadwal->hari) }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <span>Shift</span>
                                </div>
                                <div class="col">
                                    <span>: {{ $jadwal->shift }}</span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-1">
                                    <span class="mb-0">Kelas</span>
                                </div>
                                <div class="col">
                                    <span class="mb-0">: {{ $jadwal->kelas->kelas }}</span>
                                </div>
                            </div>
                        </div>  --}}
                    </div>
                    <div class="card-body">
                        {{-- <table class="table table-striped">
                            <thead>
                                <th>Pertemuan</th>
                                <th>Tanggal</th>
                                <th>Absensi</th>
                                <th>Laporan Akhir</th>
                                <th>Laporan Awal</th>
                                <th>Ubah</th>
                                <th>Hapus</th>
                            </thead>
                            <tbody>
                                @foreach ($jadwal->bap as $item)
                                <tr>
                                    <td>{{ $item->pertemuan }}</td>
                                    <td>{{ $item->created_at->isoFormat('D MMMM Y') }}</td>
                                    <td>
                                        <span class="mr-3">Alfa  : {{ $item->alfa }}</span>
                                        <span class="mr-3">Izin  : {{ $item->izin }}</span>
                                        <span class="mr-3">Sakit : {{ $item->sakit }}</span>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-primary btn-sm">Lihat</a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.berita-acara.edit', [$id, $item->id]) }}" class="btn btn-warning btn-sm">Ubah</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('admin.berita-acara.delete', [$id, $item->id]) }}" method="post" id="form-hapus-{{ $item->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table> --}}
                        
                            @foreach ($jadwal->bap as $item)
                            <div class="container">

                            
                                <div class="row">
                                    <div class="col">
                                        <div class="alert border row" role="alert">
                                            <div class="col d-flex align-items-center">
                                        
                                                {{ $item->pertemuan }}
                                                @if ($item->status == 'aktif')
                                                <span class="badge badge-success ml-3">{{ $item->status }}</span>
                                                @else
                                                <span class="badge badge-secondary ml-3">{{ $item->status }}</span>
                                                @endif
                                            </div>
                                            <div class="col text-right">
                                                <button class="btn btn-primary btn-sm" type="button" data-toggle="collapse" data-target="#collapseExample{{ $loop->iteration }}" aria-expanded="false" aria-controls="collapseExample{{ $loop->iteration }}">
                                                    Lihat

                                                </button>
                                            </div>
                                        </div>
                                                
                                            
                                                
                                        
                                        <div class="collapse" id="collapseExample{{ $loop->iteration }}">
                                            <div class="card card-body">
                                                <div class="title-bap text-center">
                                                    <h5 class="font-weight-bold">
                                                        BERITA ACARA PRAKTIKUM ({{ $item->pertemuan }})
                                                    </h5>
                                                </div>
                                                <br>
                                                <div class="bap-body">
                                                    <div class="container">
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td>Pada Tanggal </td>
                                                                <td>: {{ $item->created_at->isoFormat('D / MMMM / Y') }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Shift </td>
                                                                <td>: {{ $jadwal->shift }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Kelas </td>
                                                                <td>: {{ $jadwal->kelas->kelas }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Materi  </td>
                                                                <td>: {{ $jadwal->matkul->nama_matkul }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        <p>
                                                        </p>
                                                        <p>Telah dilaksanakan kegiatan praktikum dengan rincian sebagai berikut :</p>
                                                        <p><b>A. Peserta Praktikum</b>
                                                        <br>
                                                        <table>
                                                            <tbody>
                                                            <tr>
                                                                <td>Jumlah Hadir </td>
                                                                <td>: {{ $jadwal->kelas->jumlah_mhs - $item->alfa - $item->izin - $item->sakit }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Alfa </td>
                                                                <td>: {{ $item->alfa }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Izin </td>
                                                                <td>: {{ $item->izin }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Sakit </td>
                                                                <td>: {{ $item->sakit }}</td>
                                                            </tr>
                                                            </tbody>
                                                        </table>
                                                        
                                                        </p>
                                                        <p><b>B. Laporan Praktikum (Laporan Akhir)</b>
                                                        <br>
                                                        {{ $item->lap_akhir }}
                                                        </p>
                                                        <p>
                                                            <b>C. Tugas Minggu Berikutnya (Laporan Awal)</b>
                                                            <br>
                                                            {{ $item->lap_awal }}
                                                        </p>
                                                        <p>
                                                            <b>D. Ketua Asisten dan Asisten</b>
                                                            <br>
                                                            <table>
                                                                <tbody>
                                                                <tr>
                                                                    <td>Ketua Asisten </td>
                                                                    <td>:  

                                                                    @if ($instruktur = $item->absensi->where('status', 'instruktur')->first())
                                                                    {{ $instruktur->user->nama }}
                                                                    @else
                                                                    -
                                                                    @endif
                                                                        
                                                                    </td>
                                                                </tr>
                                                                @foreach ($item->absensi->where('status', 'asisten') as $asisten)
                                                                <tr>
                                                                    <td>
                                                                        @if ($loop->iteration == 1)
                                                                            Asisten
                                                                        @endif
                                                                    </td>
                                                                    <td>: {{ $asisten->user->nama }} </td>
                                                                </tr>
                                                                @endforeach
                                                                @if ($item->absensi->where('status', 'asisten')->isEmpty())
                                                                <tr>
                                                                    <td>
                                                                        Asisten
                                                                    </td>
                                                                    <td>: - </td>
                                                                </tr>
                                                                @endif
                                                                </tbody>
                                                            </table>
                                                            
                                                            {{-- <div class="alert alert-secondary alert-dismissible fade show my-1 py-1" role="alert">
                                                                {{$loop->iteration.". ". $asisten->user->nama  }}
                                                                <form action="{{ route('admin.jadwal.deleteAsisten', $asisten->id) }}" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="close py-1">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </form>
                                                            </div> --}}
                                                        </p>
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="bap-footer text-right">
                                                    <a href="{{ route('admin.berita-acara.edit', [$jadwal->id, $item->id]) }}" class="btn btn-warning btn-sm">Ubah</a>
                                                    <form class="d-inline" action="{{ route('admin.berita-acara.delete', [$jadwal->id, $item->id]) }}" method="post" id="form-hapus-{{ $item->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" onclick="hapus({{ $item->id }})" class="btn btn-danger btn-sm hapus">Hapus</button>
                                                    </form>
                                                    @if ($item->status == 'aktif')
                                                        <form class="d-inline" action="{{ route('admin.berita-acara.selesai', [$jadwal->id, $item->id]) }}" method="post" id="form-selesai-{{ $item->id }}">
                                                            @csrf
                                                            @method('put')
                                                            <button type="button" onclick="selesai({{ $item->id }})" class="btn btn-success btn-sm selesai">Selesai</button>
                                                        </form>
                                                    @endif
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                            </div>
                            
                            @endforeach
                            
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('after-script')
    <script>
        function hapus(id){
            Swal.fire({
            title: 'Yakin menghapus BAP ini?',
            text: "Kamu tidak akan bisa mengembalikan datanya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin, hapus BAP ini!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-hapus-'+id).submit();
            }
            });
        }

        function selesai(id){
            Swal.fire({
            title: 'Yakin menyelesaikan praktikum ini?',
            text: "Kamu tidak akan bisa mengembalikan datanya!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yakin, praktikum telah selesai!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('#form-selesai-'+id).submit();
            }
            });
        }
    </script>
@endpush