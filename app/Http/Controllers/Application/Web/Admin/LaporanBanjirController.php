<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\LaporanBanjir;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;

class LaporanBanjirController extends Controller
{

    public function __construct()
    {
        View::share('active_page', 'laporan_banjir');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $laporanBanjir = new LaporanBanjir();

        if(!empty($request->first_name)){
            $laporanBanjir = $laporanBanjir->where('alamat_bencana', 'LIKE', '%'.$request->alamat.'%');
        }

        $laporanBanjir = $laporanBanjir->paginate(20);

        return view('admin.laporan-banjir.index',[
            'laporan_banjir' => $laporanBanjir,
            'search_terms' => [
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
        abort(404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = LaporanBanjir::find($id);

        return view('admin.laporan-banjir.show',[
            'laporan' => $laporan
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
            'title' => 'required',
            'description' => 'required',
        ]);

        $artikel = Artikel::find($id);
        $artikel->title = $request->title;
        $artikel->description = $request->description;
        $artikel->save();

        return redirect()->route('admins.artikel.show', $artikel->id)->with('success_message','Berhasil mengubah artikel!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        $artikel->delete();
        
        return redirect()->route('admins.artikel.index')->with('success_message','Berhasil menghapus artikel!');
    }
}