<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'alamat' => 'required',
            'no_id' => 'required',
            'no_npwp' => 'required',
            'no_skib' => 'required',
            'tgl_skib' => 'required',
            'no_surveilance' => 'required',
            'tgl_surveilance' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $role = explode('lab/', $data['role']);
        
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'alamat' => $data['alamat'],
            'no_id' => $data['no_id'],
            'no_npwp' => $data['no_npwp'],
            'no_skib' => $data['no_skib'],
            'tgl_skib' => $data['tgl_skib'],
            'no_surveilance' => $data['no_surveilance'],
            'tgl_surveilance' => $data['tgl_surveilance'],
            'role' => count($role) == 2
        ]);
    }

    /**
     * Where to redirect users after registration.
     *
     */
    protected function redirectTo()
    {
        auth()->logout();
        return route('need_approval');
    }
}
