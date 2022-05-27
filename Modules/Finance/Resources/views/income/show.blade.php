@extends('finance::layouts.master', ['title' => __('finance.Income Details')])

@section('mainContent')

    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header">
                        <div class="main-title d-flex justify-content-between">
                            <h3 class="mb-0 mr-30">{{ __('finance.Income Details') }}</h3>
                            <ul class="d-flex">
                                @if(permissionCheck('incomes.index'))
                                    <li><a class="primary-btn mr-10 fix-gr-bg"
                                           href="{{ route('incomes.index') }}"><i class="ti-list"></i>{{ __
                        ('finance.Income List') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">

                        <table>
                            <tbody>

                            <tr>
                                <td class="p-2">{{__('finance.Income Title')}} </td>
                                <td>:</td>
                                <td> {{ $model->title }}</td>
                            </tr>

                            <tr>
                                <td class="p-2">{{__('finance.Income Type')}} </td>
                                <td>:</td>
                                <td> {{ $model->morphable->name }}</td>
                            </tr>

                            <tr>
                                <td class="p-2">{{__('finance.Payment Method')}} </td>
                                <td>:</td>
                                <td> @if ($model->payment_method == 'bank')
                                        {{ __('list.'.$model->payment_method) . "  ({$model->bank->bank_name})" }}
                                    @else
                                        {{__('list.'.$model->payment_method)}}
                                    @endif</td>
                            </tr>
                            <tr>
                                <td class="p-2">{{__('finance.Income Amount')}} </td>
                                <td>:</td>
                                <td> {{ amountFormat($model->amount) }}</td>
                            </tr>

                            <tr>
                                <td class="p-2">{{__('finance.Transaction Date')}} </td>
                                <td>:</td>
                                <td> {{ formatDate($model->transaction_date) }}</td>
                            </tr>

                            <tr>
                                <td class="p-2">{{__('common.File')}} </td>
                                <td>:</td>
                                <td> @if($model->file)
                                        <a href="{{ asset('public/uploads/file/'.$model->file) }}" download=""
                                           class="dropdown-item ">{{__('finance.Download File')}}</a>
                                    @endif</td>
                            </tr>

                            <tr>
                                <td class="p-2">{{__('common.Description')}} </td>
                                <td>:</td>
                                <td>{!! $model->description !!}</td>
                            </tr>

                            @if(moduleStatusCheck('CustomField') and $model->customFields)
                                @includeIf('customfield::details.show', ['customFields' => $model->customFields, 'file' => 'tr'])
                            @endif
                            </tbody>
                        </table>


                    </div>
                </div>
            </div>
        </div>
    </section>

@stop


@push('admin.scripts')

@endpush
