<?php

namespace App;

use App\Fish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Transaction extends Model
{
    protected $fillable = [
    	'sender',
    	'sender_address',
    	'jenis_komoditas',
    	'peruntukan',
    	'receiver',
    	'receiver_address',
    	'nama_umum',
    	'ukuran',
    	'qty',
    	'satuan',
    	'keterangan',
        'sender_id'
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function($trx){
            $user = $trx->user;
            if ($trx->fish()->where('fish_type','=',Fish::NEED_TESTING)->first()) {
                $trx->status_pembayaran = false;

                $saved = $trx->save();
                if ($saved) {
                    Mail::send('emails.need_paid', [], function ($message) use ($user) {

                        $message->from('boboiboi055@gmail.com', 'Need Paid Notification');

                        $message->to($user->email)->subject('Need Paid Notification');

                    });
                }
            }
            Mail::send('emails.not_need_paid', [], function ($message) use ($user) {

                $message->from('boboiboi055@gmail.com', 'Not Need Paid');

                $message->to($user->email)->subject('Not Need Paid');

            });
        });
    }

    public function fish()
    {
        return $this->hasOne('App\Fish', 'name', 'nama_umum');
    }

    public function user()
    {
        return $this->hasOne('App\User', 'id', 'sender_id');
    }
}
