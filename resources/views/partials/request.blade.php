<h1 class="page-header">Request for Leave</h1>
<div class="text-center">
    <form method="POST" action='{{ url("submit_leave/$current_user->id") }}'>
    {{ csrf_field() }}
        <table class="table table-bordered table-responsive">
            <tbody>
                <tr>
                    <th class="col-sm-2">Employee Id:</th>
                    <td class="col-sm-3">{{$current_user->badge}}</td> 
                    <th class="col-sm-2">Employee Name:</th>
                    <td class="col-sm-5">{{$current_user->emp_name}}</td>
                </tr>
                <tr>
                    <th class="col-sm-2">Role:</th>
                    <td class="col-sm-3">{{$current_user->role}}</td> 
                    <th class="col-sm-2">Employment Status:</th>
                    <td class="col-sm-5">{{$current_user->emp_status}}</td>
                </tr>
                <tr>
                    <th class="col-sm-2">Vacation Leave Credits:</th>
                    <td class="col-sm-3">{{$current_user->leave_bal}}</td> 
                    <th class="col-sm-2">Type of Leave:</th>
                    <td class="col-sm-5">
                    <div class="col-sm-6 col-sm-offset-3">
                        <select class="form-control" id="leave" name="leave">
                            <option>Vacation</option>
                            <option>Sick</option>
                            <option>Maternity</option>
                            <option>Paternity</option>
                            <option>Bereavement</option>
                        </select>
                    </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th class="col-sm-5 text-center">Duration: </th>
                    <td>
                        <div class="col-sm-6 col-sm-offset-3">
                            From: <input type="text" class="form-control" id="from" name="from" placeholder="MM/DD/YYYY">
                            To: <input type="text" class="form-control" id="to" name="to" placeholder="MM/DD/YYYY">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="col-sm-5 text-center">Reason: </th>
                    <td>
                        <div class="col-sm-8 col-sm-offset-2">
                        <input type="text" class="form-control" id="reason" name="reason" placeholder="Limit reason to 140 characters" required>
                        <div class="col-sm-6 col-sm-offset-3">
                    </td>
                </tr>
            </tbody>
        </table>
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td>
                        <button class="btn btn-primary" id="file" name="file"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>