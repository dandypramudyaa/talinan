@extends('home.layout')

@section('content')
    <div class="hero-background"
        style="background-image: url({{ asset('home-assets/3.jpg') }}); background-size:cover; background-position:center; height:500px; background-attachment:fixed;">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="hero-title">
                                <h2 class="mb-4">Welcome To Tali nan Website</h2>
                                <p class="mb-4">Talinan sebuah organisasi yang bertujuan untuk membantu masyarakat yang
                                    sedang mengalamai masa sulit. Kami hadir untuk membantu dan menjadi jembatan untuk
                                    uluran tangan kalian kepada korban yang mengalami masa sulit</p>
                                <a href="#" class="btn-orange-hero">Donasi Sekarang!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-1-content">
                        <h2 class="mb-4">Tali nan Website</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Repudiandae corporis quibusdam, modi
                            voluptatibus nam vel culpa dicta eum provident. Placeat quidem obcaecati corrupti nisi ducimus
                            ea adipisci minus nihil provident praesentium possimus, blanditiis maiores odio! Quis similique
                            ducimus, recusandae dolorem amet adipisci sapiente eligendi? Numquam voluptatum odio ab.
                            Consectetur, odio?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-2"
        style="background-image: url({{ asset('home-assets/Flood.jpeg') }} ); background-size:cover; background-position:center; height:600px; background-attachment:fixed;">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="section-2-title">
                                <h2 class="mb-4">Donasi</h2>
                                <p>Mari meringankan beban dan bantu teman atau keluarga kita yang sedang terkena musibah bencana banjir.</p>
                                    <a class="nav-link btn-orange" href="{{ route('user.donasi') }}">Selengkapnya</a>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="responsive">
                                @foreach ($donasi_data as $key => $donasi)
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('storage/' . $donasi->foto) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $donasi->nama }}</h5>
                                            <p class="card-text">{{ $donasi->alamat }}</p>
                                            <a href="{{ route('user.donasi-detail', $donasi->id) }}" class="btn btn-primary">Donasi</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-3"
        style="background-image: url({{ asset('home-assets/3.jpg') }}); background-size:cover; background-position:center; height:600px; background-attachment:fixed;">
        <div class="desktop-only table">
            <div class="desktop-only table-cell">
                <div class="container">
                    <div class="row">
                    <div class="col-md-8">
                            <div class="responsive">
                                @foreach ($artikel_data as $key => $artikel)   
                                    <div class="card" style="width: 18rem;">
                                        <img class="card-img-top" src="{{ asset('home-assets/1.jpeg') }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $artikel->title }}</h5>
                                            <p class="card-text">{{ $artikel->description }}</p>
                                            <a href="#" class="btn btn-primary">Lihat Selengkapnya</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section-2-title">
                                <h2 class="mb-4">Artikel</h2>
                                <p>Ikuti berita terbaru tentang bencana banjir disini.</p>
                                    <a class="nav-link btn-orange" href="{{ route('user.artikel') }}">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-4" style="background-image: url({{ asset('home-assets/misbahul-aulia-j6oZ1Cg8viY-unsplash.jpeg') }}); background-size:cover; background-position:center; height:550px">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-4-title text-center">
                                <h2 style="color: #fff;">Ada Bencana Banjir ?</h2>
                                <a class="nav-link btn-orange mt-5" style="width: 200px; margin:auto; display:block" href="{{ route('user.lapor-banjir') }}">Lapor Disini</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
