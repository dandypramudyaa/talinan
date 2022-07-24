<!DOCTYPE html>
<html>
    <head>
        <title>Surat Bantuan Dana</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="mt-4">
            <center>
                <h6>PENERIMAAN BANTUAN DANA KORBAN BENCANA ALAM BANJIR</h6>
                <h6>KOTA JAKARTA BARAT PROVINSI DKI JAKARTA</h6>
                <p style="font-size: 13px;">Kelurahan Tegal Alur Jalan Kamal Raya No.3, 11820</p>
            </center>

            <p class="float-right" style="font-size: 13px;">Jakarta, {{ $donasi->created_at->format('d F Y') }}</p>

            <div style="font-size: 15px; margin-top: 50px;">
                <table>
                    <tr>
                        <td style="width: 12%;">No</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 65%;">04.1/PBDKAB/VII/2022</td>
                    </tr>
                    <tr>
                        <td style="width: 12%;">Lampiran</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 65%;">1 Berkas Penerima Bantuan Alam Banjir</td>
                    </tr>
                    <tr>
                        <td style="width: 12%; vertical-align: top;">Hal</td>
                        <td style="width: 2%; vertical-align: top;">:</td>
                        <td style="width: 65%;">Penerimaan Dana Bantuan Alam Banjir Rekomendasi Kelurahan
                            Tegal Alur, Kota Jakarta Barat, Provinsi DKI Jakarta</td>
                    </tr>
                </table>

                <p class="mt-3">
                    Kepada Yth.
                    <br>
                    <b>{{ $donasi->nama }}</b>
                    <br>
                    Kota Jakarta Barat
                    <br>
                    <b>{{ $donasi->alamat }}</b>
                </p>

                <p class="mt-3">Dengan Hormat</p>

                <p class="mt-3" style="text-align: justify; text-justify: inter-word;">Dalam rangka penyaluran bantuan sosial bencana alam banjir berupa dana, kami
                    selaku pihak kelurahan tegal alur merekomendasikan dana atas data yang kami
                    terima kepada <b>{{ $donasi->nama }}</b> sebesar Rp.<b>{{ $donasi->jumlah_yang_diberikan_admin }}</b>. Dana tersebut akan di
                    salurkan sesuai dengan no rekening bank yang telah terdaftar.
                </p>

                <p class="mt-3" style="text-align: justify; text-justify: inter-word;">Demikian Surat Penerimaan Dana Bantuan Alam Banjir Ini Kami Buat. Atas perhatian dan kerjasama Bapak/ Ibu kami ucapkan terima kasih.</p>

                <p class="mt-3" style="text-align: justify; text-justify: inter-word;">
                    Hormat Kami,
                    <br>
                    Lurah Tegal Alur,
                </p>
            </div>

        </div>
    </body>
</html>