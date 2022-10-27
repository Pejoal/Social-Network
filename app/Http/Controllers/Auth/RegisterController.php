<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
  //
  public function __construct() {
    $this->middleware(['guest']);
        // recheck this 
    // if(Auth::check()) {
    //   return redirect()->route('home');
    // }
  }


  public function index()
  {
    return view("auth.register");
  }

  public function store(Request $request)
  {
    // dd($request->get('email'));
    // dd($request->email); // same as above
    $this->validate($request, [
      'name' => 'required|max:255',
      'username' => 'required|max:255',
      'email' => 'required|email|max:255',
      'password' => 'required|confirmed',
    ]);
    // dd('store');

    try {
      User::create([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email,
        'password' => Hash::make($request->password)
      ]);
    } catch (\Throwable $th) {
      return back()->with('status', 'Email Already Exists');
    }

    // User::create([
    //   'name' => $request->name,
    //   'username' => $request->username,
    //   'email' => $request->email,
    //   'password' => Hash::make($request->password)
    // ]);

    // used to login automatic when register
    auth()->attempt($request->only('email', 'password'));

    // if (!auth()->attempt($request->only('email', 'password'))) {
    //     return back()->with('status', 'Email Already Exists');
    // }

    return redirect()->route('dashboard');
  }
}
