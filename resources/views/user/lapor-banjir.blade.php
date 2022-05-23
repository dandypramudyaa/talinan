@extends('home.layout')

@section('style')
<style>
    .form-style input{
        border:0;
        height:50px;
        border-radius:0;
        border-bottom:1px solid #ebebeb;	
    }
    .form-style input:focus{
        border-bottom:1px solid #007bff;	
        box-shadow:none;
        outline:0;
        background-color:#ebebeb;	
    }
    .sideline {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        text-align: center;
        color:#ccc;
    }
    button{
        height:50px;	
    }
    .sideline:before,
    .sideline:after {
        content: '';
        border-top: 1px solid #ebebeb;
        margin: 0 20px 0 0;
        flex: 1 0 20px;
    }

    .sideline:after {
        margin: 0 0 0 20px;
    }
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
                                <h2 class="mb-4">Lapor Info Banjir</h2>
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

    <div class="container" style="margin-bottom: 100px; margin-top: 50px;">
        <div class="row">
            
            <div class="col-6 mx-auto p-4 m-5 border-light shadow-sm">

                @if(Session::has('success_message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success_message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                
                <h3 class="pb-3">Lapor Info Banjir </h3>
                <div class="form-style">
                    <form action="{{ route('user.store-lapor-banjir') }}" method="POST" >
                        @csrf
                        <div class="form-group pb-3">    
                            <label for="tanggal_bencana">Tanggal Bencana</label>
                            <input type="date" class="form-control" name="tanggal_bencana" id="tanggal_bencana">   
                        </div>
                        <div class="form-group pb-3">  
                            <label for="waktu_bencana">Tanggal Bencana</label> 
                            <input type="time" class="form-control" name="waktu_bencana" id="waktu_bencana">
                        </div>
                        <div class="form-group pb-3">  
                            <label for="alamat_bencana">Alamat Bencana</label> 
                            <textarea name="alamat_bencana" id="alamat_bencana" cols="30" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="form-group pb-3">  
                            <label for="jml_rumah_terkena_banjir">Jumlah Rumah Terkena Banjir</label> 
                            <input type="number" class="form-control" name="jml_rumah_terkena_banjir" id="jml_rumah_terkena_banjir" placeholder="Masukkan Jumlah Rumah Terkena Banjir">
                        </div>
                        <div class="form-group pb-3">  
                            <label for="jml_korban_luka_berat">Jumlah Korban Luka Berat</label> 
                            <input type="number" class="form-control" name="jml_korban_luka_berat" id="jml_korban_luka_berat" placeholder="Masukkan Jumlah Korban Luka Berat">
                        </div>
                        <div class="form-group pb-3">  
                            <label for="jml_korban_luka_ringan">Jumlah Korban Luka Ringan</label> 
                            <input type="number" class="form-control" name="jml_korban_luka_ringan" id="jml_korban_luka_ringan" placeholder="Masukkan Jumlah Korban Luka Ringan">
                        </div>
                        <div class="pb-2">
                            <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
