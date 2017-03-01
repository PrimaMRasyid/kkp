<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
    const NEED_TESTING = 1;
    protected $table = 'fishs';

    protected $fillable = [
    	'hs_code',
    	'name',
    	'latin_name',
    	'size',
    	'qty',
    	'unit',
    	'value',
        'fish_type'
    ];

    public function getTypeAttribute()
    {
        switch ($this->fish_type) {
            case 1:
                return 'Need Testing';
                break;
            case 2:
                return 'Prohibited';
                break;
            case 3:
                return 'Not Need Testing';
                break;
            default:
                # code...
                break;
        }
    }
}
