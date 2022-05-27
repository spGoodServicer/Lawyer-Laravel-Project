<div class="pos-tab-content">
    <div class="row">
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('variable_options', __('superadmin::lang.variable_options') . ':') !!}
                {!! Form::select('variable_options', ['Number of Branches','Number of Users', 'Number of Products',
                'Number of Periods', 'Number of Customers', 'Number of Stores', 'Monthly Total Sales Value'], null, ['class' => 'form-control', 'placeholder' => 'Please select', 'id' => 'company_variable_options']); !!}
            </div>
        </div>
        <div class="col-xs-4">
            <div class="form-group">
                {!! Form::label('variable_code', __('superadmin::lang.variable_code') . ':') !!}
                {!! Form::text('variable_code', null, ['class' => 'form-control', 'placeholder' => 'Please select', 'id' => 'company_variable_code']); !!}
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('option_value', __('superadmin::lang.option_value') . ':') !!}
                <div class="input-group">
                    {!! Form::text('option_value', null , ['class' =>
                    'form-control', 'id' => 'company_option_value', 'placeholder' => __('superadmin::lang.option_value')]); !!}
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('increase_decrease', __('superadmin::lang.increase_decrease') . ':') !!}
                {!! Form::select('increase_decrease', ['Increase','Decrease'], null, ['id' => 'company_increase_decrease', 'class' => 'form-control', 'placeholder' => 'Please select']); !!}
            </div>
        </div>
        <div class="col-xs-3">
            <div class="form-group">
                {!! Form::label('variable_type', __('superadmin::lang.variable_type') . ':') !!}
                {!! Form::select('variable_type', ['Fixed','Percentage'], null, ['id' => 'company_variable_type', 'class' => 'form-control', 'placeholder' => 'Please select']); !!}
            </div>
        </div>
        <div class="col-xs-2">
            <div class="form-group">
                {!! Form::label('price_value', __('superadmin::lang.price_value') . ':') !!}
                <div class="input-group">
                    {!! Form::text('price_value', null, ['class' =>
                    'form-control','placeholder' => __('superadmin::lang.price_value'), 'id' => 'company_price_value']); !!}
                </div>
            </div>
        </div>
        <div class="col-xs-2">
            <button class="primary-btn fix-gr-bg" type="submit" style="margin-top: 22px;" id="company_package_variable_add">@lang('messages.add')</button>
        </div>
        {!! Form::close() !!}
    </div>

    @component('components.widget', ['class' => 'box-primary', 'title' => __( 'superadmin::lang.all_package_variables' )])

    <div class="table-responsive">
        <table class="table table-bordered table-striped" id="company_package_variables_table" style="width:100%;">
            <thead>
                <tr>
                    <th>@lang( 'superadmin::lang.variable_code' )</th>
                    <th>@lang( 'superadmin::lang.variable_options' )</th>
                    <th>@lang( 'superadmin::lang.option_value' )</th>
                    <th>@lang( 'superadmin::lang.increase_decrease' )</th>
                    <th>@lang( 'superadmin::lang.variable_type' )</th>
                    <th>@lang( 'superadmin::lang.price_value' )</th>
                    <th>@lang( 'superadmin::lang.action' )</th>
                </tr>
            </thead>
        </table>
    </div>
@endcomponent
</div>