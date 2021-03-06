@extends('finance::layouts.master')

@section('mainContent')


    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header xs_mb_0">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px">{{ __('finance.Income Invoice List') }}</h3>
                            <ul class="d-flex">
                                @if(permissionCheck('invoice.incomes.store'))
                                    <li><a class="btn btn-primary mr-10"
                                           href="{{ route('invoice.incomes.create') }}"><i class="ti-plus"></i>{{ __('finance.New Income Invoice') }}</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="QA_section QA_section_heading_custom check_box_table">
                        <div class="QA_table ">
                            <!-- table-responsive -->
                            <div class="">
                                <table class="table Crm_table_active3">
                                    <thead>
                                    <tr>
                                        <th scope="col">{{ __('common.SL') }}</th>
                                        <th>{{ __('finance.Date') }}</th>
                                        <th>{{ __('finance.Invoice No') }}</th>
                                        <th>{{ __('finance.Client') }}</th>
                                        <th>{{ __('finance.Total Amount') }}</th>
                                        <th>{{ __('finance.Paid') }}</th>
                                        <th>{{ __('finance.Due') }}</th>
                                        <th>{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                {{ formatDate($model->invoice_date) }}
                                            </td>
                                            <td>
                                                <a href="{{ route('invoice.incomes.show', $model->id) }}"> {{ $model->invoice_no }} </a>
                                            </td>
                                            <td>
                                                {{ $model->clientable->name }}
                                                @if($model->case)
                                                    <a href="{{ route('case.show', $model->case_id) }}" target="_blank">({{ $model->case->title }})</a>
                                                    @endif
                                            </td>
                                            <td>{{ amountFormat($model->grand_total) }}</td>
                                            <td>{{ amountFormat($model->paid) }}</td>
                                            <td>{{ amountFormat($model->due) }}</td>


                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right"
                                                         aria-labelledby="dropdownMenu2">
                                                        @if(permissionCheck('invoice.incomes.show'))
                                                            <a href="{{ route('invoice.incomes.show', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                        @endif

                                                        @if(permissionCheck('invoice.incomes.show'))
                                                            <a
                                                               class="dropdown-item edit_brand print_window"
                                                               href="{{ route('invoice.print',$model->id) }}">{{__('common.Print')}}</a>
                                                        @endif

                                                        @if($model->due >  0 and permissionCheck('invoice.payment.add'))
                                                            <a class="dropdown-item edit_brand btn-modal" data-container="payment_modal"
                                                               href="{{ route('invoice.payment.add',$model->id) }}">{{__('finance.Add Payment')}}</a>
                                                        @endif

                                                        @if(permissionCheck('invoice.incomes.edit'))
                                                            <a href="{{ route('invoice.incomes.edit', $model->id) }}"
                                                               class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                        @endif
                                                        @if(permissionCheck('invoice.incomes.destroy'))
                                                            <a href="#" data-id="{{ $model->id }}" data-url="{{ route('invoice.incomes.destroy', $model->id)}}"
                                                               class="dropdown-item delete_item">{{__('common.Delete')}}</a>
                                                            
                                                        @endif


                                                    </div>
                                                </div>


                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                @include('partials.delete_modal')
            </div>
        </div>
    </section>

    <div class="modal fade animated payment_modal infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
         aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
    </div>


@stop


@push('admin.scripts')


    <script>
        $(document).ready(function () {
        });

    </script>
@endpush
