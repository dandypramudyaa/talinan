@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Laporan Bencana Banjir</h1>
        {{-- <p class='title-description'>Manage users who will have be able to control all aspects of the application.</p> --}}
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="card-title-block mb-4">
                                    <h4 class="title">Detail Laporan Bencana Banjir</h4>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                @if ($laporan->status == 'Menunggu Konfirmasi')
                                    <a href="{{ route('petugas.laporan-banjir.konfirmasi', [
                                        'id' => $laporan->id
                                    ]) }}" class="btn btn-success float-right">Konfirmasi Laporan Ini</a>
                                @endif
                            </div>
                        </div>
                        
                        {{-- <form class="user" action="{{ route('petugas.laporan-banjir.update', [
                                'id' => $laporan->id
                            ]) }}" method="POST">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif --}}

                            <div class="form-group">
                                <label for="tanggal_bencana">Tanggal Bencana</label>
                                <input type="date" class="form-control" id="tanggal_bencana" placeholder="Judul" name="tanggal_bencana" value="{{ $laporan->tanggal_bencana }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="waktu_bencana">Waktu Bencana</label>
                                <input type="time" class="form-control" id="waktu_bencana" placeholder="Judul" name="waktu_bencana" value="{{ $laporan->waktu_bencana }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="alamat_bencana">Alamat Bencana</label>
                                <textarea placeholder="Alamat Bencana" name="description" class="form-control" cols="30" rows="5" readonly>{{ $laporan->alamat_bencana }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_rumah_terkena_banjir">Jumlah Rumah Terkena Banjir</label>
                                <input type="number" class="form-control" id="jumlah_rumah_terkena_banjir" placeholder="Judul" name="jumlah_rumah_terkena_banjir" value="{{ $laporan->jumlah_rumah_terkena_banjir }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_korban_luka_berat">Jumlah Korban Luka Berat</label>
                                <input type="date" class="form-control" id="jumlah_korban_luka_berat" placeholder="Judul" name="jumlah_korban_luka_berat" value="{{ $laporan->jumlah_korban_luka_berat }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_korban_luka_ringan">Jumlah Korban Luka Ringan</label>
                                <input type="date" class="form-control" id="jumlah_korban_luka_ringan" placeholder="Judul" name="jumlah_korban_luka_ringan" value="{{ $laporan->jumlah_korban_luka_ringan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="status">Status</label>
                                <input type="text" class="form-control" id="status" placeholder="Judul" name="status" value="{{ $laporan->status }}" readonly>
                            </div>
                            <div class="form-group">
                                <img src="{{ asset('storage/' . $laporan->foto) }}" width="600">
                            </div>
                            {{-- <button type="submit" class="btn btn-primary btn-user btn-block">
                                Ubah
                            </button> --}}
                            <a href="{{ route('petugas.laporan-banjir.index') }}">
                                <button class="btn btn-primary w-4 float-right">
                                    Kembali
                                </button>
                            </a>
                        {{-- </form> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection