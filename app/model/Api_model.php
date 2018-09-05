<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Leave;

class Api_model extends Model
{
    //
    public function leave_insert($data){
        $new_leave = new Leave();
        $new_leave->emp_id = $data['emp_id'];
    	$new_leave->from = date('Y-m-d', strtotime($data['from']));
    	$new_leave->to = date('Y-m-d', strtotime($data['to']));
    	$new_leave->type = $data['leave_type'];
    	$new_leave->reason = $data['reason'];
        $new_leave->save();
    }
}
