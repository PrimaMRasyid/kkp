<?php

namespace App\Http\Controllers\Pabean;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Milon\Barcode\DNS1D;

class HomeController extends Controller
{
    public function index()
    {
    	$transactions = Transaction::where('status_test','=',Transaction::DONE_TESTED)
            ->orWhere('status_test','=',0)
            ->orderBy('status_pembayaran', 'ASC')
            ->get();

    	return view('dashboard_pabean', compact('transactions'));
    }

    public function detail($id)
    {
    	$form = Transaction::findOrFail($id);
        $generate = new DNS1D;
        $barcode = $generate->getBarcodeHTML($form->id, "C39");
        $form->setScan();
        return view('form_pabean', compact('form', 'barcode'));
    }

    public function cari(Request $request)
    {
        return redirect()->route('pabean.detail', ['id' => $request->get('id_transaksi')]);
    }

    public function setPaid($id)
    {
    	$form = Transaction::findOrFail($id);
    	$form->status_pembayaran = true;
    	$form->save();

    	return redirect('home');
    }
}
