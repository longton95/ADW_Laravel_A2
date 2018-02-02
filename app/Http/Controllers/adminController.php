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

      $user = User::find($id);

      $wallets = User::find($id)->wallets;

        return view('admin.users', compact('user','wallets'));
    }

    public function delete($id) {

      User::destroy($id);

      return redirect('/admin');

    }
}
