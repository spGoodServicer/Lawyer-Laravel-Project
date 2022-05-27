@extends('finance::layouts.master', ['title' => __('finance.Update Income Invoice')])

@section('mainContent')

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between ">
                            <h3 class="mb-0 mr-30">{{ __('finance.Update Income Invoice') }}</h3>
                            <ul class="d-flex">
                                @if(permissionCheck('invoice.incomes.index'))
                                    <li><a class="primary-btn mr-10 fix-gr-bg" href="{{ route('invoice.incomes.index') }}"><i class="ti-list"></i>{{ __
                        ('finance.Income Invoice List') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::model($model, ['route' => ['invoice.incomes.update', $model->id], 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'Put']) !!}
                        @includeIf('finance::invoice.components.form')
                        <div class="text-center mt-3">
                            <button class="primary-btn fix-gr-bg submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Update') }}
                            </button>

                            <button class="primary-btn fix-gr-bg submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Updating') . '...' }}
                            </button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal fade animated service_type_add infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>

@stop
@push('admin.scripts')

    @include('finance::invoice.script')
@endpush
