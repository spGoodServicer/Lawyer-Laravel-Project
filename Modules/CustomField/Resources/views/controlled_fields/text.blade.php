<div class="primary_input">
    <label for="controlled_field_value" class="required">
        {{ __('custom_fields.controlled_field_value') }}
    </label>
    {{Form::text('controlled_field_value', null, ['class' => 'form-control', 'placeholder' => __('custom_fields.controlled_field_value'), 'id' => 'controlled_field_value', 'required' ])}}

</div>
