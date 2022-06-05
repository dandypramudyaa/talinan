@extends('home.layout')

@section('style')
<style>
    article{
        background-color: #E0E0E0;
        padding: 10px;
        margin-bottom: 10px;
        margin-top: 10px;
    }
    figure img{
        width: 100%;
        height: 100%;
    }
    .glyphicon-folder-open,
    .glyphicon-user,
    .glyphicon-calendar,
    .glyphicon-eye-open,
    .glyphicon-comment{
        padding: 5px;
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
                                <h2 class="mb-4">Artikel</h2>
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
            <div class="col-lg-12 col-md-8 col-sm-9 col-xs-12">

                @foreach ($articles as $article)    
                    <article>
                        <div class="row">
                            <div class="col-sm-6 col-md-4">
                                <figure>
                                    <img src="{{ asset('images/articles.jpeg') }}">
                                </figure>
                            </div>
                            <div class="col-sm-6 col-md-8">
                                <h4 class="mt-2">{{ $article->title }}</h4>
                                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.</p>
                                <a href="{{ route('user.detail-artikel', $article->id) }}">Selengkapnya</a>
                                <section style="margin-top: 10px;">
                                    {{ $article->formatted_created_at }}
                                </section>
                            </div>
                        </div>
                    </article>  
                @endforeach
                
            </div>
        </div>
    </div>
@endsection
