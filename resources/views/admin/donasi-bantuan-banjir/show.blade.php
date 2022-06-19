@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Donasi Bantuan Banjir</h1>
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
                        <div class="card-title-block mb-4">
                            <h4 class="title">Form Donasi Bantuan Banjir</h4>
                        </div>
                        <form class="user" action="{{ route('admins.donasi-bantuan-banjir.update', [
                                'id' => $donasi->id
                            ]) }}" method="POST" enctype="multipart/form-data">
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

                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->nama }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">NIK</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->nik }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">No KK</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->no_kk }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">No Rekening</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->no_rekening }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Nama Bank</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->nama_bank }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->alamat }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">No Telepon</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->no_telepon }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Kerusakan Tempat Tinggal</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->parah_kerusakan_tempat_tinggal }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Tinggi Banjir</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->tinggi_banjir }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Jumlah Anggota Keluarga</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->jumlah_anggota_keluarga }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Korban Jiwa</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->korban_jiwa }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Anggota Keluarga yang Tekena Penyakit</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": {{ $donasi->anggota_keluarga_yang_terkena_penyakit }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="staticEmail" class="col-sm-2 col-form-label">Rekomendasi Donasi</label>
                                <div class="col-sm-10">
                                    <input type="text" readonly class="form-control-plaintext" value=": Rp. x.xxx.xxx">
                                </div>
                            </div>

                            {{-- <button type="submit" class="btn btn-primary btn-user btn-block">
                                Ubah
                            </button> --}}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection