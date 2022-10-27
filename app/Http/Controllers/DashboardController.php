<?php

namespace App\Http\Controllers;



class DashboardController extends Controller
{
  // same as Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth'); [in wep.php]
  // public function __construct()
  // {
  //   $this->middleware(['auth']);
  // }
  public function index()
  {
    return view("dashboard");
  }
}
