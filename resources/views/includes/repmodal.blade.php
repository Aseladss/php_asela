@if(sizeof($data) > 0)
<form id="save-form" action="{{ URL('representative') }}" method="POST">
<table class="table table-striped table-bordered table-condensed">
    {!! csrf_field() !!}
    <tbody>
        <tr>
            <td>Full Name</td>
            <td>
                <input type="text" class="form-control form-control-sm" name="full_name" id="full_name" spellcheck="false">
            </td>
        </tr>
        <tr>
            <td>Email</td>
            <td>
                <input type="email" class="form-control form-control-sm" name="email" id="email" spellcheck="false">
            </td>
        </tr>
        <tr>
            <td>Telephone</td>
            <td>
                <input type="tel" class="form-control form-control-sm" name="telephone" id="telephone" spellcheck="false">
            </td>
        </tr>
        <tr>
            <td>Joinned Date</td>
            <td>
                <input type="text" class="form-control form-control-sm" name="joinned_date" id="joinned_date" spellcheck="false">
            </td>
        </tr>
        <tr>
            <td>Current Route</td>
            <td>
                <select class="form-control" name="route_id" id="route_id">
                    @foreach($data as $value)
                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                    @endforeach
                </select>
            </td>
        </tr>
        <tr>
            <td>Comment</td>
            <td>
                <textarea class="form-control form-control-sm" name="comments" id="comments" rows="4" spellcheck="false"></textarea>
            </td>
        </tr>
    </tbody>
</table>
<div class="row">
    <div>
        <button type="submit" class="btn btn-primary btn-sm" id="btn-save">Save</button>
    </div>
</div>
</form>
<script type="text/javascript">
    $(function () {
        $("#joinned_date").datepicker(
                {dateFormat: 'yy-mm-dd'}
        );
    });
</script>
@endif