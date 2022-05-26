@extends('layouts.master', ['title' => __('setting.Update City')])
@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{ __('setting.Update City') }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">

                        {!! Form::model($model, ['route' => ['setup.city.update', $model->id], 'class' =>
                        'form-validate-jquery',
                        'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="row">
                            <div class="primary_input col-md-4">
                                {{Form::label('country_id', __('court.Country'), ['class' => 'required'])}}
                                {{Form::select('country_id', @$countries, $model->state->country_id, ['class' => 'form-control select2bs4', 'id' => 'country_id', 'data-placeholder' => __('court.Select country'),  'data-parsley-errors-container' => '#country_id_error', 'required'])}}
                                <span id="country_id_error"></span>
                            </div>
                            <div class="primary_input col-md-4">
                                {{Form::label('state_id', __('setting.State'), ['class' => 'required'])}}
                                {{Form::select('state_id', $states, Null, ['class' => 'form-control select2bs4', 'id' => 'state_id', 'data-placeholder' => __('court.Select State'),  'data-parsley-errors-container' => '#state_id_error', 'required'])}}
                                <span id="state_id_error"></span>
                            </div>
                            <div class="primary_input col-md-4">
                                {{Form::label('name', __('setting.City Name'),['class' => 'required'])}}
                                {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __('setting.City Name')])}}
                            </div>

                        </div>

                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Update') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled
                                    style="display: none;"><i class="ti-check"></i>{{ __('common.Updating') . '...' }}
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
            _componentSelect2Normal();
            _componentAjaxChildLoad('#content_form', '#country_id', '#state_id', 'state')
            _componentAjaxChildLoad('#content_form', '#state_id', '#city_id', 'city')
            _formValidation();

        });
    </script>
@endpush
