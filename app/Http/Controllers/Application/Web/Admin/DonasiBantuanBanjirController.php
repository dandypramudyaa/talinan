<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\DonasiBantuanBanjir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;

class DonasiBantuanBanjirController extends Controller
{

    public function __construct()
    {
        View::share('active_page', 'bantuan_donasi');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $donasiBantuanBanjir = new DonasiBantuanBanjir();

        if(!empty($request->nama)){
            $donasiBantuanBanjir = $donasiBantuanBanjir->where('nama', 'LIKE', '%'.$request->nama.'%');
        }

        if(!empty($request->alamat)){
            $donasiBantuanBanjir = $donasiBantuanBanjir->where('alamat', 'LIKE', '%'.$request->alamat.'%');
        }

        $donasiBantuanBanjir = $donasiBantuanBanjir->paginate(20);

        return view('admin.donasi-bantuan-banjir.index',[
            'donasi_bantuan_banjir' => $donasiBantuanBanjir,
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
        return view('admin.donasi-bantuan-banjir.create');
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
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'jumlah_art' => 'required',
            'kerusakan_rumah' => 'required',
            'penghasilan' => 'required',
            'anggota_keluarga_terkena_penyakit' => 'required',
        ]);

        $donasiBantuanBanjir = new DonasiBantuanBanjir();
        $donasiBantuanBanjir->user_id = auth()->user()->id;
        $donasiBantuanBanjir->nama = $request->nama;
        $donasiBantuanBanjir->tanggal_lahir = $request->tanggal_lahir;
        $donasiBantuanBanjir->nomor_nik = $request->nik;
        $donasiBantuanBanjir->alamat = $request->alamat;
        $donasiBantuanBanjir->jumlah_anggota_keluarga = $request->jumlah_art;
        $donasiBantuanBanjir->kerusakan_rumah = $request->kerusakan_rumah;
        $donasiBantuanBanjir->penghasilan = $request->penghasilan;
        $donasiBantuanBanjir->anggota_keluarga_yang_terkena_penyakit = $request->anggota_keluarga_terkena_penyakit;
        $donasiBantuanBanjir->save();

        return redirect()->route('admins.donasi-bantuan-banjir.index')->with('success_message','Berhasil membuat donasi bantuan banjir!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donasi = DonasiBantuanBanjir::find($id);

        return view('admin.donasi-bantuan-banjir.show',[
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
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'alamat' => 'required',
            'jumlah_art' => 'required',
            'kerusakan_rumah' => 'required',
            'penghasilan' => 'required',
            'anggota_keluarga_terkena_penyakit' => 'required',
        ]);

        $donasiBantuanBanjir = new DonasiBantuanBanjir();
        $donasiBantuanBanjir->user_id = auth()->user()->id;
        $donasiBantuanBanjir->nama = $request->nama;
        $donasiBantuanBanjir->tanggal_lahir = $request->tanggal_lahir;
        $donasiBantuanBanjir->nomor_nik = $request->nik;
        $donasiBantuanBanjir->alamat = $request->alamat;
        $donasiBantuanBanjir->jumlah_anggota_keluarga = $request->jumlah_art;
        $donasiBantuanBanjir->kerusakan_rumah = $request->kerusakan_rumah;
        $donasiBantuanBanjir->penghasilan = $request->penghasilan;
        $donasiBantuanBanjir->anggota_keluarga_yang_terkena_penyakit = $request->anggota_keluarga_terkena_penyakit;
        $donasiBantuanBanjir->save();

        return redirect()->route('admins.donasi-bantuan-banjir.show', $donasiBantuanBanjir->id)->with('success_message','Berhasil mengubah donasi bantuan banjir!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donasi = DonasiBantuanBanjir::find($id);
        $donasi->delete();
        
        return redirect()->route('admins.donasi-bantuan-banjir.index')->with('success_message','Berhasil menghapus donasi bantuan banjir!');
    }
}