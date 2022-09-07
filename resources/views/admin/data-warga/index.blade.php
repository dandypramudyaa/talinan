@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Data Warga</h1>
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
        <a href="{{ route('petugas.data-warga.create') }}" class="btn btn-primary mb-4">Buat Data Warga Baru</a>
    </section>

    <section class="section mb-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Import Data Warga</h3>
                        </div>
                        <form action="{{ route('admins.data-warga.import') }}" method="POST" style="margin-bottom: 0" enctype="multipart/form-data">
                            @csrf
                            <section>
                                <div class="d-flex flex-row">
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">File</label>
                                            <input type="file" class="form-control boxed" name="file">
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-2">
                                        <button class="btn btn-primary" type="submit" style="width: 100%;margin-top: 32px; height: 38px">Import</button>
                                    </div>
                                </div>
                            </section>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Cari Data Warga</h3>
                        </div>
                        <form action="{{ route('petugas.data-warga.index') }}" method="GET" style="margin-bottom: 0">
                            <section>
                                <div class="d-flex flex-row">
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Nama</label>
                                            <input type="text" class="form-control boxed" name="nama" value="{{ $search_terms['nama'] }}">
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
                            <h3 class="title">Data Warga</h3>
                        </div>
                        <section class="mt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>NO KK</th>
                                            <th>Alamat</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($data_warga) <= 0)
                                            <tr>
                                                <td colspan="5">Tidak ada data Data Warga.</td>
                                            </tr>
                                        @else 
                                            @foreach($data_warga as $index => $row)
                                                <tr>
                                                    <td>{{ $row->nama }}</td>
                                                    <td>{{ $row->nik }}</td>
                                                    <td>{{ $row->no_kk }}</td>
                                                    <td>{{ $row->alamat }}</td>
                                                    <td>
                                                        <a href="{{ route('petugas.data-warga.show', [
                                                            'id' => $row->id
                                                        ]) }}" class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('petugas.data-warga.delete', [
                                                            'id' => $row->id
                                                        ]) }}" class="btn btn-danger mt-2">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {!! $data_warga->appends($_GET)->links() !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection