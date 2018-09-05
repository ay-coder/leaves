<?php

namespace App\Http\Controllers\rest;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\model\Api_model;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Leave;
use App\User;
use Illuminate\Support\Facades\DB;
class Api extends Controller {

    public function __construct() {
        $this->api = new Api_model();
    }

    public function login(Request $r){
        $validator = Validator::make($r->all(), [
                    'email' => 'required',
                    'user_password' => 'required',
        ]);
        if ($validator->fails()) {
            $res['code'] = 0;
            $res['status'] = 'failed';
            $res['message'] = 'required parameter';
        } else {
            $data['email'] = $r->input('email');
            $data['password'] = $r->input('user_password');

            //attempt login 
            if (Auth::attempt($data)) {
                $res['code'] = 1;
                $res['status'] = 'success';
                $res['message'] = 'login success';
                $res['data'] = Auth::user();
            } else {
                $res['code'] = 0;
                $res['status'] = 'failed';
                $res['message'] = 'invalid credentials';
            }
        }
        echo json_encode($res);
    }
    public function get_user(Request $r){
        $validator = Validator::make($r->all(), [
                    'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $res['code'] = 0;
            $res['status'] = 'failed';
            $res['message'] = 'required paramter';
        } else {
           $users = DB::table('users')->whereid($r->user_id)->first();
        if($users){        
            $users->profile_picture = "";
            $users->reporting_to = "";
            $res['code'] =1 ;
            $res['status'] = 'success';
            $res['message'] = 'profile loaded';
            $res['data'] = $users;
            $res['note'] = 'reporting to manager name & profile picture comming soon';            
        }else{
               $res['code'] = 0;
               $res['status'] = 'failed';
               $res['message'] = 'invalid user';
        }
        
        }
        echo json_encode($res);
    }
    public function dashboard(Request $r){
        $validator = Validator::make($r->all(), [
                    'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $res['code'] = 0;
            $res['status'] = 'failed';
            $res['message'] = 'required paramter';
        } else {
           $users = DB::table('users')->whereid($r->user_id)->first();
           if($users){
                $my_leaves = DB::table('leave_requests')->whereemp_id($r->user_id)->orderByDesc('id')->limit(2)->get();
                
                $res['code'] = 1;
                $res['status']  = 'success';
                $res['message'] = 'recent leaves';
                $res['available_bal'] = $users->leave_bal;
                $res['data'] = $my_leaves;
           }else{
               $res['code'] = 0;
               $res['status'] = 'failed';
               $res['message'] = 'invalid user';
           
           }
        }
        echo json_encode($res);
    }
    
    public function submitLeave(Request $request) {
        $validator = Validator::make($request->all(), [
                    'user_id' => 'required',
                    'from' => 'required',
                    'to' => 'required',
                    'leave_type' => 'required',
                    'reason' => 'required',
        ]);
        if ($validator->fails()) {
            $res['code'] = 0;
            $res['status'] = 'failed';
            $res['message'] = 'required paramter';
        } else {
            $data['emp_id'] = $request->user_id;
            $data['from'] = $request->from;
            $data['to'] = $request->to;
            $data['leave_type'] = $request->leave_type;
            $data['reason'] = $request->reason;
            $this->api->leave_insert($data);
            $res['code'] = 1;
            $res['status'] = 'success';
            $res['message'] = 'leave submitted';
        }
        echo json_encode($res);
    }

    public function leave_history(Request $r){
        $validator = Validator::make($r->all(), [
                    'user_id' => 'required',
        ]);
        if ($validator->fails()) {
            $res['code'] = 0;
            $res['status'] = 'failed';
            $res['message'] = 'required paramter';
        } else {
           $users = DB::table('users')->whereid($r->user_id)->first();
        if($users){
            if($r->input('fillter') != ''){
                $data = DB::table('leave_requests')->where('status', 'LIKE','%'.$r->input('fillter').'%')->whereemp_id($r->user_id)->orderByDesc('id')->get();
            }else{
                $data = DB::table('leave_requests')->whereemp_id($r->user_id)->orderByDesc('id')->get();
            }
             $res['code'] = 1;
               $res['status'] = 'success';
               $res['message'] = 'leave history by fillter';
               $res['data'] = $data;
        }              
        else{
               $res['code'] = 0;
               $res['status'] = 'failed';
               $res['message'] = 'invalid user';
           
           }
        }
        echo json_encode($res);
    }
    public function showLeaves() {
        $current_user = Auth::user();
        $leaves = Leave::latest()->get();
        $employees = User::paginate(5);
        $my_leaves = $current_user->leaves;

        return view('/home', compact('current_user', 'leaves', 'employees', 'my_leaves'));
    }

    public function approveLeave($id) {
        $app_leave = Leave::find($id);
        $app_leave->status = 'approved';
        $app_leave->save();

        Session::flash('message', 'Leave successfully approved');

        return back();
    }

    public function denyLeave($id) {
        $den_leave = Leave::find($id);
        $den_leave->status = 'denied';
        $den_leave->save();

        Session::flash('message', 'Leave successfully denied');

        return back();
    }

    public function cancelLeave($id) {
        $cancel_leave = Leave::find($id);
        $cancel_leave->status = 'cancelled';
        $cancel_leave->save();

        Session::flash('message', 'Leave successfully cancelled');

        return back();
    }

}
