<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = '/admin';
	protected $guards = ['admin'];
	protected $redirectAfterLogout = '/admin';

    public function showLoginForm()
    {
    	return view('admin.auth.login');
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
            ['is_admin' => true]
        );
    }
}
