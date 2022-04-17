@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">My Profile</h1>
        <p class='title-description'>Manage my profile.</p>
    </div>

    @if(Session::has('success_message'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success_message') }}
        </div>
    @endif

    @if(Session::has('error_message'))
        <div class="alert alert-danger" role="alert">
            {{ Session::get('error_message') }}
        </div>
    @endif

    <section class="section">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">My Profile</h3>
                        </div>
                        <form action="{{ route('admins.profile.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" placeholder="Enter First Name" name="first_name" value="{{ $user->first_name }}">
                                @error('first_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" placeholder="Enter Last Name" name="last_name" value="{{ $user->last_name }}">
                                @error('last_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror   
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Picture</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>

                            @if(!empty($user->profile_pic_name))
                                <img src="{{ asset('storage/' . $user->profile_pic_name) }}">
                            @endif

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" readonly value="{{ $user->email}}">
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter Address" name="address" value="{{ $user->address }}">
                            </div>
                            <div class="mb-3">
                                <label for="gender" class="form-label">Gender</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option @if( $user->gender == 'Laki-laki') selected @endif  value="Laki-laki">Laki - laki</option>
                                    <option @if( $user->gender == 'Perempuan') selected @endif value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit">Edit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection