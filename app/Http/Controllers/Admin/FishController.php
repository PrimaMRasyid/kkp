<?php

namespace App\Http\Controllers\Admin;

use App\Fish;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FishController extends Controller
{
    public function index()
    {
    	$fishs = Fish::all();
    	return view('admin.fish.index', compact('fishs'));
    }

    public function add()
    {
    	return view('admin.fish.add');
    }

    public function store(Request $request)
    {
    	$fish = new Fish;
    	$fish->create($request->except('_token'));

    	return redirect('admin/fish');
    }

    public function show($id)
    {
    	$fish = Fish::findOrFail($id);

    	return view('admin.fish.show', compact('fish'));
    }
}
