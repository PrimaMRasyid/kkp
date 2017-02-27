<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fish extends Model
{
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
}
