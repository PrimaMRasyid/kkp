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
}
