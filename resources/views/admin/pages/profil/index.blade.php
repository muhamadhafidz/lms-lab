@extends('admin.layouts.default')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-10">
                <div class="card profil">
                    <div class="card-body">
                        <div class="container my-4">
                            <div class="row">
                                <div class="col-6 text-center">
                                    <div class="foto w-50 mx-auto">
                                        <img src="{{ asset(Auth::user()->dir_foto) }}" class="img-fluid rounded-circle mb-2" alt="">
                                        <a href="">Ganti foto</a>
                                    </div>
                                    <h3 class="font-weight-bold">{{ Auth::user()->nama }}</h3>
                                    <p class="">{{ ucwords(Auth::user()->roles) }} Lab</p>
                                </div>
                                <div class="col-6">
                                    <h5 class="font-weight-bold mb-1">Nomor Mahasiswa</h5>
                                    <h5>{{ Auth::user()->npm }}</h5>
                                    <h5 class="font-weight-bold mb-1">Email</h5>
                                    <h5>{{ Auth::user()->email }}</h5>
                                    <h5 class="font-weight-bold mb-1">Nomor Telepon</h5>
                                    <h5>{{ Auth::user()->no_telp }}</h5>

                                    <div class="btn-profil mt-5">
                                        <a href="" class="btn btn-primary">Ubah profil</a>
                                        <a href="" class="btn btn-danger">Ubah Password</a>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection