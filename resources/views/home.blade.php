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
                                <h2 class="mb-4">a little of you, precious to us</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam rerum officiis
                                    accusamus tenetur ab tempora voluptatibus odio aliquam assumenda tempore, possimus
                                    cumque nam labore harum optio, totam autem eos quasi.</p>
                                    <a class="nav-link btn-orange" href="#">See More</a>

                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="responsive">
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/1.jpeg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/2.jpeg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/3.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>

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
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/3.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/3.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>
                                <div class="card" style="width: 18rem;">
                                    <img class="card-img-top" src="{{ asset('home-assets/3.jpg') }}" alt="Card image cap">
                                    <div class="card-body">
                                        <h5 class="card-title">Card title</h5>
                                        <p class="card-text">Some quick example text to build on the card title and make up
                                            the bulk of the card's content.</p>
                                        <a href="#" class="btn btn-primary">Donate Now</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="section-2-title">
                                <h2 class="mb-4">Our Blog</h2>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam rerum officiis
                                    accusamus tenetur ab tempora voluptatibus odio aliquam assumenda tempore, possimus
                                    cumque nam labore harum optio, totam autem eos quasi.</p>
                                    <a class="nav-link btn-orange" href="#">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section-4" style="background-image: url({{ asset('home-assets/donate.jpg') }}); background-size:cover; background-position:center; height:550px">
        <div class="table">
            <div class="table-cell">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="section-4-title text-center">
                                <h2 style="color: #fff;">Want To Donate?</h2>
                                <a class="nav-link btn-orange mt-5" style="width: 200px; margin:auto; display:block" href="#">Become A Member</a>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
