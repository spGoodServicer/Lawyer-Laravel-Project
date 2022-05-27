<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\IncomeMethodController@store'), 'method'
        => 'post',
        'id' =>
        'add_pumps_form' ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang( 'superadmin::lang.income_method' )</h4>
        </div>

        <div class="modal-body">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('date', __( 'superadmin::lang.date' ) . ':*') !!}
                            {!! Form::text('date', null, ['class' => 'form-control date', 'required',
                            'placeholder' => __(
                            'superadmin::lang.date' ) ]); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('referral_group_id', __( 'superadmin::lang.referral_group' ) . ':*') !!}
                            {!! Form::select('referral_group_id', $referral_groups, null, ['class' => 'form-control
                            referral_group select2', 'required',
                            'placeholder' => __(
                            'superadmin::lang.please_select' ), 'style' => 'width: 100%;' ]); !!}
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <input type="hidden" name="index" id="index" value="0">
                    <div class="col-md-12 text-center">
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('income_method', __( 'superadmin::lang.income_method' )) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('status', __( 'superadmin::lang.status' )) !!}
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                {!! Form::label('action', __( 'superadmin::lang.action' )) !!}
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="method_div">
                            <div class="item_row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::text('income_method[0]', null, ['class' => 'form-control
                                        income_method',
                                        'required',
                                        'placeholder' => __(
                                        'superadmin::lang.income_method' ) ]); !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        {!! Form::select('status[0]', ['enable' => 'Enable', 'disable' => 'Disable'],
                                        null, ['class' => 'form-control
                                        status ', 'required',
                                        'placeholder' => __(
                                        'superadmin::lang.please_select' ), 'style' => 'width: 100%;' ]); !!}
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button class="btn btn-xs btn-primary add_row" data-index="0">+</button>
                                    <button class="btn btn-xs btn-danger remove_row" data-index="0">-</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('income_type', __( 'superadmin::lang.income_type' ) . ':*') !!}
                            {!! Form::select('income_type', ['fixed' => 'Fixed', 'percentage' => 'Percentage'],
                            null, ['class' => 'form-control
                            income_type select2', 'required',
                            'placeholder' => __(
                            'superadmin::lang.please_select' ), 'style' => 'width: 100%;' ]); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('value', __( 'superadmin::lang.value' ) . ':*') !!}
                            {!! Form::text('value', null, ['class' => 'form-control value',
                            'required',
                            'placeholder' => __(
                            'superadmin::lang.value' ) ]); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('minimum_new_signups', __( 'superadmin::lang.minimum_new_signups' ) .
                            ':*') !!}
                            {!! Form::text('minimum_new_signups', null, ['class' => 'form-control
                            minimum_new_signups',
                            'required',
                            'placeholder' => __(
                            'superadmin::lang.minimum_new_signups' ) ]); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('minimum_active_subscriptions', __(
                            'superadmin::lang.minimum_active_subscriptions' ) . ':*') !!}
                            {!! Form::text('minimum_active_subscriptions', null, ['class' => 'form-control
                            minimum_active_subscriptions',
                            'required',
                            'placeholder' => __(
                            'superadmin::lang.minimum_active_subscriptions' ) ]); !!}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {!! Form::label('comission_eligible_conditions', __(
                            'superadmin::lang.comission_eligible_conditions' ) . ':*') !!}
                            {!! Form::select('comission_eligible_conditions', ['minimum_signups_only' => 'Minimum
                            Signups Only', 'minimum_subscription_only' => 'Minimum Subscription Only', 'both' =>
                            'Both'], null, ['class' => 'form-control
                            income_type select2', 'required',
                            'placeholder' => __(
                            'superadmin::lang.please_select' ), 'style' => 'width: 100%;' ]); !!}
                        </div>
                    </div>


                </div>
            </div>
            <div class="clearfix"></div>
            <div class="modal-footer">
                <button type="submit" class="primary-btn fix-gr-bg add_fuel_tank_btn">@lang( 'messages.save' )</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
            </div>

            {!! Form::close() !!}
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->

    <script>
        $('.date').datepicker('setDate', new Date());
        $('.select2').select2();

        $(document).on('click', '.add_row', function(e) {
            e.preventDefault();
            index = parseInt($('#index').val()) +1 ;
            $('#index').val(index);

            $('.method_div').append(`
                <div class="clearfix"></div>
                
                <div class="item_row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control income_method" required="required" placeholder="Income Method" name="income_method[${index}]" type="text">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <select class="form-control status select2" required="required" style="width: 100%;" name="status[${index}]"><option selected="selected" value="">Please Select</option><option value="enable">Enable</option><option value="disable">Disable</option></select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-xs btn-primary add_row" data-index="${index}">+</button>
                        <button class="btn btn-xs btn-danger remove_row" data-index="${index}">-</button>
                    </div>
                </div>
            `);
            
        });

        $(document).on('click', '.remove_row', function(e) {
            $(this).closest('.item_row').remove();

        });

    </script>