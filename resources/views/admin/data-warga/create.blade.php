@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Buat Data Warga</h1>
    </div>

    <section class="section mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block mb-4">
                            <h4 class="title">Form Buat Data Warga</h4>
                        </div>
                        <form class="user" action="{{ route('petugas.data-warga.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" maxlength="16" class="form-control" placeholder="Masukkan NIK" name="nik">
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" class="form-control" placeholder="Masukkan No KK" name="no_kk">
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Rekening" name="no_rekening">
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Bank" name="nama_bank">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Telepon" name="no_telepon">
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