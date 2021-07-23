@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title font-weight-normal">Daftar Praktikum</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <th>ID</th>
                                <th>Praktikum</th>
                                <th>Kelas</th>
                                <th>Instruktur</th>
                                <th>Berita Acara</th>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                {{-- {{ dd( ) }} --}}
                                {{-- @if ($item->instruktur->first()->user_id == Auth::user()->id || $item->asisten->where('user_id', Auth::user()->id)->count() > 0 ) --}}
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->matkul->nama_matkul }}</td>
                                        <td>{{ $item->kelas->kelas }}</td>
                                        <td>{{ $item->instruktur->first()->user->nama }}</td>
                                        <td>
                                            <a href="{{ route('admin.berita-acara.show', $item->id) }}" class="btn btn-primary">Pilih</a>
                                        </td>
                                    </tr>
                                {{-- @endif --}}
                                
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection