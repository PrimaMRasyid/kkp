<?php

namespace App\Http\Controllers\Lab;

use App\Http\Controllers\Controller;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS1D;

class HomeController extends Controller
{
    public function index()
    {
        $transactions = Transaction::where('status_pembayaran','=',Transaction::PAID)
            ->where('status_test','=',Transaction::UNTESTED)
            ->orderBy('status_pembayaran', 'DESC')->get();

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
    	$form->status_pembayaran = Transaction::PAID;
    	$form->save();

    	return redirect()->route('lab.home');
    }

    public function setDoneTest($id)
    {
        $form = Transaction::findOrFail($id);
        $user = $form->user;
        $form->status_test = Transaction::DONE_TESTED;
        $generate = new DNS1D;
        $barcode = $generate->getBarcodeHTML($form->id, "C39");
        $test = $form->save();

        if ( $test ) {
            Mail::send('emails.done_testing', ['barcode' => $barcode], function ($message) use ($user) {

                $message->from('boboiboi055@gmail.com', 'Permintaan anda telah selesai diproses');

                $message->to($user->email)->subject('Permintaan anda telah selesai diproses');

            });
        }

        return redirect()->route('lab.home');
    }
}
