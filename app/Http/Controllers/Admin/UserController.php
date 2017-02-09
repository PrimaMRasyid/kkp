<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
    	$users = User::where('is_admin','=',false)->get();

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

        return redirect('/admin/user');
    }
}
