@extends('home.layout')

@section('style')
<style>
    .box-header {
        background: #dedede;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        padding: 60px 0px;
    }

    .box-header .fa {
        color: #FFF;
    }

    .box-header-instagram {
        background: linear-gradient(45deg, #f2935b, #6f49c0);
    }

    .box-header-twitter {
        background: linear-gradient(45deg, #cae1f3, #55aded);
    }

    .box-header-facebook {
        background: linear-gradient(45deg, #95a2c1, #3b579d);
    }

    .box-bottom {
        background: #FFF;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        padding: 30px 0px;
    }

    .box-text {
        padding: 10px 0px; 
    }

    .widget .panel-body { padding:0px; }
    .widget .list-group { margin-bottom: 0; }
    .widget .panel-title { display:inline }
    .widget .label-info { float: right; }
    .widget li.list-group-item {border-radius: 0;border: 0;border-top: 1px solid #ddd;}
    .widget li.list-group-item:hover { background-color: rgba(86,61,124,.1); }
    .widget .mic-info { color: #666666;font-size: 11px; }
    .widget .action { margin-top:5px; }
    .widget .comment-text { font-size: 12px; }
    .widget .btn-block { border-top-left-radius:0px;border-top-right-radius:0px; }
</style>
@endsection

@section('content')
    <div class="hero-background"
        style="background-image: url({{ asset('home-assets/3.jpg') }}); background-size:cover; background-position:center; height:500px; background-attachment:fixed;">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="hero-title text-center">
                                <h2 class="mb-4">Detail Donasi</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-1-content">
                        <h2 class="mb-4">Artikel</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div class="container" style="margin-bottom: 200px; margin-top: 80px;">

        @if(Session::has('success_message'))
            <div class="alert alert-success alert-dismissible fade show" style="margin-bottom: 40px" role="alert">
                {{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="row" style="margin-bottom: 50px;">

            <div class="card" style="width: 1000px; margin: 0 auto; float: none;">
                <div class="card-body">
                    <h5 class="card-title">Detail Donasi</h5>
                    <form>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="nama" value="{{ $donasi->nama }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tanggal_lahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="tanggal_lahir" value="{{ $donasi->tanggal_lahir }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="alamat" value="{{ $donasi->alamat }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_anggota_keluarga" class="col-sm-3 col-form-label">Jumlah Anggota Keluarga</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="jumlah_anggota_keluarga" value="{{ $donasi->jumlah_anggota_keluarga }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="kerusakan_rumah" class="col-sm-3 col-form-label">Kerusakan Rumah</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="kerusakan_rumah" value="{{ $donasi->kerusakan_rumah }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="penghasilan" class="col-sm-3 col-form-label">Penghasilan</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="penghasilan" value="{{ $donasi->penghasilan }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="anggota_keluarga_yang_terkena_penyakit" class="col-sm-3 col-form-label">Anggota Keluarga yang Terkena Penyakit</label>
                            <div class="col-sm-9">
                                <input type="text" readonly class="form-control-plaintext" id="anggota_keluarga_yang_terkena_penyakit" value="{{ $donasi->anggota_keluarga_yang_terkena_penyakit }}">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="row" style="width: 1000px; margin: 0 auto; float: none;">
            <div class="panel panel-default widget p-2" style="width: 100%; border-style: solid; border-color: rgb(229, 229, 229); border-radius: 5px;">
                <div class="panel-heading mb-2">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h3 class="panel-title">Tambah Donasi</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('user.store-donasi', $donasi->id) }}" method="POST" class="form-horizontal" id="commentForm" role="form"> 
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Jumlah Donasi</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" name="jumlah_donasi" id="jumlah_donasi"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">                    
                                <button class="btn btn-success btn-circle text-uppercase" type="submit" id="submitComment"><span class="glyphicon glyphicon-send"></span>Donasi</button>
                            </div>
                        </div>            
                    </form>
                </div>
            </div>
        </div>

        <div class="row" style="width: 1000px; margin: 0 auto; float: none; margin-top:50px;">
            <div class="panel panel-default widget p-2" style="width: 100%; border-style: solid; border-color: rgb(229, 229, 229); border-radius: 5px;">
                <div class="panel-heading mb-2">
                    <span class="glyphicon glyphicon-comment"></span>
                    <h3 class="panel-title">Para Donasi</h3>
                    <span class="label label-info">{{ $jumlah_donatur }}</span>
                </div>
                <div class="panel-body">
                    <ul class="list-group">
                        @foreach ($para_donatur as $donatur)    
                            <li class="list-group-item">
                                <div class="row">
                                    <div class="col-xs-2 col-md-1">
                                        <img src="data:image/jpeg;base64,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" class="img-circle img-responsive" width="70" style="border-radius: 50%;"/></div>
                                    <div class="col-xs-10 col-md-11">
                                        <h5>{{ $donatur->user->first_name }} {{ $donatur->user->last_name }}</h5>
                                        <div class="comment-text">
                                            {{ $donatur->jumlah }}
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    </div>
@endsection
