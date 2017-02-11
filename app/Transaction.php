<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
    	'keterangan'
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
            if ($trx->fish()->first()) {
                $trx->status_pembayaran = false;

                $trx->save();
            }
        });
    }

    public function fish()
    {
        return $this->hasOne('App\Fish', 'name', 'nama_umum');
    }
}
