<div class="box-header with-border">
    <h3 class="box-title"> {{ trans('cms.new') }}  {!! trans('store::store.name') !!} </h3>
    <div class="box-tools pull-right">
        <button type="button" class="btn btn-primary btn-sm" data-action='CREATE' data-form='#store-store-create'  data-load-to='#store-store-entry' data-datatable='#store-store-list'><i class="fa fa-floppy-o"></i> cms.save</button>
        <button type="button" class="btn btn-default btn-sm" data-action='CLOSE' data-load-to='#store-store-entry' data-href='{{Trans::to('admin/store/store/0')}}'><i class="fa fa-times-circle"></i> {{ trans('cms.close') }}</button>
        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div>
</div>
<div class="box-body" >
    <div class="nav-tabs-custom">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs primary">
            <li class="active"><a href="#details" data-toggle="tab">Store</a></li>
        </ul>
        {!!Form::vertical_open()
        ->id('store-store-create')
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