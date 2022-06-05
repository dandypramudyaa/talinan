@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Buat Donasi Bantuan Banjir</h1>
        {{-- <p class='title-description'>Manage users who will have be able to control all aspects of the application.</p> --}}
    </div>

    <section class="section mt-4">
        <div class="row">
            <div class="col-sm-12">
                <div class="card p-4">
                    <div class="card-block">
                        <div class="card-title-block mb-4">
                            <h4 class="title">Form Buat Donasi Bantuan Banjir</h4>
                        </div>
                        <form class="user" action="{{ route('admins.donasi-bantuan-banjir.store') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" placeholder="Nama" name="nama">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" class="form-control" placeholder="NIK" name="nik">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="5" placeholder="Alamat"></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>

                            <div class="form-group">
                                <label>Jumlah Anggota Keluarga (ART)</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_ringan" value="Ringan (1-4 Anggota Keluarga)">
                                    <label class="form-check-label" for="art_ringan">
                                        Ringan (1-4 Anggota Keluarga)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_sedang" value="Sedang (4-7 Anggota Keluarga)">
                                    <label class="form-check-label" for="art_sedang">
                                        Sedang (4-7 Anggota Keluarga)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_art" id="art_berat" value="Berat (7 atau Lebih Anggota Keluarga)">
                                    <label class="form-check-label" for="art_berat">
                                        Berat (7 atau Lebih Anggota Keluarga)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Kerusakan Rumah</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_ringan" value="Ringan (bagian depan rumah)">
                                    <label class="form-check-label" for="kerusakan_ringan">
                                        Ringan (Bagian depan rumah)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_sedang" value="Sedang (air masuk ke rumah)">
                                    <label class="form-check-label" for="kerusakan_sedang">
                                        Sedang (Air masuk ke rumah)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="kerusakan_rumah" id="kerusakan_berat" value="Berat (Rumah Terendam Air)">
                                    <label class="form-check-label" for="kerusakan_berat">
                                        Berat (Rumah Terendam Air)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Penghasilan</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_ringan" value="Ringan (5jt Lebih)">
                                    <label class="form-check-label" for="penghasilan_ringan">
                                        Ringan (5jt Lebih)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_sedang" value="Sedang (3-5jt)">
                                    <label class="form-check-label" for="penghasilan_sedang">
                                        Sedang (3-5jt)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="penghasilan" id="penghasilan_berat" value="Berat (500rb-3jt)">
                                    <label class="form-check-label" for="penghasilan_berat">
                                        Berat (500rb-3jt)
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Anggota Keluarga yang terkena penyakit</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_ringan" value="Ringan (Penyakit Biasa)">
                                    <label class="form-check-label" for="terkena_penyakit_ringan">
                                        Ringan (Penyakit Biasa)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_sedang" value="Sedang (Rawat Jalan)">
                                    <label class="form-check-label" for="terkena_penyakit_sedang">
                                        Sedang (Rawat Jalan)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_terkena_penyakit" id="terkena_penyakit_berat" value="Berat (Rawat Inap)">
                                    <label class="form-check-label" for="terkena_penyakit_berat">
                                        Berat (Rawat Inap)
                                    </label>
                                </div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection