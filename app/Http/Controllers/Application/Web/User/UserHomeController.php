<?php

namespace App\Http\Controllers\Application\Web\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Artikel;
use App\Models\DonasiBantuanBanjir;
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
    
    /**
     * Article page.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function laporBanjir()
    {
        $user = auth()->user();

        // $artikel = Artikel::orderBy('created_at', 'desc')->get();

        return view('user.lapor-banjir', [
            'user' => $user
        ]);
    }
    
    /**
     * Article page.
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