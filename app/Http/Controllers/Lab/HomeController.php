<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class HomeController extends Controller
{
    public function index()
    {
    	$transactions = Transaction::orderBy('status_pembayaran', 'ASC')->get();

    	return view('dashboard_lab', compact('transactions'));
    }

    public function detail($id)
    {
    	$form = Transaction::findOrFail($id);
        $generate = new DNS1D;
        $barcode = $generate->getBarcodeHTML($form->id, "C39");
        return view('form_lab', compact('form', 'barcode'));
    }

    public function setPaid($id)
    {
    	$form = Transaction::findOrFail($id);
    	$form->status_pembayaran = true;
    	$form->save();

    	return redirect('home');
    }

    public function setDoneTest($id)
    {
        $form = Transaction::findOrFail($id);
        $form->status_test = true;
        $form->save();

        return redirect('home');
    }
}
