@extends('layouts.master', ['title' => __('client.Update Client')])

@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{__('client.Update Client')}}</h1>
      </div>
      <div class="col-sm-6">
            <ul class="breadcrumb float-sm-right">
                <li>
                    <a class="btn btn-primary mr-10 float-sm-right" href="{{ route('client.index') }}">
                        <i class="fa fa-list"></i>  {{__('client.Client List')}}
                    </a>
                </li>
            </ul>
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            {!! Form::model($model, ['route' => ['client.update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'method' => 'PUT']) !!}
                            <div class="row">
                                <div class="col-sm-3 text-center">
                                    <div class="kv-avatar">
                                        <div class="file-loading">
                                            <input id="avatarImage" name="avatarImage" value="fasdf.jpg" type="file">

                                        </div>
                                    </div>
                                    <div class="kv-avatar-hint">
                                        <small>Select file < 1500 KB</small>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="row">
                                        <div class="primary_input col-md-6">
                                            {{Form::label('name', __('client.Client Name'), ['class' => 'required'])}}
                                            {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __('client.Client Name')])}}
                                        </div>
                                        <div class="primary_input col-md-6">
                                            {{Form::label('mobile', __('client.Client Mobile'))}}
                                            {{Form::text('mobile', null, ['class' => 'form-control', 'placeholder' => __('client.Client Mobile')])}}
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="primary_input col-md-6">
                                            {{Form::label('email', __('client.Client Email'), ['class' => ($enable_login ? 'required' : '')])}}
                                            {{Form::email('email', null, ['class' => 'form-control', 'placeholder' => __('client.Client Email'), ($enable_login ? 'required' : '')])}}
                                        </div>
                                <!--@if($enable_login)-->
                                    
                                <!--@endif-->
                                        <div class="primary_input col-md-6">
                                            {{Form::label('password', __('client.Password'), ['class' => (($enable_login and !$model->user) ? 'required' : '')])}}
                                            {{Form::text('password', null, ['class' => 'form-control', 'placeholder' => __('client.Password'), (($enable_login and !$model->user) ? 'required' : ''), 'min' => 8])}}
                                        </div>

                                    </div>


                                    <div class="row">
                                        <div class="primary_input col-md-6">
                                            {{Form::label('gender', __('client.Gender'))}}
                                            {{Form::select('gender', ['Male' => 'Male', 'FeMale' => 'FeMale'], null, ['class' => 'form-control select2bs4', 'data-placeholder' => __('client.Select Gender'), 'data-parsley-errors-container' => '#gender_error'])}}
                                            <span id="gender_error"></span>
                                        </div>
                                        <div class="primary_input col-md-6">
                                            <div class="d-flex justify-content-between">
                                                {{Form::label('client_category_id', __('client.Client Category'))}}
                                                @if(permissionCheck('category.client.store'))
                                                    <label class="primary_input_label green_input_label" for="">
                                                        <a href="{{ route('category.client.create', ['quick_add' => true]) }}"
                                                           class="btn-modal"
                                                           data-container="client_category_add_modal">{{ __('case.Create New') }}
                                                            <i class="fas fa-plus-circle"></i></a></label>
                                                @endif
                                            </div>
                                            {{Form::select('client_category_id', $client_categories, null, ['class' => 'form-control select2bs4', 'data-placeholder' => __('client.Select Division'),  'data-parsley-errors-container' => '#client_category_id_error'])}}
                                            <span id="client_category_id_error"></span>
                                        </div>

                                    </div>
                                    <div class="row">

                                        <div class="primary_input col-md-4">
                                            {{Form::label('country_id', __('client.Country'))}}
                                            {{Form::select('country_id', $countries, config('configs')->where('key','country_id')->first()->value, ['class' => 'form-control select2bs4', 'id' => 'country_id', 'data-placeholder' => __('client.Select country'),  'data-parsley-errors-container' => '#country_id_error'])}}
                                            <span id="country_id_error"></span>
                                        </div>

                                        <div class="primary_input col-md-4">
                                            {{Form::label('state_id', __('client.State'))}}
                                            {{Form::select('state_id', $states, null, ['class' => 'form-control select2bs4','id' => 'state_id', 'data-placeholder' => __('client.Select state'), 'data-parsley-errors-container' => '#state_id_error'])}}
                                            <span id="state_id_error"></span>
                                        </div>

                                        <div class="primary_input col-md-4">
                                            {{Form::label('city_id', __('client.City'))}}
                                            {{Form::select('city_id',$cities, null, ['class' => 'form-control select2bs4','id' => 'city_id', 'data-placeholder' => __('client.Select city'), 'data-parsley-errors-container' => '#city_id_error'])}}
                                            <span id="city_id_error"></span>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            

                            

                            <div class="primary_input">
                                {{Form::label('address', __('client.Client Address'))}}
                                {{Form::textarea('address', null, [ 'class' => 'form-control', 'placeholder' => __('client.Client Address'), 'rows' => 3])}}
                            </div>
                            @includeIf('customfield::fields', ['fields' => $fields, 'model' => $model])
                            <div class="primary_input">
                                {{Form::label('description', __('client.Description'))}}
                                {{Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => __('client.Client Description'), 'rows' => 5, 'maxlength' => 1500, 'data-parsley-errors-container' =>
                                '#description_error' ])}}
                                <span id="description_error"></span>
                            </div>
                            <div class="text-center mt-3">
                                <button class="btn btn-primary submit" type="submit"><i
                                        class="fa fa-check"></i> {{ __('common.Update') }}
                                </button>

                                <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                    <i class="fa fa-check"></i> {{ __('common.Updating') . '...' }}
                                </button>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade animated client_category_add_modal infix_advocate_modal" id="remote_modal" tabindex="-1"
         role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>

@stop
@push('admin.scripts')

    <script>
        $(document).ready(function () {
            _componentAjaxChildLoad('#content_form', '#country_id', '#state_id', 'state')
            _componentAjaxChildLoad('#content_form', '#state_id', '#city_id', 'city')
            _formValidation();
        });
    </script>
    <script type="text/javascript">
    $("#avatarImage").fileinput({
        overwriteInitial: true,
        maxFileSize: 1500,
        showClose: false,
        showCaption: false,
        showBrowse: false,
        browseOnZoneClick: true,
        removeLabel: '',
        removeIcon: '<i class="fa fa-times"></i>',
        removeTitle: 'Cancel or reset changes',
        elErrorContainer: '#kv-avatar-errors-2',
        msgErrorClass: 'alert alert-block alert-danger',
        defaultPreviewContent: '<img src="'+SET_DOMAIN +'/<?php if(isset($model) && $model->avatar!='') echo $model->avatar; else echo 'public/uploads/staff/user.png';?>'+'" alt="Your Avatar"><h6 class="text-muted">Click to select</h6>',
        layoutTemplates: {main2: '{preview} ' + ' {remove} {browse}'},
        allowedFileExtensions: ["jpg", "png", "gif"]
    });
    </script>
@endpush
