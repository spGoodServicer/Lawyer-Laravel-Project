@extends('layouts.master', ['title' => __('contact.Update Contact Category')])

@section('mainContent')
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="box_header">
                    <div class="main-title d-flex justify-content-between w-100">
                        <h3 class="mb-0 mr-30">{{ __('contact.Update Contact Category') }}</h3>

                    </div>
                </div>
            </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">

                    {!! Form::model($model, ['route' => ['category.contact.update', $model->id], 'class' =>
                    'form-validate-jquery',
                    'id' => 'content_form', 'method' => 'PUT']) !!}
                    <div class="primary_input">
                        {{Form::label('name', __('contact.Designation Name'),['class' => 'required'])}}
                        {{Form::text('name', null, ['required' => '', 'class' => 'primary_input_field', 'placeholder' => __
                        ('contact.Designation Name')])}}
                    </div>

                    <div class="primary_input">
                        {{Form::label('description', __('contact.Description'))}}
                        {{Form::textarea('description', null, ['class' => 'primary_input_field', 'placeholder' =>
                         __('contact.Designation Description'), 'rows' => 5 ])}}
                    </div>

                    <div class="text-center mt-3">
                    <button type="submit" class="primary-btn fix-gr-bg semi_large2" id="submit" value="submit">{{ __ ('common.Update')
                        }}</button>
                    </div>
                    {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop

@push('admin.scripts')

    <script>
        $(document).ready(function () {
            _formValidation();

        });
    </script>
@endpush

