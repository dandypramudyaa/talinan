@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Artikel</h1>
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
                            <h4 class="title">Form Ubah Artikel</h4>
                        </div>
                        <form class="user" action="{{ route('admins.artikel.update', [
                                'id' => $artikel->id
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
                            @endif

                            <div class="form-group">
                                <label>Judul</label>
                                <input type="text" class="form-control" id="exampleInputUsername"
                                    placeholder="Judul" name="title" value="{{ $artikel->title }}">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea placeholder="Deskripsi Artikel" name="description" class="form-control" cols="30" rows="10">{{ $artikel->description }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Ubah
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection