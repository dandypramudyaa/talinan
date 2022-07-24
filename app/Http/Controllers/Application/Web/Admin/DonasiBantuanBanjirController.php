<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\DonasiBanjir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;
use PDF;

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
        $donasiBanjir = DonasiBanjir::orderBy('nilai_akhir', 'desc');
        
        if(!empty($request->nama)){
            $donasiBanjir = $donasiBanjir->where('nama', 'LIKE', '%'.$request->nama.'%');
        }
        
        if(!empty($request->alamat)){
            $donasiBanjir = $donasiBanjir->where('alamat', 'LIKE', '%'.$request->alamat.'%');
        }

        $donasiBanjir = $donasiBanjir->paginate(20);

        return view('admin.donasi-bantuan-banjir.index',[
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

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/donasi');

        $donasiBanjir = new DonasiBanjir();
        $donasiBanjir->user_id = auth()->user()->id;
        $donasiBanjir->nama = $request->nama;
        $donasiBanjir->tanggal_lahir = $request->tanggal_lahir;
        $donasiBanjir->nomor_nik = $request->nik;
        $donasiBanjir->alamat = $request->alamat;
        $donasiBanjir->foto = str_replace('public/', '', $path);
        $donasiBanjir->jumlah_anggota_keluarga = $request->jumlah_art;
        $donasiBanjir->kerusakan_rumah = $request->kerusakan_rumah;
        $donasiBanjir->penghasilan = $request->penghasilan;
        $donasiBanjir->anggota_keluarga_yang_terkena_penyakit = $request->anggota_keluarga_terkena_penyakit;
        $donasiBanjir->save();

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
        $donasi = DonasiBanjir::find($id);
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
            'jumlah_donasi' => 'required',
        ]);

        $donasiBanjir = DonasiBanjir::where('id', $id)->first();
        $donasiBanjir->jumlah_yang_diberikan_admin = $request->jumlah_donasi;
        $donasiBanjir->status = 'Jumlah Donasi Telah di Tentukan';
        $donasiBanjir->save();

        return redirect()->route('admins.donasi-bantuan-banjir.show', $donasiBanjir->id)->with('success_message','Berhasil mengubah donasi bantuan banjir!');
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
        
        return redirect()->route('admins.donasi-bantuan-banjir.index')->with('success_message','Berhasil menghapus donasi bantuan banjir!');
    }

    public function cetakPdf($id)
    {
        $donasi = DonasiBanjir::find($id);
        
        $pdf = PDF::loadview('pdf.donasi-bantuan-pdf', ['donasi'=>$donasi]);
        return $pdf->stream();
    }
}