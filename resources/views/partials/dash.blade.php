<h1 class="page-header">Dashboard</h1>

@if(Session::has('message'))
    <div class="alert alert-success alert-dismissable fade in"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>{{ Session::get('message') }}</div>
@endif

<h2 class="sub-header">Pending Requests</h2>
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th class="col-sm-1">Badge</th>
            <th class="col-sm-2">Name</th>
            <th class="col-sm-1">From</th>
            <th class="col-sm-1">To</th>
            <th class="col-sm-1">Type</th>
            <th class="col-sm-2">Reason</th>
            <th class="col-sm-1">Status</th>
            <th class="col-sm-1">Created At</th>
            <th class="col-sm-1">Updated At</th>

            @if(Auth::user()->role=='admin')
            <th class="col-sm-1">Action</th>
            @endif

        </tr>
    </thead>
    <tbody>
        @foreach($leaves as $leave)
            <tr>
                <td class="col-sm-1">{{ $leave->employee->badge }}</td>
                <td class="col-sm-2">{{ $leave->employee->emp_name }}</td>
                <td class="col-sm-1">{{ $leave->from }}</td>
                <td class="col-sm-1">{{ $leave->to }}</td>
                <td class="col-sm-1">{{ $leave->type }}</td>
                <td class="col-sm-1">{{ $leave->reason }}</td>
                <td class="col-sm-1">{{ $leave->status }}</td>
                <td class="col-sm-1">{{ $leave->created_at }}</td>
                <td class="col-sm-1">{{ $leave->updated_at }}</td>

                @if(Auth::user()->role=='admin')
                <td class="col-sm-2">
                    <a href='{{ url("approve_leave/$leave->id") }}' class="btn btn-primary btn-xs"><i class="fa fa-check" aria-hidden="true"></i></a>
                    <a href='{{ url("deny_leave/$leave->id") }}' class="btn btn-danger btn-xs"><i class="fa fa-times" aria-hidden="true"></i></a>
                    <a href='{{ url("cancel_leave/$leave->id") }}' class="btn btn-warning btn-xs"><i class="fa fa-ban" aria-hidden="true"></i></a>
                </td>
                @endif

            </tr>
        @endforeach
    </tbody>
</table>