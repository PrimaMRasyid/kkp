<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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
        return $this->role;
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
