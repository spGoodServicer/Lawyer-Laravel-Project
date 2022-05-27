<div class="primary_input {{ $field->width }}"
     @if($field->parent)
     id="controlled_field_{{$field->id}}"
     style="display: none;"
     data-controlled_field_value="{{ $field->controlled_field_value }}"
     @if($field->required) data-required="required" @endif
    @endif
>
    <label for="custom_field_{{ $field->id }}" class="{{ $field->required ? 'required' : '' }}">
        {{ $field->title }}
        @if($field->description)
            <i class="ti-help help_icon" data-toggle="tooltip" title="{!! $field->description !!}"></i>
        @endif
    </label>
    @php
        $field_values = explode(',', $field->values);

    @endphp

    <select name="custom_field[{{ $field->id }}]"
            id="custom_field_{{ $field->id }}" class="primary_select custom_field"
            data-parsley-errors-container="#custom_field_{{ $field->id }}_error"
            @if(!$field->parent and $field->required)
            required
            @endif
            @if($field->childs) data-controlled_fields="{{ implode(',', $field->childs()->pluck('id')->toArray()) }}" @endif>

        @foreach($field_values as $field_value)
            <option value="{{ trim($field_value) }}" @if($value == $field_value) selected @endif>{{ trim($field_value) }}</option>
        @endforeach
    </select>
    <span id="custom_field_{{ $field->id }}_error"></span>
</div>