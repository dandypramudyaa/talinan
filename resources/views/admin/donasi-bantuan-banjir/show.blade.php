@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Donasi Bantuan Banjir</h1>
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

    <section class="section mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block mb-4">
                            <h4 class="title">Form Ubah Donasi Bantuan Banjir</h4>
                        </div>
                        <form class="user" action="{{ route('admins.donasi-bantuan-banjir.update', [
                                'id' => $donasi->id
                            ]) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="form-group">
                                <label>Nama Sesuai KTP</label>
                                <input type="text" class="form-control" placeholder="Nama" name="nama" value="{{ $donasi->nama }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="{{ $donasi->tanggal_lahir }}">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" placeholder="NIK" name="nik" value="{{ $donasi->nomor_nik }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat">{{ $donasi->alamat }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>

                            <div class="form-group">
                                <label>Jumlah Anggota Keluarga (ART)</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_ringan" value="Ringan (1-4 Anggota Keluarga)" @if($donasi->jumlah_anggota_keluarga == 'Ringan (1-4 Anggota Keluarga)') checked @endif>
                                    <label class="form-check-label" for="art_ringan">
                                        Ringan (1-4 Anggota Keluarga)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_sedang" value="Sedang (4-7 Anggota Keluarga)" @if($donasi->jumlah_anggota_keluarga == 'Sedang (4-7 Anggota Keluarga)') checked @endif>
                                    <label class="form-check-label" for="art_sedang">
                                        Sedang (4-7 Anggota Keluarga)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_berat" value="Berat (7 atau Lebih Anggota Keluarga)" @if($donasi->jumlah_anggota_keluarga == 'Berat (7 atau Lebih Anggota Keluarga)') checked @endif>
                                    <label class="form-check-label" for="art_berat">
                                        Berat (7 atau Lebih Anggota Keluarga)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Kerusakan Rumah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_ringan" value="Ringan (bagian depan rumah)" @if($donasi->kerusakan_rumah == 'Ringan (Bagian depan rumah)') checked @endif>
                                    <label class="form-check-label" for="kerusakan_ringan">
                                        Ringan (Bagian depan rumah)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_sedang" value="Sedang (air masuk ke rumah)" @if($donasi->kerusakan_rumah == 'Sedang (air masuk ke rumah)') checked @endif>
                                    <label class="form-check-label" for="kerusakan_sedang">
                                        Sedang (Air masuk ke rumah)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_berat" value="Berat (Rumah Terendam Air)" @if($donasi->kerusakan_rumah == 'Berat (Rumah Terendam Air)') checked @endif>
                                    <label class="form-check-label" for="kerusakan_berat">
                                        Berat (Rumah Terendam Air)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Penghasilan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_ringan" value="Ringan (5jt Lebih)" @if($donasi->penghasilan == 'Ringan (5jt Lebih)') checked @endif>
                                    <label class="form-check-label" for="penghasilan_ringan">
                                        Ringan (5jt Lebih)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_sedang" value="Sedang (3-5jt)" @if($donasi->penghasilan == 'Sedang (3-5jt)') checked @endif>
                                    <label class="form-check-label" for="penghasilan_sedang">
                                        Sedang (3-5jt)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_berat" value="Berat (500rb-3jt)" @if($donasi->penghasilan == 'Berat (500rb-3jt)') checked @endif>
                                    <label class="form-check-label" for="penghasilan_berat">
                                        Berat (500rb-3jt)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Anggota Keluarga yang terkena penyakit</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_ringan" value="Ringan (Penyakit Biasa)" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'Ringan (Penyakit Biasa)') checked @endif>
                                    <label class="form-check-label" for="terkena_penyakit_ringan">
                                        Ringan (Penyakit Biasa)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_sedang" value="Sedang (Rawat Jalan)" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'Sedang (Rawat Jalan)') checked @endif>
                                    <label class="form-check-label" for="terkena_penyakit_sedang">
                                        Sedang (Rawat Jalan)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_berat" value="Berat (Rawat Inap)" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'Berat (Rawat Inap)') checked @endif>
                                    <label class="form-check-label" for="terkena_penyakit_berat">
                                        Berat (Rawat Inap)
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Ubah
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection