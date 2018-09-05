<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use Auth;
use Session;

class LeavesController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function submitLeave(Request $request, $id)
    {
    	$new_leave = new Leave();
        $new_leave->emp_id = Auth::user()->id;
    	$new_leave->from = date('Y-m-d', strtotime($request->from));
    	$new_leave->to = date('Y-m-d', strtotime($request->to));
    	$new_leave->type = $request->leave;
    	$new_leave->reason = $request->reason;
        $new_leave->save();

        Session::flash('message','Leave request submitted successfully!');

        return back();
    }

    public function showLeaves()
    {
        $current_user = Auth::user();
        $leaves = Leave::latest()->get();
        $employees = User::paginate(5);
        $my_leaves = $current_user->leaves;
        
        return view('/home',compact('current_user', 'leaves', 'employees','my_leaves'));
    }

    public function approveLeave($id)
    {
        $app_leave = Leave::find($id);
        $app_leave->status = 'approved';
        $app_leave->save();

        Session::flash('message','Leave successfully approved');

        return back();
    }

    public function denyLeave($id)
    {
        $den_leave = Leave::find($id);
        $den_leave->status = 'denied';
        $den_leave->save();

        Session::flash('message','Leave successfully denied');

        return back();
    }

    public function cancelLeave($id)
    {
        $cancel_leave = Leave::find($id);
        $cancel_leave->status = 'cancelled';
        $cancel_leave->save();

        Session::flash('message','Leave successfully cancelled');

        return back();
    }

}
