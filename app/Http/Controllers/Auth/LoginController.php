<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;
    protected $guards = ['auth'];
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Handle an authentication attempt.
     *
     * @return Response
     */
    public function authenticated()
    {
        $user = auth()->user();

        if ( ! $user->is_approved ) {
            auth()->logout();
            return view('need_approval');
        }

        if ( $user->isUserlab() ) {
            $this->guards = array_merge($this->guards, [
                'userlab'
            ]);
        }
    }

}
