<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
	protected $table = 'leave_requests';

    public function employee(){
    	return $this->belongsTo('App\User', 'emp_id');
    }
}
