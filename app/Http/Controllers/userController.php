<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Wallet;
use Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Storage;

class userController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){

      $image = false;
      $noAdmin = false;
      $currency = "bitcoin";

      if (Auth::user()->avatar) {
         $image = Storage::disk('s3')->get(Auth::user()->avatar);
      }

        $client = new Client(['base_uri' => 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,LTC&tsyms=GBP']);
        $res = $client->request('GET')->getBody();
        $prices = json_decode($res, true);
        $prices = $prices['DISPLAY'];
        // dd($prices);


        return view('home', compact('noAdmin', 'currency', 'prices' ,'image'));
    }

    public function home($currency){

      $image = false;
      $noAdmin = false;

      if (Auth::user()->avatar) {
         $image = Storage::disk('s3')->get(Auth::user()->avatar);
      }

      // This is returned if the user is not an admin
        $client = new Client(['base_uri' => 'https://min-api.cryptocompare.com/data/pricemultifull?fsyms=BTC,ETH,LTC&tsyms=GBP']);
        $res = $client->request('GET')->getBody();
        $prices = json_decode($res, true);
        $prices = $prices['DISPLAY'];
        // dd($prices['BTC']['GBP']['PRICE']);

        return view('home', compact('noAdmin', 'currency', 'prices', 'image'));
    }

    public function wallets()
    {
      // Finding wallets only for the logged in user.
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }
        // Getting current price of the currency
        $client = new Client(['base_uri' => 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=BTC,ETH,LTC&tsyms=GBP']);
        $res = $client->request('GET')->getBody();
        $prices = json_decode($res, true);

        return view('user.index', compact('wallets', 'prices'));
    }

    public function createWallet()
    {
      // Finding wallets only for the logged in user
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.createWallet', compact('wallets'));
    }

    public function store(Request $request)
    {
      // Storing the new wallet to the db
        Wallet::create($request->all());

        return redirect('/wallet');
    }

    public function editWallet()
    {
      // Finding wallets only for the logged in user
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.editWallet', compact('wallets'));
    }

    public function deleteWallet()
    {
      // Finding wallets only for the logged in user
        $wallets = User::find(Auth::user()->id)->wallets;
        if ($wallets->count() == 0) {
            $wallets = false;
        }

        return view('user.deleteWallet', compact('wallets'));
    }

    public function update(Request $request, $id)
    {
      // Finding the wallet with the ID passed and updating it with the new data
        Wallet::find($id)->update($request->all());

        return redirect('/wallet');
    }

    public function delete($id)
    {
      // Destroying the wallet witht the ID passed
        Wallet::destroy($id);

        return redirect('/wallet');
    }
}
