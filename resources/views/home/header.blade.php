<div class="header-all" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="navbar navbar-expand-lg">
                    <a class="navbar-brand" href="#">Tali Nan</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.home') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.lapor-banjir') }}">Lapor Banjir</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.donasi') }}">Donasi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.artikel') }}">Artikel</a>
                            </li>
                            @if(empty(auth()->user()))
                                <li class="nav-item">
                                    <a class="nav-link btn-orange" href="{{ route('login') }}">Login / Register</a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link btn-orange" href="#" data-toggle="modal" data-target="#logoutModal">
                                        Logout
                                    </a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Logout?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">You will be logout from website.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">Logout</button>
                </form>
            </div>
        </div>
    </div>
</div>