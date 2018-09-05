<h1 class="page-header">Add Records</h1>
<form method="POST" action='{{ url("add_employee") }}'>
{{ csrf_field() }}
    <table class="table table-bordered table-responsive">
        <tbody>
            <tr>
                <th class="col-sm-2">Employee Id:</th>
                <td class="col-sm-3"><input type="text" class="form-control" placeholder="Emp Id" id="badge" name="badge" required></input></td> 
                <th class="col-sm-2">Employee Name:</th>
                <td class="col-sm-5"><input type="text" class="form-control" placeholder="First Name Last Name" id="ename" name="ename" required></input></td>
            </tr>
            <tr>
                <th class="col-sm-2">Role:</th>
                <td class="col-sm-3"><input type="text" class="form-control" value="regular" id="role" name="role"></input></td> 
                <th class="col-sm-2">Employment Status:</th>
                <td class="col-sm-5">
                    <select class="form-control" id="estatus" name="estatus">
                        <option>inactive</option>
                        <option>active</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th class="col-sm-2">Email:</th>
                <td class="col-sm-3"><input type="email" class="form-control" id="email" name="email" placeholder="Email" required></input></td>
                <th class="col-sm-2">Password:</th>
                <td class="col-sm-5"><input type="password" class="form-control" id="password" name="password" placeholder="Password" required></input>
            </tr>
            <tr>
                <th class="col-sm-2">Vacation Leave Credits:</th>
                <td class="col-sm-3"><input type="text" class="form-control" value="24" id="creds" name="creds"></input></td>
                <th class="col-sm-2">Action:</th>
                <td class="col-sm-5"><button class="btn btn-primary" id="submit" name="submit"><i class="fa fa-floppy-o" aria-hidden="true"></i> Submit</button></td>
            </tr>
        </tbody>
    </table> 
</form>