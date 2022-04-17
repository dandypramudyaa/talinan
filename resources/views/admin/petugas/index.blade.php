@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Petugas</h1>
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
        <a href="{{ route('admins.petugas.create') }}" class="btn btn-primary mb-4">Buat Petugas</a>
    </section>

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">Cari Petugas</h3>
                        </div>
                        <form action="{{ route('admins.petugas.index') }}" method="GET" style="margin-bottom: 0">
                            @csrf
                            <section>
                                <div class="d-flex flex-row">
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Username</label>
                                            <input type="text" class="form-control boxed" name="username" value="{{ $search_terms['username'] }}">
                                        </div>
                                    </div>
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">First Name</label>
                                            <input type="text" class="form-control boxed" name="first_name" value="{{ $search_terms['first_name'] }}">
                                        </div>
                                    </div>
                                    <div style="margin-right: 20px; width: 100%">
                                        <div class="form-group" style='margin-bottom: 0'>
                                            <label class="control-label">Last Name</label>
                                            <input type="text" class="form-control boxed" name="last_name" value="{{ $search_terms['last_name'] }}">
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
                            <h3 class="title">Petugas</h3>
                        </div>
                        <section>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>First Name</th>
                                            <th>Last Name</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($users) <= 0)
                                            <tr>
                                                <td colspan="5">Tidak ada data petugas.</td>
                                            </tr>
                                        @else 
                                            @foreach($users as $user)
                                                <tr>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->username }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>
                                                        <a href="{{ route('admins.petugas.show', [
                                                            'id' => $user->id
                                                        ]) }}" class="btn btn-primary">Detail</a>
                                                        <a href="{{ route('admins.petugas.delete', [
                                                            'id' => $user->id
                                                        ]) }}" class="btn btn-danger">Hapus</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                            {!! $users->appends($_GET)->links() !!}
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection