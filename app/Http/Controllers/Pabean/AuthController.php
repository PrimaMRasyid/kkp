<?php

namespace App\Http\Controllers\Pabean;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AuthController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = '/pabean';
	protected $guards = ['userpabean'];
	protected $redirectAfterLogout = '/pabean';

    public function showLoginForm()
    {
    	return view('pabean.login');
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
            ['role' => User::USER_PABEAN]
        );
    }
}
