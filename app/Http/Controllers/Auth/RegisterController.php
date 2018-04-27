<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
Use Mail;
use App\Mail\Welcome;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;
use Hash;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
      if (isset($data['image'])) {

         $image = $data['image'];
         $imageFileName = time() . '.' . $image->getClientOriginalExtension();
         $s3 = \Storage::disk('s3');
         $filePath = '/profileImages/' . $imageFileName;
         $s3->put($filePath, file_get_contents($image), 'public');

         $user = User::create([
               'firstName' => $data['firstName'],
               'lastName' => $data['lastName'],
               'email' => $data['email'],
               'role' => "user",
               'password' => Hash::make($data['password']),
               'avatar' => $filePath,
           ]);
      } else {

         $user = User::create([
               'firstName' => $data['firstName'],
               'lastName' => $data['lastName'],
               'email' => $data['email'],
               'role' => "user",
               'password' => Hash::make($data['password']),
           ]);
      }

        Mail::to($data['email'])->send(new Welcome($user));
        return $user;
    }
}
