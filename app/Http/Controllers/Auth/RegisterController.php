<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'min:6', 'max:20'],
            'email' => ['required', 'email', 'email', 'max:100', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'gender' => ['required', 'string'],
            'dob' => ['required', 'date'],
            'role' => ['required', 'string'],
            'grade' => ['required'],
            'sekolah' => ['string'],
            'image_selfie' => ['required', 'image'],
            'image_card' => ['required', 'image'],
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



        $file = $data['image_selfie'];
        $path = $file->store('images/user','public');
        $file->move('storage/images/user',  $path);

        $path2 = $data['image_card']->store('images/user','public');
        $data['image_card'] = $path2;

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'gender' => $data['gender'],
            'dob' => $data['dob'],
            'role' => $data['role'],
            'grade' => $data['grade'],
            'sekolah' => $data['sekolah'],
            'image_selfie' => $path,
            'image_card' => $path2,
        ]);



        return $user;
    }


}
