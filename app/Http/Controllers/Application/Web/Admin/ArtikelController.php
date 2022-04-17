<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use View;

class ArtikelController extends Controller
{

    public function __construct()
    {
        View::share('active_page', 'artikel');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = new Artikel();

        if(!empty($request->title)){
            $articles = $articles->where('title', 'LIKE', '%'.$request->title.'%');
        }

        $articles = $articles->paginate(20);

        return view('admin.artikel.index',[
            'articles' => $articles,
            'search_terms' => [
                'title' => $request->title,
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
        return view('admin.artikel.create');
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
            'title' => 'required',
            'description' => 'required'
        ]);

        $artikel = new Artikel();
        $artikel->title = $request->title;
        $artikel->description = $request->description;
        $artikel->save();

        return redirect()->route('admins.artikel.index')->with('success_message','Berhasil membuat artikel!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);

        return view('admin.artikel.show',[
            'artikel' => $artikel
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