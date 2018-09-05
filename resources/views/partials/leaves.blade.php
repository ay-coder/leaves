<h1 class="page-header">My Leaves</h1>
<h2 class="sub-header">{{ $current_user->emp_name }}</h2>
<h3>Badge ID: {{ $current_user->badge }}</h3>
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th class="col-sm-1">From</th>
            <th class="col-sm-1">To</th>
            <th class="col-sm-2">Type</th>
            <th class="col-sm-2">Reason</th>
            <th class="col-sm-1">Status</th>
            <th class="col-sm-2">Created At</th>
            <th class="col-sm-2">Updated At</th>
            <th class="col-sm-1">Action</th>
        </tr>
    </thead>
    <tbody>

    @foreach($my_leaves as $ml)
        <tr>
            <td class="col-sm-1">{{ $ml->from }}</td>
            <td class="col-sm-1">{{ $ml->to }}</td>
            <td class="col-sm-2">{{ $ml->type }}</td>
            <td class="col-sm-2">{{ $ml->reason }}</td>
            <td class="col-sm-1">{{ $ml->status }}</td>
            <td class="col-sm-2">{{ $ml->created_at }}</td>
            <td class="col-sm-2">{{ $ml->updated_at }}</td>
            <td class="col-sm-1"><a href='{{ url("cancel_leave/$ml->id") }}' class="btn btn-warning btn-sm"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</a></td>
        </tr>
    @endforeach
    
    </tbody>
</table>