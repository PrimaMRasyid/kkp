<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    const USER_LAB = 1;
    const USER_BANK = 2;
    const USER_PABEAN = 3;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'alamat', 'no_id', 'no_npwp', 'no_skib', 'tgl_skib', 'no_surveilance', 'tgl_surveilance', 'role'
    ];

    protected $cast = [
        'is_admin' => 'boolean',
        'is_approved' => 'boolean',
        'role' => 'boolean'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin;
    }

    public function isUserlab()
    {
        return $this->role == self::USER_LAB;
    }

    public function isUserbank()
    {
        return $this->role == self::USER_BANK;
    }

    public function isUserpabean()
    {
        return $this->role == self::USER_PABEAN;
    }

    public function isApproved()
    {
        return $this->is_approved ? 'Yes' : 'No';
    }

    public function approve()
    {
        $this->is_approved = true;

        $this->save();
    }
}
