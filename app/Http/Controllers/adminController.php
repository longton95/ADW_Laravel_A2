<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Auth;


class adminController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct() {

        $this->middleware('auth');
    }

    public function index() {

        $users = User::with('wallets')->get();

        return view('admin.index', compact('users'));
    }


    public function details($id) {

      $orders = User::search('Star Trek')->raw();

      dd($orders);

        $user = User::with('wallets')->find($id);

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
