<div class="modal-dialog" role="document">
    <div class="modal-content">

        {!! Form::open(['url' => action('\Modules\Superadmin\Http\Controllers\EditAccountEntriesController@update',
        $account_transaction->id), 'method' => 'put', 'id' => 'edit_account_transaction_form'
        ]) !!}

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                    aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">@lang( 'account.add_account' )</h4>
        </div>

        <div class="modal-body">
            {!! Form::hidden('account_id', $account_transaction->account_id, []) !!}
            {!! Form::hidden('business_id', $business_id, []) !!}
            {!! Form::hidden('account_transaction_id', $account_transaction->id, []) !!}
            <div class="form-group">
                {!! Form::label('amount', __( 'account.amount' ) .":*") !!}
                {!! Form::text('amount', $account_transaction->amount, ['class' => 'form-control',
                'required','placeholder' => __(
                'account.amount' ) ]); !!}
            </div>

        </div>

        <div class="modal-footer">
            <button type="submit" class="primary-btn fix-gr-bg">@lang( 'messages.update' )</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
        </div>

        {!! Form::close() !!}

    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>

</script>