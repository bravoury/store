<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.view') }}   {!! trans('store::store.name') !!}  [{!! $store->name !!}]  </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-success btn-sm" data-action='NEW' data-load-to='#store-store-entry' data-href='{{trans_url('admin/store/store/create')}}'><i class="fa fa-times-circle"></i> cms.new</button>
        @if($store->id )
        <button type="button" class="btn btn-primary btn-sm" data-action="EDIT" data-load-to='#store-store-entry' data-href='{{ trans_url('/admin/store/store') }}/{{$store->getRouteKey()}}/edit'><i class="fa fa-pencil-square"></i> cms.edit</button>
        <button type="button" class="btn btn-danger btn-sm" data-action="DELETE" data-load-to='#store-store-entry' data-datatable='#store-store-list' data-href='{{ trans_url('/admin/store/store') }}/{{$store->getRouteKey()}}' >
        <i class="fa fa-times-circle"></i> cms.delete
        </button>
        @endif
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">  {!! trans('store::store.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('store-store-show')
        ->method('POST')
        ->files('true')
        ->action(URL::to('admin/store/store'))!!}
            <div class="tab-content">
                <div class="tab-pane active" id="details">
                    @include('store::admin.store.partial.entry')
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>