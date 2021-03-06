@extends('layouts.master', ['title' => __('case.New Date')])

@section('mainContent')
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{__('case.Add Date')}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::open(['route' => 'date.store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="primary_input col-md-12">
                                <div class="d-flex justify-content-between">
                                    {{Form::label('stage_id', __('case.Case Stage'))}}
                                    @if(permissionCheck('master.stage.store'))
                                        <label class="primary_input_label green_input_label" for="">
                                            <a href="{{ route('master.stage.create', ['quick_add' => true]) }}"
                                               class="btn-modal"
                                               data-container="case_stage_add_modal">{{ __('case.Create New') }}
                                                <i class="fas fa-plus-circle"></i></a></label>
                                    @endif
                                </div>
                                {{Form::select('stage_id', $stages, $case_model->stage_id, ['class' => 'form-control select2bs4', 'data-placeholder' => __('case.Case Stage')])}}
                            </div>

                            <div class="primary_input col-md-12">
                                {{Form::hidden('case', $case)}}
                                {{Form::label('hearing_date', __('case.Hearing Date'), ['class' => 'required'])}}
                                {{Form::text('hearing_date', date('Y-m-d H:i'), ['required' => '','class' => 'form-control primary-input datetime form-control', 'placeholder' => __('case.Hearing Date')])}}
                            </div>

                        </div>

                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => null])

                        <div class="primary_input">
                            {{Form::label('description', __('case.Court Order'), ['class' => 'required'])}}
                            {{Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => __('case.Court Order'), 'rows' => 5, 'required', 'data-parsley-errors-container' =>
                            '#description_error' ])}}
                            <span id="description_error"></span>
                        </div>

                        @includeIf('case.file')


                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>
                            <button class="btn btn-primary submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
                            </button>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="modal fade animated case_stage_add_modal infix_advocate_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>

@stop
@push('admin.scripts')

    <script>
        $(document).ready(function () {
            _formValidation();
        });
    </script>
@endpush
