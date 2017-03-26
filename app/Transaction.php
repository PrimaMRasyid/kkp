<?php

namespace App;

use App\Fish;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;
use Milon\Barcode\DNS1D;

class Transaction extends Model
{
    const UNTESTED = 2;
    const DONE_TESTED = 1;
    const UNPAID = 2;
    const PAID = 1;
    const UNSCAN = 0;
    const SCANNED = 1;

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
                $trx->status_pembayaran = self::UNPAID;
                $trx->status_test = self::UNTESTED;

                $saved = $trx->save();
                if ($saved) {
                    Mail::send('emails.need_paid', [], function ($message) use ($user) {

                        $message->from('boboiboi055@gmail.com', 'Need Paid Notification');

                        $message->to($user->email)->subject('Need Paid Notification');

                    });
                }
            } else {
                $generate = new DNS1D;
                $barcode = $generate->getBarcodeHTML($trx->id, "C39");

                Mail::send('emails.not_need_paid', ['barcode' => $barcode], function ($message) use ($user) {

                    $message->from('boboiboi055@gmail.com', 'Not Need Paid');

                    $message->to($user->email)->subject('Not Need Paid');

                });
            }
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

    public function fishNeedTesting()
    {
        return $this->join('fishs', 'nama_umum', '=', 'fishs.name')
            ->where('fishs.fish_type','=', Fish::NEED_TESTING);
    }

    public function setScan()
    {
        $this->status_scan = self::SCANNED;

        $this->save();
    }

    public function getScanAttribute()
    {
        return $this->status_scan ? 'Sudah Scan' : 'Belum Scan';
    }

    public function getTestingAttribute()
    {
        switch ($this->status_test) {
            case self::UNTESTED :
                return 'Belum di test';
                break;
            case self::DONE_TESTED :
                return 'Sudah di test';
                break;
            
            default:
                return 'Tdk perlu test';
                break;
        }
    }

    public function getPaidAttribute()
    {
        switch ($this->status_pembayaran) {
            case self::UNPAID :
                return 'Belum di bayar';
                break;
            case self::PAID :
                return 'Sudah di bayar';
                break;
            
            default:
                return 'Tdk perlu bayar';
                break;
        }
    }

    public function getBarcodeAttribute()
    {
        $generate = new DNS1D;
        $barcode = $generate->getBarcodeHTML($this->id, "C39");

        return $barcode;
    }
}
