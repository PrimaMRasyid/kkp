<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS1D;

class HomeController extends Controller
{
    public function index()
    {
    	$transactions = Transaction::where('status_pembayaran','=',Transaction::UNPAID)
            ->orderBy('status_pembayaran', 'DESC')
            ->get();

    	return view('dashboard_bank', compact('transactions'));
    }

    public function detail($id)
    {
    	$form = Transaction::findOrFail($id);
        $generate = new DNS1D;
        $barcode = $generate->getBarcodeHTML($form->id, "C39");
        return view('form_bank', compact('form', 'barcode'));
    }

    public function setPaid($id)
    {
    	$form = Transaction::findOrFail($id);
        $user = $form->user;
    	$form->status_pembayaran = Transaction::PAID;
    	$paid = $form->save();

        if ( $paid ) {
            Mail::send('emails.done_paid', [], function ($message) use ($user) {

                $message->from('boboiboi055@gmail.com', 'Tagihan sudah dibayar. Terima Kasih');

                $message->to($user->email)->subject('Tagihan sudah dibayar. Terima Kasih');

            });
        }

    	return redirect()->route('bank.home');
    }
}
