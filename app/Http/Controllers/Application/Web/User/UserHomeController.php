<?php

namespace App\Http\Controllers\Application\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Artikel;
use App\Models\DonasiBantuanBanjir;
use App\Models\DonasiBantuanBanjirUser;
use App\Models\LaporanBanjir;
use View;

class UserHomeController extends Controller
{

    /**
     * Dashboard user.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $user = auth()->user();
        return view('user.home', [
            // 'user' => $user
        ]);
    }

    public function laporBanjir()
    {
        $user = auth()->user();

        // $artikel = Artikel::orderBy('created_at', 'desc')->get();

        return view('user.lapor-banjir', [
            'user' => $user
        ]);
    }
    
    /**
     * Store lapor banjir.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeLaporanBanjir(Request $request)
    {
        $user = auth()->user();

        $this->validate($request, [
            'tanggal_bencana' => 'required',
            'waktu_bencana' => 'required',
            'alamat_bencana' => 'required',
            'jml_rumah_terkena_banjir' => 'required',
            'jml_korban_luka_berat' => 'required',
            'jml_korban_luka_ringan' => 'required'
        ]);

        $laporanBanjir = new LaporanBanjir();
        $laporanBanjir->user_id = auth()->user()->id;
        $laporanBanjir->tanggal_bencana = $request->tanggal_bencana;
        $laporanBanjir->waktu_bencana = $request->waktu_bencana;
        $laporanBanjir->alamat_bencana = $request->alamat_bencana;
        $laporanBanjir->jumlah_rumah_terkena_banjir = $request->jml_rumah_terkena_banjir;
        $laporanBanjir->jumlah_korban_luka_berat = $request->jml_korban_luka_berat;
        $laporanBanjir->jumlah_korban_luka_ringan = $request->jml_korban_luka_ringan;
        $laporanBanjir->status = 'Menunggu Konfirmasi';
        $laporanBanjir->save();

        return redirect()->route('user.lapor-banjir')->with('success_message','Terima kasih anda telah melaporkan bencana banjir! Tim kami akan melakukan pengecekan untuk laporan tersebut');
    }
    
    /**
     * Donasi Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function donasi()
    {
        $user = auth()->user();

        $donasiRows = DonasiBantuanBanjir::orderBy('created_at', 'desc')->get();

        return view('user.donasi', [
            'user' => $user,
            'donasi_rows' => $donasiRows
        ]);
    }
    
    /**
     * Donasi Detail Page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function donasiDetail($id)
    {
        $user = auth()->user();

        $donasi = DonasiBantuanBanjir::find($id);

        $paraDonatur = DonasiBantuanBanjirUser::where('donasi_id', $id)->orderBy('created_at', 'desc')->get();

        foreach($paraDonatur as $donatur) {
            $donatur->user = User::where('id', $donatur->user_id)->first();
        }

        $jumlahDonatur = DonasiBantuanBanjirUser::where('donasi_id', $id)->count();

        return view('user.donasi-detail', [
            'user' => $user,
            'donasi' => $donasi,
            'para_donatur' => $paraDonatur,
            'jumlah_donatur' => $jumlahDonatur
        ]);
    }

    /**
     * Store Donasi.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function storeDonasi(Request $request, $id)
    {
        $user = auth()->user();
        
        $this->validate($request, [
            'jumlah_donasi' => 'required',
        ]);

        $donasi = new DonasiBantuanBanjirUser();
        $donasi->user_id = auth()->user()->id;
        $donasi->donasi_id = $id;
        $donasi->jumlah = $request->jumlah_donasi;
        $donasi->save();

        return redirect()->route('user.donasi-detail', $donasi->id)->with('success_message','Terima kasih telah membantu sodara kita yang sedang terkena bencana banjir!');
    }

    /**
     * Article page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function article()
    {
        $user = auth()->user();

        $artikel = Artikel::orderBy('created_at', 'desc')->get();

        return view('user.article', [
            'user' => $user,
            'articles' => $artikel
        ]);
    }
}