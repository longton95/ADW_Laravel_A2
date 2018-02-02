<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Auth;

class userController extends Controller
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

      $noAdmin = false;

        return view('home',compact('noAdmin'));
    }

    public function wallets() {
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.index', compact('wallets'));
    }

    public function createWallet() {
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.createWallet', compact('wallets'));
    }

    public function store(Request $request) {

      Wallet::create($request->all());

      return redirect('/wallet');
    }

    public function editWallet(){

        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.editWallet', compact('wallets'));
    }

    public function update(Request $request, $id) {
        Wallet::find($id)->update($request->all());

        return redirect('/wallet');
    }
}
