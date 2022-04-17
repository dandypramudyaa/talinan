@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Donasi Bantuan Banjir</h1>
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
        <a href="{{ route('admins.donasi-bantuan-banjir.create') }}" class="btn btn-primary mb-4">Buat Donasi Bantuan Banjir</a>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Cari Laporan Info Banjir</h3>
                        </div>
                        <form action="{{ route('admins.donasi-bantuan-banjir.index') }}" method="GET" style="margin-bottom: 0">
                            @csrf
                            <section>
                                <div class="d-flex flex-row">
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control boxed" name="nama" value="{{ $search_terms['nama'] }}">
                                        </div>
                                    </div>
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Alamat</label>
                                            <input type="text" class="form-control boxed" name="alamat" value="{{ $search_terms['alamat'] }}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <button class="btn btn-primary" type="submit" style="width: 100%;margin-top: 32px; height: 38px">Cari</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-2">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Donasi Bantuan Banjir</h3>
                        </div>
                        <section class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Kerusakan Rumah</th>
                                            <th>Jumlah Anggota Keluarga</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($donasi_bantuan_banjir) <= 0)
                                            <tr>
                                                <td colspan="5">Tidak ada data donasi bantuan banjir.</td>
                                            </tr>
                                        @else 
                                            @foreach($donasi_bantuan_banjir as $bantuan)
                                                <tr>
                                                    <td>{{ $bantuan->nama }}</td>
                                                    <td>{{ $bantuan->alamat }}</td>
                                                    <td>{{ $bantuan->kerusakan_rumah }}</td>
                                                    <td>{{ $bantuan->jumlah_anggota_keluarga }}</td>
                                                    <td>
                                                        <a href="{{ route('admins.donasi-bantuan-banjir.show', [
                                                            'id' => $bantuan->id
                                                        ]) }}" class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('admins.donasi-bantuan-banjir.delete', [
                                                            'id' => $bantuan->id
                                                        ]) }}" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {!! $donasi_bantuan_banjir->appends($_GET)->links() !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection