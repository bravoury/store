@extends('admin::curd.index')
@section('heading')
<i class="fa fa-file-text-o"></i> {!! trans('store::store.name') !!} <small> {!! trans('cms.manage') !!} {!! trans('store::store.names') !!}</small>
@stop

@section('title')
{!! trans('store::store.names') !!}
@stop

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="{!! trans_url('admin') !!}"><i class="fa fa-dashboard"></i> {!! trans('cms.home') !!} </a></li>
    <li class="active">{!! trans('store::store.names') !!}</li>
</ol>
@stop

@section('entry')
<div class="box box-warning" id='store-store-entry'>
</div>
@stop

@section('tools')
@stop

@section('content')
<table id="store-store-list" class="table table-striped table-bordered">
    <thead>
        <th>{!! trans('store::store.label.phone')!!}</th>
                    <th>{!! trans('store::store.label.working_hours')!!}</th>
    </thead>
</table>
@stop

@section('script')
<script type="text/javascript">

var oTable;
$(document).ready(function(){
    app.load('#store-store-entry', '{!!URL::to('admin/store/store/0')!!}');
    oTable = $('#store-store-list').dataTable( {
        "ajax": '{!! URL::to('/admin/store/store') !!}',
        "columns": [
            {data :'phone'},
                    {data :'working_hours'},
        ],
        "pageLength": 50
    });

    $('#store-store-list tbody').on( 'click', 'tr', function () {

        if ($(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        } else {
            oTable.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }

        var d = $('#store-store-list').DataTable().row( this ).data();

        $('#store-store-entry').load('{!!URL::to('admin/store/store')!!}' + '/' + d.id);

    });
});
</script>
@stop

@section('style')
@stop

