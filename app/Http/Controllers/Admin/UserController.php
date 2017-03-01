<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::where('is_admin','=',false)->where('role','=',0)->get();

    	return view('admin.user.index', compact('users'));
    }

    public function show($id)
    {
    	$user = User::findOrFail($id);

    	return view('admin.user.show', compact('user'));
    }

    public function approve(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->approve();
        if ( $user )
        {
            Mail::send('emails.welcome', [], function ($message) use ($user) {

                $message->from('boboiboi055@gmail.com', 'Activated Account');

                $message->to($user->email)->subject('Congratulations!. Your Account Has Been Activated');

            });
        }

        return redirect('/admin/user');
    }
}
