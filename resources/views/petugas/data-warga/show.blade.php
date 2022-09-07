@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Data Warga</h1>
    </div>

    @if(Session::has('success_message'))
        <div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            {{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::has('error_message'))
        <div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="section mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block mb-4">
                            <h4 class="title">Detail Data Warga</h4>
                        </div>
                        <form class="user" action="{{ route('petugas.data-warga.update', $dataWarga->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
    
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Nama Sesuai KTP</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="{{ $dataWarga->nama }}">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" maxlength="16" class="form-control" placeholder="Masukkan NIK" name="nik" value="{{ $dataWarga->nik }}">
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" class="form-control" placeholder="Masukkan No KK" name="no_kk" value="{{ $dataWarga->no_kk }}">
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Rekening" name="no_rekening" value="{{ $dataWarga->no_rekening }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Bank" name="nama_bank" value="{{ $dataWarga->nama_bank }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat">{{ $dataWarga->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Telepon" name="no_telepon" value="{{ $dataWarga->no_telepon }}">
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection