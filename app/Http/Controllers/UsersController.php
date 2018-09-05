<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\User;
use Auth;
use Session;

class UsersController extends Controller
{
  public function addEmployee(Request $request)
  {
    $new_employee = new User();
    $new_employee->badge = $request->badge;
    $new_employee->emp_name = $request->ename;
    $new_employee->role = $request->role;
    $new_employee->emp_status = $request->estatus;
    $new_employee->email = $request->email;
    $new_employee->password = bcrypt($request->password);
    $new_employee->leave_bal = $request->creds;
    $new_employee->save();

    Session::flash('alert', 'Employee successfully added to the database!');

    return back();
  }

  public function showEmployee($id)
  {
    $employee = User::find($id);
    $employees = User::all();
    $leaves = Leave::latest()->get();

    return view('/home',compact('leaves', 'employees','employee'));
  }

  public function editProfile($id, Request $request)
  {
    $edit_emp = User::find($id);
    $edit_emp->emp_name = $request->ename;
    $edit_emp->email = $request->email;
    $edit_emp->password = bcrypt($request->pw1);
    $edit_emp->role = $request->role;
    $edit_emp->emp_status = $request->estatus;
    $edit_emp->leave_bal = $request->creds;
    $edit_emp->save();

    Session::flash('alert', 'Profile successfully updated');

    return back();
  }

  public function deleteEmployee($id)
  {
    $employee_del = User::find($id);
    $employee_del->delete();

    Session::flash('alert', 'Employee successfully deleted from the database');

    return back();
  }

}
