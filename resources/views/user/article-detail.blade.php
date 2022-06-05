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
                                <h2 class="mb-4">Detail Artikel</h2>
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
                    <h5 class="card-title">Detail Artikel</h5>
                    <div class="col-sm-12">{{ $artikel->title }}</div>
                    <div class="col-sm-12">{{ $artikel->description }}</div>
                </div>
            </div>
        </div>
        
    </div>
@endsection
