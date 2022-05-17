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
                                <h2 class="mb-4">Donasi</h2>
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

    <div class="container" style="margin-bottom: 250px; margin-top: 100px;">
        <div class="row">

            @foreach ($donasi_rows as $donasi)    
                <div class="col-lg-4 col-12 text-center mt-4">
                    <div class="box-column" style="border-style: solid; border-radius: 10px;">
                        <div class="box-header box-header-twitter">
                            <i class="fa fa-twitter fa-3x" aria-hidden="true"></i>
                        </div>
                        <div class="box-bottom">
                            <div class="box-title twitter-title">
                                {{ $donasi->nama }}
                            </div>
                            <div class="box-text" style="padding: 5px;">
                                Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.
                            </div>
                            <a href="#" target="_blank">
                                <button type="button" class="btn btn-primary">Donate</button>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
                
        </div>
    </div>
@endsection
