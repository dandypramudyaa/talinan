<?php

namespace App\Http\Controllers\Application\Web\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $category = Product::with('categories')->get();

        dd($category);

        // return view('admin.users.index',[
        //     'users' => $users,
        //     'search_terms' => [
        //         'username' => $request->username,
        //         'first_name' => $request->first_name,
        //         'last_name' => $request->last_name,
        //     ]
        // ]);
    }
}