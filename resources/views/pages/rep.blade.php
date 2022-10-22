@extends('layouts.adminlayout')
@section('title', 'EYEPAX | Representative')
@section('header', 'Representatives')
@section('content')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
<style type="text/css">
    #btn-add{
        float: right;
    }
    #btn-save, #btn-save-edit{
        float: right;
        min-width: 100px;
        margin-right: 15px;
    }
</style>
<div class="row">
    <div class="col-md-12" id="replist">
        @include('includes.replist')
    </div>
</div>
<!--view modal-->
<div class="modal fade" id="modal-view">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Representative Info</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger print-error-msgs" style="display: none; border-radius: 0; margin-bottom: 10px;">
                    <ul style="margin-bottom: 0px;"></ul>
                </div>
                <div id="modal-body"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script type="text/javascript">
    $(document).on("submit", "#save-form", function (e) {
        $('.print-error-msgs').hide();
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success: function (response)
            {
                try {
                    var data = JSON.parse(response);
                    if (data.status) {

                    } else {
                        var errors = data.errors;
                        console.log(errors);
                        printErrorMsgs(errors);
                    }

                } catch (e) {
                    console.log('this is not json');
                    $('#modal-view').modal('hide');
                    $('#replist').html(response);
                }
            }
        });

    });

    $(document).on("submit", "#edit-form", function (e) {
        $('.print-error-msgs').hide();
        e.preventDefault();
        var form = $(this);
        var actionUrl = form.attr('action');

        $.ajax({
            type: "POST",
            url: actionUrl,
            data: form.serialize(),
            success: function (response)
            {
                try {
                    var data = JSON.parse(response);
                    if (data.status) {

                    } else {
                        var errors = data.errors;
                        console.log(errors);
                        printErrorMsgs(errors);
                    }

                } catch (e) {
                    console.log('this is not json');
                    $('#modal-view').modal('hide');
                    $('#replist').html(response);
                }
            }
        });

    });

    function printErrorMsgs(msg) {
        $(".print-error-msgs").find("ul").html('');
        $(".print-error-msgs").css('display', 'block');
        $.each(msg, function (key, value) {
            $(".print-error-msgs").find("ul").append('<li>' + value + '</li>');
        });

    }
    $(document).on('click', '.btn-delete', function () {
        var repid = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ URL:: to('/delete-rep') }}",
            data: {id: repid},
            success: function (response) {
                $('#replist').html(response);
            }, error: function (request, status, error) {
                alert('error occured');
            }
        });
    });
    $(document).on('click', '.btn-view', function () {
        var repid = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ URL:: to('/get-representative') }}",
            data: {id: repid},
            success: function (response) {
                $('#modal-body').html(response);
                $('#modal-view').modal('show');
            }, error: function (request, status, error) {
                alert('error occured');
            }
        });
    });
    $(document).on('click', '.btn-edit', function () {
        var repid = $(this).attr('data-id');
        $.ajax({
            type: 'GET',
            url: "{{ URL:: to('/edit-representative') }}",
            data: {id: repid},
            success: function (response) {
                $('#modal-body').html(response);
                $('#modal-view').modal('show');
            }, error: function (request, status, error) {
                alert('error occured');
            }
        });
    });
    $(document).on('click', '#btn-add', function () {
        $.ajax({
            type: 'GET',
            url: "{{ URL:: to('/save-representative') }}",
            success: function (response) {
                $('#modal-body').html(response);
                $('#modal-view').modal('show');
            }, error: function (request, status, error) {
                alert('error occured');
            }
        });
    });
    $('#modal-view').on('hidden.bs.modal', function () {
        $('#modal-body').html('');
    });
</script>        
@endsection
