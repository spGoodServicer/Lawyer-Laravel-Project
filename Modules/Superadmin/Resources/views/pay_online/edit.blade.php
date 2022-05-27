<!-- Modal -->
<div class="modal-dialog" role="document">
  <div class="modal-content">
   {!! Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\PayOnlineController@update',$pay_online->id), 'method' => 'PUT', 'id' => 'status_change_form']) !!}

    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">@lang( "superadmin::lang.subscription_status")</h4>
    </div>

    <div class="modal-body">
           <div class="form-group">
              {!! Form::label('status', __( "superadmin::lang.status")) !!}

              {!! Form::select('status', $status, $pay_online->status, ['class' => 'form-control']); !!}
            </div>

            <div class="form-group">
              {!! Form::label('payment_transaction_id', __("superadmin::lang.payment_transaction_id"))!!}

              {!! Form::text('payment_transaction_id', $pay_online->payment_transaction_id, ['class' => 'form-control']);!!}
            </div>
    </div>

    <div class="modal-footer">
      <button type="submit" class="primary-btn fix-gr-bg">@lang( "superadmin::lang.update")</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( "superadmin::lang.close")</button>
    </div>
    {!! Form::close() !!}
  </div>
</div>
