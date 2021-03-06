@extends('layouts.master', ['title' => __('appointment.Update Appointment')])


@section('mainContent')


    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{__('appointment.Edit Appointment')}}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">

                        {!! Form::model($model, ['route' => ['appointment.update', $model->id], 'class' =>
                          'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="row">
                            <div class="primary_input col-md-12">
                                {{Form::label('title', __('appointment.Title'))}}
                                {{Form::text('title', null, ['class' => 'form-control', 'placeholder' => __('appointment.Title')])}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="primary_input col-md-6">
                                {{Form::label('contact_id', __('appointment.Contact'), ['class' => 'required'])}}
                                {{Form::select('contact_id', $contacts, null, ['required' => '', 'class' => 'form-control select2bs4', 'data-parsley-errors-container' => '#contact_id_error'])}}
                                <span id="contact_id_error"></span>
                            </div>

                            <div class="primary_input col-md-6">
                                {{Form::label('date', __('appointment.Appointment Date'))}}
                                {{Form::text('date', null, ['class' => 'form-control primary-input datetime form-control', "id"=>"fromDate",'placeholder' => __('appointment.Date')])}}
                            </div>
                        </div>
                        <div class="primary_input">
                            {{Form::label('motive', __('appointment.Motive'))}}
                            {{Form::textarea('motive', null, ['class' => 'form-control', 'placeholder' => __('appointment.Appointment Motive'), 'rows' => 5, 'data-parsley-errors-container' =>
                            '#motive_error' ])}}
                            <span id="motive_error"></span>
                        </div>
                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => $model])
                        <div class="primary_input">
                            {{Form::label('notes', __('appointment.Notes'))}}
                            {{Form::textarea('notes', null, ['class' => 'form-control summernote', 'placeholder' => __('appointment.Appointment Notes'), 'rows' => 5, 'data-parsley-errors-container' =>
                            '#notes_error' ])}}
                            <span id="notes_error"></span>
                        </div>

                        <div class="text-center mt-3">

                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Update') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Updating') . '...' }}
                            </button>

                        </div>
                        {!! Form::close() !!}

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
