<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if ( auth()->user()->isUserlab() ) {
            return redirect('/lab/home');
        } else if ( auth()->user()->isAdmin() ) {
            return redirect('/admin');
        }
        $formData = Transaction::all();
        
        return view('dashboard_user', compact('formData'));
    }

    public function add()
    {
        $user = auth()->user();
        return view('add_form', compact('user'));
    }

    public function store(Request $request)
    {
        $trx = new Transaction;
        $trx->create($request->except('_token'));

        return redirect('home');
    }

    public function approval()
    {
        return view('need_approval');
    }
}
