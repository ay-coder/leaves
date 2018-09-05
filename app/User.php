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
        'badge','emp_name', 'email', 'password','leave_bal','role','emp_status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function leaves(){
        return $this->hasMany('App\Leave','emp_id');
    }

    function showUsers(){
        return $this->hasMany('App\LeaveRequest');
    }
}