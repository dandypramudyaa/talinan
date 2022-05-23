@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Buat Artikel</h1>
        {{-- <p class='title-description'>Manage users who will have be able to control all aspects of the application.</p> --}}
    </div>

    <section class="section mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block mb-4">
                            <h4 class="title">Form Buat Artikel</h4>
                        </div>
                        <form class="user" action="{{ route('admins.artikel.store') }}" method="POST">
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
                                    placeholder="Judul" name="title">
                            </div>

                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea placeholder="Deskripsi Artikel" name="description" class="form-control" cols="30" rows="10"></textarea>
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