@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Artikel</h1>
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

    <section class="section">
        <a href="{{ route('admins.artikel.create') }}" class="btn btn-primary mb-4">Buat Artikel</a>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Cari Artikel</h3>
                        </div>
                        <form action="{{ route('admins.artikel.index') }}" method="GET" style="margin-bottom: 0">
                            @csrf
                            <section>
                                <div class="d-flex flex-row">
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Judul</label>
                                            <input type="text" class="form-control boxed" name="title" value="{{ $search_terms['title'] }}">
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
                            <h3 class="title">Artikel</h3>
                        </div>
                        <section>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Deskripsi</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($articles) <= 0)
                                            <tr>
                                                <td colspan="3">Tidak ada data artikel.</td>
                                            </tr>
                                        @else 
                                            @foreach($articles as $artikel)
                                                <tr>
                                                    <td>{{ $artikel->title }}</td>
                                                    <td>{{ $artikel->description }}</td>
                                                    <td>
                                                        <a href="{{ route('admins.artikel.show', [
                                                            'id' => $artikel->id
                                                        ]) }}" class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('admins.artikel.delete', [
                                                            'id' => $artikel->id
                                                        ]) }}" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {!! $articles->appends($_GET)->links() !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection