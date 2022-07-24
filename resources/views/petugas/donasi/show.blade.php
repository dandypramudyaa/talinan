@extends('layouts.app')

@section('content')
    <div class="title-block">
        <h1 class="title">Detail Bantuan Dana</h1>
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
                            <h4 class="title">Detail Bantuan Dana</h4>
                        </div>
                        <form class="user" action="{{ route('petugas.donasi-bantuan-banjir.update', $donasi->id) }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" placeholder="Masukkan Nama" name="nama" value="{{ $donasi->nama }}">
                            </div>
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" maxlength="16" class="form-control" placeholder="Masukkan NIK" name="nik" value="{{ $donasi->nik }}">
                            </div>
                            <div class="form-group">
                                <label>No KK</label>
                                <input type="text" class="form-control" placeholder="Masukkan No KK" name="no_kk" value="{{ $donasi->no_kk }}">
                            </div>
                            <div class="form-group">
                                <label>No Rekening</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Rekening" name="no_rekening" value="{{ $donasi->no_rekening }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama Bank" name="nama_bank" value="{{ $donasi->nama_bank }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" cols="30" rows="4" placeholder="Alamat">{{ $donasi->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>No Telepon</label>
                                <input type="text" class="form-control" placeholder="Masukkan No Telepon" name="no_telepon" value="{{ $donasi->no_telepon }}">
                            </div>

                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control" type="file" name="image" id="formFile">
                            </div>

                            @if(!empty($donasi->foto))
                                <div class="mb-3">
                                    <img src="{{ asset('storage/' . $donasi->foto) }}" style="width: 500px;">
                                </div>
                            @endif


                            <div class="form-group">
                                <label>Seberapa parah kerusakan tempat tinggal?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parah_kerusakan_tempat_tinggal" id="parah_kerusakan_tempat_tinggal_ringan" value="ringan" @if($donasi->parah_kerusakan_tempat_tinggal == 'ringan') checked @endif>
                                    <label class="form-check-label" for="parah_kerusakan_tempat_tinggal_ringan">
                                        Akses jalan tertutup
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parah_kerusakan_tempat_tinggal" id="parah_kerusakan_tempat_tinggal_sedang" value="sedang" @if($donasi->parah_kerusakan_tempat_tinggal == 'sedang') checked @endif>
                                    <label class="form-check-label" for="parah_kerusakan_tempat_tinggal_sedang">
                                        Banjir masuk ke dalam rumah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="parah_kerusakan_tempat_tinggal" id="parah_kerusakan_tempat_tinggal_tinggi" value="tinggi" @if($donasi->parah_kerusakan_tempat_tinggal == 'tinggi') checked @endif>
                                    <label class="form-check-label" for="parah_kerusakan_tempat_tinggal_tinggi">
                                        Rumah tenggelam banjir
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Berapa tinggi banjir?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tinggi_banjir" id="tinggi_banjir_ringan" value="ringan" @if($donasi->tinggi_banjir == 'ringan') checked @endif>
                                    <label class="form-check-label" for="tinggi_banjir_ringan">
                                        Dibawah 60 cm
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tinggi_banjir" id="tinggi_banjir_sedang" value="sedang" @if($donasi->tinggi_banjir == 'sedang') checked @endif>
                                    <label class="form-check-label" for="tinggi_banjir_sedang">
                                        Diatas 60 - 150 cm
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="tinggi_banjir" id="tinggi_banjir_tinggi" value="tinggi" @if($donasi->tinggi_banjir == 'tinggi') checked @endif>
                                    <label class="form-check-label" for="tinggi_banjir_tinggi">
                                        Diatas 150 cm
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Berapa jumlah anggota keluarga?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga_ringan" value="ringan" @if($donasi->jumlah_anggota_keluarga == 'ringan') checked @endif>
                                    <label class="form-check-label" for="jumlah_anggota_keluarga_ringan">
                                        2-3 Orang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga_sedang" value="sedang" @if($donasi->jumlah_anggota_keluarga == 'sedang') checked @endif>
                                    <label class="form-check-label" for="jumlah_anggota_keluarga_sedang">
                                        3-5 Orang
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jumlah_anggota_keluarga" id="jumlah_anggota_keluarga_tinggi" value="tinggi" @if($donasi->jumlah_anggota_keluarga == 'tinggi') checked @endif>
                                    <label class="form-check-label" for="jumlah_anggota_keluarga_tinggi">
                                        Diatas 5 Orang
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Apakah ada korban jiwa?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="korban_jiwa" id="korban_jiwa_ringan" value="ringan" @if($donasi->korban_jiwa == 'ringan') checked @endif>
                                    <label class="form-check-label" for="korban_jiwa_ringan">
                                        Tidak ada korban jiwa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="korban_jiwa" id="korban_jiwa_sedang" value="sedang" @if($donasi->korban_jiwa == 'sedang') checked @endif>
                                    <label class="form-check-label" for="korban_jiwa_sedang">
                                        1 korban jiwa
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="korban_jiwa" id="korban_jiwa_tinggi" value="tinggi" @if($donasi->korban_jiwa == 'tinggi') checked @endif>
                                    <label class="form-check-label" for="korban_jiwa_tinggi">
                                        Diatas 1 korban jiwa
                                    </label>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Berapa anggota keluarga yang terkena penyakit?</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_yang_terkena_penyakit" id="anggota_keluarga_yang_terkena_penyakit_ringan" value="ringan" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'ringan') checked @endif>
                                    <label class="form-check-label" for="anggota_keluarga_yang_terkena_penyakit_ringan">
                                        Tidak ada
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_yang_terkena_penyakit" id="anggota_keluarga_yang_terkena_penyakit_sedang" value="sedang" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'sedang') checked @endif>
                                    <label class="form-check-label" for="anggota_keluarga_yang_terkena_penyakit_sedang">
                                        1 anggota keluarga
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="anggota_keluarga_yang_terkena_penyakit" id="anggota_keluarga_yang_terkena_penyakit_tinggi" value="tinggi" @if($donasi->anggota_keluarga_yang_terkena_penyakit == 'tinggi') checked @endif>
                                    <label class="form-check-label" for="anggota_keluarga_yang_terkena_penyakit_tinggi">
                                        Diatas 1 anggota keluarga
                                    </label>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Submit
                            </button>
                        </form>

                        @if (!empty($donasi->jumlah_yang_diberikan_admin))
                            <a href="{{ route('admins.donasi-bantuan-banjir.cetak-pdf', $donasi->id) }}">
                                <button class="btn btn-primary btn-user mt-4">
                                    Unduh File
                                </button>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection