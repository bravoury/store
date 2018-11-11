<div class="box-header with-border">
    <h3 class="box-title">  {!! trans('store::store.names') !!}</h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm"  data-action='NEW' data-load-to='#store-store-entry' data-href='{!!trans_url('admin/store/store/create')!!}'><i class="fa fa-plus-circle"></i> cms.new </button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" style="min-height:100px">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <h1 class="text-center">
            <small>
            <button type="button" class="btn btn-app" data-toggle="tooltip" data-placement="top" title="" data-action='NEW' data-load-to='#store-store-entry' data-href='{!!trans_url('admin/store/store/create')!!}'>
            <span class="badge bg-purple">{!! Store::count('store') !!}</span>
            <i class="fa fa-plus-circle  fa-3x"></i>
            {{ trans('cms.create') }} {!! trans('store::store.name') !!}
            </button>
            <br>{!! trans('store::store.text.preview') !!}
            </small>
            </h1>
        </div>
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>