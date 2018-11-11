<div class="box-header with-border">
    <h3 class="box-title"> cms.edit  {!! trans('store::store.name') !!} [{!!$store->name!!}] </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='UPDATE' data-form='#store-store-edit'  data-load-to='#store-store-entry' data-datatable='#store-store-list'><i class="fa fa-floppy-o"></i> cms.save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CANCEL' data-load-to='#store-store-entry' data-href='{{Trans::to('admin/store/store')}}/{{$store->getRouteKey()}}'><i class="fa fa-times-circle"></i> {{ trans('cms.cancel') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>

    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#store" data-toggle="tab">{!! trans('store::store.tab.name') !!}</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('store-store-edit')
        ->method('PUT')
        ->enctype('multipart/form-data')
        ->action(URL::to('admin/store/store/'. $store->getRouteKey()))!!}
        <div class="tab-content">
            <div class="tab-pane active" id="store">
                @include('store::admin.store.partial.entry')
            </div>
        </div>
        {!!Form::close()!!}
    </div>
</div>
<div class="box-footer" >
    &nbsp;
</div>