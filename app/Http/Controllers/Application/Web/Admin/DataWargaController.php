<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;
use App\Models\DataWarga;

class DataWargaController extends Controller
{

    public function __construct()
    {
        View::share('active_page', 'data_warga');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dataWarga = new DataWarga();

        if(!empty($request->nama)){
            $dataWarga = $dataWarga->where('nama', 'LIKE', '%'.$request->nama.'%');
        }

        $dataWarga = $dataWarga->paginate(20);

        return view('petugas.data-warga.index',[
            'data_warga' => $dataWarga,
            'search_terms' => [
                'nama' => $request->nama,
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
        return view('petugas.data-warga.create');
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
        ]);

        $dataWargaRow = new DataWarga();
        $dataWargaRow->nama = $request->nama;
        $dataWargaRow->nik = $request->nik;
        $dataWargaRow->no_kk = $request->no_kk;
        $dataWargaRow->no_rekening = $request->no_rekening;
        $dataWargaRow->nama_bank = $request->nama_bank;
        $dataWargaRow->alamat = $request->alamat;
        $dataWargaRow->no_telepon = $request->no_telepon;
        $dataWargaRow->save();

        return redirect()->route('petugas.data-warga.index')->with('success_message','Berhasil membuat data warga baru!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dataWarga = DataWarga::find($id);

        return view('petugas.data-warga.show',[
            'dataWarga' => $dataWarga
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
        ]);

        $dataWarga = DataWarga::where('id', $id)->first();
        $dataWarga->nama = $request->nama;
        $dataWarga->nik = $request->nik;
        $dataWarga->no_kk = $request->no_kk;
        $dataWarga->no_rekening = $request->no_rekening;
        $dataWarga->nama_bank = $request->nama_bank;
        $dataWarga->alamat = $request->alamat;
        $dataWarga->no_telepon = $request->no_telepon;
        $dataWarga->save();

        return redirect()->route('petugas.data-warga.show', $dataWarga->id)->with('success_message','Berhasil mengubah data warga!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dataWarga = DataWarga::find($id);
        $dataWarga->delete();
        
        return redirect()->route('petugas.data-warga.index')->with('success_message','Berhasil menghapus data warga!');
    }

    public function import(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|file',
        ]);

        $fileContents = file_get_contents($request->file);
        $fileContents = str_replace('\n', '', $fileContents);
        
        $rows = explode("\n", $fileContents);
        array_shift($rows);

        foreach($rows as $row) {
            $cols = str_getcsv($row, ';');
            try {
                $nama =  $cols[0];
                $nik =  $cols[1];
                $no_kk =  $cols[2];
                $no_rekening =  $cols[3];
                $nama_bank =  $cols[4];
                $alamat =  $cols[5];
                $no_telepon =  $cols[6];
            } catch (\Exception $e) {
                continue;
            }
            $checkDataWarga = DataWarga::where('nik', $nik)->first();

            if (empty($checkDataWarga)) {
                $dataWargaRow = new DataWarga();
                $dataWargaRow->nama = $nama;
                $dataWargaRow->nik = $nik;
                $dataWargaRow->no_kk = $no_kk;
                $dataWargaRow->no_rekening = $no_rekening;
                $dataWargaRow->nama_bank = $nama_bank;
                $dataWargaRow->alamat = $alamat;
                $dataWargaRow->no_telepon = $no_telepon;
                $dataWargaRow->save();
            }
        }

        return redirect()->route('petugas.data-warga.index')->with('success_message','Berhasil meng-import data warga!');
    }

}