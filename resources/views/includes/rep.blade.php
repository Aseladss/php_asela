@if(sizeof($data) > 0)
<form id="edit-form" action="{{ URL('rep-edit') }}" method="POST">
    <table class="table table-striped table-bordered table-condensed">
        {!! csrf_field() !!}
        <tbody>
            @foreach($data as $value)
            <tr>
                <td>ID</td>
                <td>
                @if($state == "view")
                {{ $value->id }}
                @else
                <input type="text" class="form-control form-control-sm" value="{{ $value->id }}" name="id" id="id" readonly>
                @endif
                </td>
            </tr>
            <tr>
                <td>Full Name</td>
                <td>
                    @if($state == "view")
                    {{ $value->full_name }}
                    @else
                    <input type="text" class="form-control form-control-sm" value="{{ $value->full_name }}" name="full_name" id="full_name" spellcheck="false">
                    @endif
                </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>
                    @if($state == "view")
                    {{ $value->email }}
                    @else
                    <input type="text" class="form-control form-control-sm" value="{{ $value->email }}" name="email" id="email" spellcheck="false">
                    @endif
                </td>
            </tr>
            <tr>
                <td>Telephone</td>
                <td>
                    @if($state == "view")
                    {{ $value->telephone }}
                    @else
                    <input type="text" class="form-control form-control-sm" value="{{ $value->telephone }}" name="telephone" id="telephone" spellcheck="false">
                    @endif
                </td>
            </tr>
            <tr>
                <td>Joinned Date</td>
                <td>
                    @if($state == "view")
                    {{ $value->joinned_date }}
                    @else
                    <input type="text" class="form-control form-control-sm" value="{{ $value->joinned_date }}" name="joinned_date" id="joinned_date" spellcheck="false">
                    @endif
                </td>
            </tr>
            <tr>
                <td>Current Route</td>
                <td>
                    @if($state == "view")
                    {{ $value->name }}
                    @else
                    @if($route)
                    <select class="form-control" name="route_id" id="route_id">
                        @foreach($route as $val)
                        <option value="{{ $val->id }}" 
                                @if($val->id == $value->route_id)
                            selected = "selected"
                            @endif
                            >{{ $val->name }}</option>
                        @endforeach
                    </select>
                    @endif
                    @endif
                </td>
            </tr>
            <tr>
                <td>Comment</td>
                <td>
                    @if($state == "view")
                    {{ $value->comments }}
                    @else
                    <textarea class="form-control form-control-sm" name="comments" id="comments" rows="4" spellcheck="false">{{ $value->comments }}</textarea>
                    @endif
                </td>
            </tr>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if($state == "edit")
    <div class="row">
        <div>
            <button type="submit" class="btn btn-primary btn-sm" id="btn-save-edit">Save Edit</button>
        </div>
    </div>
    @endif
</form>
@else
<row>No data to show</row>
@endif
