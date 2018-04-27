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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
      // Finding wallets all the users and their wallets.
        $users = User::with('wallets')->get();

        return view('admin.index', compact('users'));
    }


    public function details($id)
    {
      // Find the user with thw passed ID and their wallets
        $user = User::find($id);

        $wallets = User::find($id)->wallets;

        return view('admin.users', compact('user', 'wallets'));
    }

    public function delete($id)
    {
      // Deleting the User with the passed ID
        User::destroy($id);

        return redirect('/admin');
    }
}
