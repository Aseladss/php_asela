@if(sizeof($data) > 0)
<div class="box box-primary">
    <div class="box-header with-border">
        <div class="row">
            <div class="col-md-6">
                <h3 class="box-title">SALES TEAM</h3>
            </div>
            <div class="col-md-6">
                <button class="btn btn-default btn-sm" id="btn-add" data-toggle="modal">Add New</button>
            </div>
        </div>
    </div>
    <div class="box-body">
        <table class="table table-striped table-bordered table-condensed">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>EMAIL</th>
                    <th>TELEPHONE</th>
                    <th>CURRENT ROUTE</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $value)
                <tr>
                    <td>{{ $value->id }}</td>
                    <td>{{ $value->full_name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->telephone }}</td>
                    <td>{{ $value->name }}</td>
                    <td><button class="btn btn-block btn-sm btn-success btn-view" data-toggle="modal" data-id="{{ $value->id }}">View</button></td>
                    <td><button class="btn btn-block btn-sm btn-warning btn-edit" data-id="{{ $value->id }}">Edit</button></td>
                    <td><button class="btn btn-block btn-sm btn-danger btn-delete" data-id="{{ $value->id }}">Delete</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@else
<row>No data to show</row>
@endif
