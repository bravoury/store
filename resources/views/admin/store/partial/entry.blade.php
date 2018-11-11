<div class='col-md-4 col-sm-6'>
                       {!! Form::tel('phone')
                       -> label(trans('store::store.label.phone'))
                       -> placeholder(trans('store::store.placeholder.phone'))!!}
                </div>

                <div class='col-md-4 col-sm-6'>
                       {!! Form::text('working_hours')
                       -> label(trans('store::store.label.working_hours'))
                       -> placeholder(trans('store::store.placeholder.working_hours'))!!}
                </div>