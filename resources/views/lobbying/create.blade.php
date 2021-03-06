@extends('layouts.master', ['title' => __('common.New Lobbying')])

@section('mainContent')
    <!-- Vertical form options -->
    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between w-100">
                            <h3 class="mb-0 mr-30">{{__('common.Add Lobbying')}}</h3>

                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::open(['route' => 'lobbying.store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        <div class="row">
                            <div class="primary_input col-md-12">
                                {{Form::hidden('case', $case)}}
                                {{Form::label('hearing_date', __('common.Lobbying Date'),['class' => 'required'])}}
                                {{Form::text('hearing_date', date('Y-m-d H:i'), ['required' => '','class' => 'form-control primary-input datetime form-control', 'placeholder' => __('common.Lobbying Date')])}}
                            </div>
                        </div>

                        @includeIf('customfield::fields', ['fields' => $fields, 'model' => null])

                        <div class="primary_input">
                            {{Form::label('description', __('common.Lobbying Order'),['class' => 'required'])}}
                            {{Form::textarea('description', null, ['class' => 'form-control summernote', 'placeholder' => __('common.Lobbying Order'),'required', 'rows' => 5, 'data-parsley-errors-container' =>
                            '#description_error'])}}
                            <span id="description_error"></span>
                        </div>

                        @includeIf('case.file')


                        <div class="text-center mt-3">
                            <button class="btn btn-primary submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>

                            <button class="btn btn-primary submitting" type="submit" disabled
                                    style="display: none;"><i class="ti-check"></i>{{ __('common.Creating') . '...' }}
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
