<h1 class="page-header">Edit Records</h1>

@if(Session::has('alert'))
    <div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('alert') }}</div>
@endif

<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th class="col-sm-1">emp_id</th>
            <th class="col-sm-3">Employee Name</th>
            <th class="col-sm-2">Email</th>
            <th class="col-sm-2">Role</th>
            <th class="col-sm-2">Status</th>
            <th class="col-sm-1">Vacation Leave Credits</th>
            <th class="col-sm-1">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($employees as $employee)
        <tr>
            <td class="col-sm-1">{{ $employee->badge }}</td>
            <td class="col-sm-3">{{ $employee->emp_name }}</td>
            <td class="col-sm-2">{{ $employee->email }}</td>
            <td class="col-sm-2">{{ $employee->role }}</td>
            <td class="col-sm-2">{{ $employee->emp_status}}</td>
            <td class="col-sm-1">{{ $employee->leave_bal }}</td>
            <td class="col-sm-1">
                <form method="POST" action='{{ url("show_employee/$employee->id") }}'>
                {{ csrf_field() }}
                <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="{{'#profile' . $employee->id}}"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button>
                </form>
                <!-- Modal -->
                <div class="modal fade" id="{{'profile'.$employee->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <form method="POST" action='{{ url("edit_profile/$employee->id") }}'>
                        {{ csrf_field() }}
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h3>{{ $employee->emp_name }}</h3>
                                    <p><strong>{{ $employee->badge }}</strong></p>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Employee Name</label>
                                        <input type="text" class="form-control" name="ename" value="{{$employee->emp_name}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" value="{{$employee->email}}">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="pw1" value="secret">
                                    </div>
                                    <div class="form-group">
                                        <label>Confirm password</label>
                                        <input type="password" class="form-control" name="pw2" value="secret">
                                    </div>
                                    <div class="form-group">
                                        <label>Vacation Leave Balance</label>
                                        <select class="form-control" name="creds">
                                            <option>24</option>
                                            <option>23</option>
                                            <option>22</option>
                                            <option>21</option>
                                            <option>20</option>
                                            <option>19</option>
                                            <option>18</option>
                                            <option>17</option>
                                            <option>16</option>
                                            <option>15</option>
                                            <option>14</option>
                                            <option>13</option>
                                            <option>12</option>
                                            <option>11</option>
                                            <option>10</option>
                                            <option>9</option>
                                            <option>8</option>
                                            <option>7</option>
                                            <option>6</option>
                                            <option>5</option>
                                            <option>4</option>
                                            <option>3</option>
                                            <option>2</option>
                                            <option>1</option>
                                            <option>0</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        @if($employee->role=='admin')
                                        <input class="form-control" name="role" value="admin" readonly>
                                        @else
                                        <select class="form-control" name="role">
                                            <option>Regular</option>
                                            <option>Supervisor</option>
                                            <option>Admin</option>
                                        </select>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select class="form-control" name="estatus">
                                            <option>Active</option>
                                            <option>Inactive</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary"><i class="fa fa-floppy-o" aria-hidden="true"></i> Save Changes</button>
                                    @if($employee->role!='admin')
                                        <a href='{{ url("del_employee/$employee->id") }}' class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete Profile</a>
                                    @endif              
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $employees->links() }}
