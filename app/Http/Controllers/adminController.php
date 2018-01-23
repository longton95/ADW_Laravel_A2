<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class adminController extends Controller
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

    public function index() {
      $users = User::all();

        return view('admin.index', compact('users'));
    }


    public function details(User $user) {


        return view('admin.users', compact('user'));
    }

    // public function details($id) {
    //   $user = User::find($id);
    //
    //   return $user;
    //
    //     return view('admin.users', compact('user'));
    // }
}
