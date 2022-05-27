@extends('finance::layouts.master', ['title' => __('finance.Create New Expense Type')])

@section('mainContent')

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between ">
                            <h3 class="mb-0 mr-30">{{ __('finance.Add Expense Type') }}</h3>
                            <ul class="d-flex">
                                @if(permissionCheck('expense_types.index'))
                                    <li><a class="primary-btn mr-10 fix-gr-bg" href="{{ route('expense_types.index') }}"><i class="ti-list"></i>{{ __
                        ('finance.Expense Type List') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        {!! Form::open(['route' => 'expense_types.store', 'class' => 'form-validate-jquery', 'id' => 'content_form', 'files' => false, 'method' => 'POST']) !!}
                        @includeIf('finance::expense_type.components.form')
                        <div class="text-center mt-3">
                            <button class="primary-btn fix-gr-bg submit" type="submit"><i
                                    class="ti-check"></i>{{ __('common.Create') }}
                            </button>

                            <button class="primary-btn fix-gr-bg submitting" type="submit" disabled style="display: none;">
                                <i class="ti-check"></i>{{ __('common.Creating') . '...' }}
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
