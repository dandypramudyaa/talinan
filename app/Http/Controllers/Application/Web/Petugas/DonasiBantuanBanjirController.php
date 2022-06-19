<?php

namespace App\Http\Controllers\Application\Web\Petugas;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\DonasiBanjir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;

class DonasiBantuanBanjirController extends Controller
{

    public function __construct()
    {
        View::share('active_page', 'donasi');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $donasiBanjir = new DonasiBanjir();
        
        if(!empty($request->nama)){
            $donasiBanjir = $donasiBanjir->where('nama', 'LIKE', '%'.$request->nama.'%');
        }
        
        if(!empty($request->alamat)){
            $donasiBanjir = $donasiBanjir->where('alamat', 'LIKE', '%'.$request->alamat.'%');
        }

        $donasiBanjir = $donasiBanjir->paginate(20);
        return view('petugas.donasi.index',[
            'donasi_bantuan_banjir' => $donasiBanjir,
            'search_terms' => [
                'nama' => $request->nama,
                'alamat' => $request->alamat,
            ]
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('petugas.donasi.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_rekening' => 'required',
            'nama_bank' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'parah_kerusakan_tempat_tinggal' => 'required',
            'tinggi_banjir' => 'required',
            'jumlah_anggota_keluarga' => 'required',
            'korban_jiwa' => 'required',
            'anggota_keluarga_yang_terkena_penyakit' => 'required',
        ]);

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('public/donasi');

        $donasiBanjir = new DonasiBanjir();
        $donasiBanjir->user_id = auth()->user()->id;
        $donasiBanjir->nama = $request->nama;
        $donasiBanjir->nik = $request->nik;
        $donasiBanjir->no_kk = $request->no_kk;
        $donasiBanjir->no_rekening = $request->no_rekening;
        $donasiBanjir->nama_bank = $request->nama_bank;
        $donasiBanjir->alamat = $request->alamat;
        $donasiBanjir->no_telepon = $request->no_telepon;
        $donasiBanjir->parah_kerusakan_tempat_tinggal = $request->parah_kerusakan_tempat_tinggal;
        $donasiBanjir->tinggi_banjir = $request->tinggi_banjir;
        $donasiBanjir->jumlah_anggota_keluarga = $request->jumlah_anggota_keluarga;
        $donasiBanjir->korban_jiwa = $request->korban_jiwa;
        $donasiBanjir->anggota_keluarga_yang_terkena_penyakit = $request->anggota_keluarga_yang_terkena_penyakit;
        $donasiBanjir->status = "Menunggu Konfirmasi Admin";
        $donasiBanjir->save();

        return redirect()->route('petugas.donasi-bantuan-banjir.index')->with('success_message','Berhasil membuat donasi bantuan banjir!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donasi = DonasiBanjir::find($id);

        return view('petugas.donasi.show',[
            'donasi' => $donasi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'nik' => 'required',
            'no_kk' => 'required',
            'no_rekening' => 'required',
            'nama_bank' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'parah_kerusakan_tempat_tinggal' => 'required',
            'tinggi_banjir' => 'required',
            'jumlah_anggota_keluarga' => 'required',
            'korban_jiwa' => 'required',
            'anggota_keluarga_yang_terkena_penyakit' => 'required',
        ]);

        $donasiBanjir = DonasiBanjir::where('id', $id)->first();

        // if ($request->hasFile('image')) {
        //     $name = $request->file('image')->getClientOriginalName();
        //     $path = $request->file('image')->store('public/donasi');
        // }
        // if ($request->hasFile('image')) {
        //     $donasiBanjir->foto = str_replace('public/', '', $path);
        // }

        $donasiBanjir->nama = $request->nama;
        $donasiBanjir->nik = $request->nik;
        $donasiBanjir->no_kk = $request->no_kk;
        $donasiBanjir->no_rekening = $request->no_rekening;
        $donasiBanjir->nama_bank = $request->nama_bank;
        $donasiBanjir->alamat = $request->alamat;
        $donasiBanjir->no_telepon = $request->no_telepon;
        $donasiBanjir->parah_kerusakan_tempat_tinggal = $request->parah_kerusakan_tempat_tinggal;
        $donasiBanjir->tinggi_banjir = $request->tinggi_banjir;
        $donasiBanjir->jumlah_anggota_keluarga = $request->jumlah_anggota_keluarga;
        $donasiBanjir->korban_jiwa = $request->korban_jiwa;
        $donasiBanjir->anggota_keluarga_yang_terkena_penyakit = $request->anggota_keluarga_yang_terkena_penyakit;
        $donasiBanjir->save();

        return redirect()->route('petugas.donasi-bantuan-banjir.show', $donasiBanjir->id)->with('success_message','Berhasil mengubah donasi bantuan banjir!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = DonasiBanjir::find($id);
        $donasi->delete();
        
        return redirect()->route('petugas.donasi-bantuan-banjir.index')->with('success_message','Berhasil menghapus donasi bantuan banjir!');
    }
}