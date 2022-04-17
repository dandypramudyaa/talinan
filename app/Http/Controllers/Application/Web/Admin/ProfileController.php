<?php

namespace App\Http\Controllers\Application\Web\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('admin.profile.index', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ],
        [
            'first_name.required' => 'Field :attribute harus diisi!',
            'last_name.required' => 'Field :attribute harus diisi lah bos!',
        ]);

        $userId = auth()->user()->id;

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/profile');

        $user = User::find($userId);
        $user->first_name       = $request->first_name;
        $user->last_name        = $request->last_name;
        $user->profile_pic_name = str_replace('public/', '', $path);
        $user->address          = $request->address;
        $user->gender           = $request->gender;
        $user->save();

        return redirect()->route('admins.profile')->with('success_message','Succesfully Update Profile!');
    }
}
