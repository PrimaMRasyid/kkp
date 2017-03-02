<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = '/bank';
	protected $guards = ['userbank'];
	protected $redirectAfterLogout = '/bank';

    public function showLoginForm()
    {
    	return view('bank.login');
    }

    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function getCredentials(Request $request)
    {
        return array_merge(
            $request->only($this->loginUsername(), 'password'),
            ['role' => User::USER_BANK]
        );
    }
}
