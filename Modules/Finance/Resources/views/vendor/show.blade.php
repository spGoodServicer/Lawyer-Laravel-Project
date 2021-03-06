@extends('finance::layouts.master', ['title' => __('vendor.Vendor Details')])
@section('mainContent')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ __('vendor.Vendor Details') }}</h1>
        </div>
        <div class="col-sm-6">

       </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<section class="mb-40 student-details">
        @if(session()->has('message-success'))
            <div class="alert alert-success">
                {{ session()->get('message-success') }}
            </div>
        @elseif(session()->has('message-danger'))
            <div class="alert alert-danger">
                {{ session()->get('message-danger') }}
            </div>
        @endif
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-3">
                    <div class="card">
                        <div class="card-header"></div>

                        <div class="card-body">
                            <div class="single-meta mt-10">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('vendor.Name') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($model)){{@$model->name}}@endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('vendor.Mobile') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($model)){{@$model->mobile}}@endif
                                    </div>
                                </div>
                            </div>

                            <div class="single-meta">
                                <div class="d-flex justify-content-between">
                                    <div class="name">
                                        {{ __('vendor.Email') }}
                                    </div>
                                    <div class="value">
                                        @if(isset($model)){{@$model->email}}@endif
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- End Student Meta Information -->
                </div>
                <!-- Start Student Details -->
                <div class="col-lg-9 staff-details">
                    <ul class="nav nav-tabs tabs_scroll_nav" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" href="#studentProfile" role="tab"
                               data-toggle="tab">{{ __('vendor.Profile') }}</a>
                        </li>
                        @if(moduleStatusCheck('Finance'))
                            <li class="nav-item">
                                <a class="nav-link" href="#invoicesTab" role="tab"
                                   data-toggle="tab">{{ __('finance.Invoices') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="#transactionsTab" role="tab"
                                   data-toggle="tab">{{ __('finance.Transactions') }}</a>
                            </li>
                        @endif

                        <li class="nav-item edit-button">
                            <a href="{{ route('vendors.edit', $model->id) }}" class="btn btn-sm btn-primary"
                            >{{ __('common.Edit') }}
                            </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start Profile Tab -->
                        <div role="tabpanel" class="tab-pane fade show active" id="studentProfile">
                            <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-5 col-md-5">
                                        <div class="">
                                            {{ __('vendor.Name') }}
                                        </div>
                                    </div>
                                    <div class="col-lg-7 col-md-6">
                                        <div class="">
                                            @if(isset($model)){{$model->name}}@endif
                                        </div>
                                    </div>
                                </div>

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.Mobile') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->mobile}}@endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.Email') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->email}}@endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.Address') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){{$model->address}}@endif
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.Country') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $model->country ? $model->country->name : '' }}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.State') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $model->state ? $model->state->name : '' }}
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.City') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                {{ $model->city ? $model->city->name : '' }}
                                            </div>
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="col-lg-5 col-md-5">
                                            <div class="">
                                                {{ __('vendor.Description') }}
                                            </div>
                                        </div>
                                        <div class="col-lg-7 col-md-6">
                                            <div class="">
                                                @if(isset($model)){!! $model->description !!}@endif
                                            </div>
                                        </div>
                                    </div>


                                @if(moduleStatusCheck('CustomField') and $model->customFields)
                                    @includeIf('customfield::details.show', ['customFields' => $model->customFields])
                                @endif


                            </div>
                            </div>
                        </div>

                        @if(moduleStatusCheck('Finance'))
                            <div role="tabpanel" class="tab-pane fade" id="invoicesTab">
                                <div class="card">
                                    <div class="card-body ">
                                        <table class="check_box_table table table-sm table-striped">
                                            <thead>
                                            <tr>
                                                <th scope="col">{{ __('common.SL') }}</th>
                                                <th>{{ __('finance.Date') }}</th>
                                                <th>{{ __('finance.Invoice No') }}</th>
                                                <th>{{ __('case.Case') }}</th>
                                                <th>{{ __('finance.Total Amount') }}</th>
                                                <th>{{ __('finance.Paid') }}</th>
                                                <th>{{ __('finance.Due') }}</th>
                                                <th class="d-print-none text-center">{{ __('common.Actions') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($model->invoices as $invoice)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>
                                                        {{ formatDate($invoice->transaction_date) }}
                                                    </td>
                                                    <td>
                                                        <a href="{{ route('invoice.incomes.show', $invoice->id) }}"
                                                           target="_blank"> {{ $invoice->invoice_no }} </a>
                                                    </td>
                                                    <td>

                                                        @if($invoice->case)
                                                            <a href="{{ route('case.show', $invoice->case_id) }}"
                                                               target="_blank">{{ $invoice->case->title }}</a>
                                                        @endif
                                                    </td>
                                                    <td>{{ amountFormat($invoice->grand_total) }}</td>
                                                    <td>{{ amountFormat($invoice->paid) }}</td>
                                                    <td>{{ amountFormat($invoice->due) }}</td>


                                                    <td class="d-print-none text-center">

                                                        <div class="dropdown CRM_dropdown">
                                                            <button class="btn btn-primary dropdown-toggle"
                                                                    type="button"
                                                                    id="dropdownMenu2" data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                {{ __('common.Select') }}
                                                            </button>
                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                 aria-labelledby="dropdownMenu2">
                                                                @if(permissionCheck('invoice.incomes.show'))
                                                                    <a href="{{ route('invoice.incomes.show', $invoice->id) }}"
                                                                       class="dropdown-item edit_brand">{{__('common.Show')}}</a>
                                                                @endif

                                                                @if(permissionCheck('invoice.incomes.show'))
                                                                    <a
                                                                        class="dropdown-item edit_brand print_window"
                                                                        href="{{ route('invoice.print',$invoice->id) }}">{{__('common.Print')}}</a>
                                                                @endif

                                                                @if($invoice->due >  0 and permissionCheck('invoice.payment.add'))
                                                                    <a class="dropdown-item edit_brand btn-modal"
                                                                       data-container="payment_modal"
                                                                       href="{{ route('invoice.payment.add',$invoice->id) }}">{{__('finance.Add Payment')}}</a>
                                                                @endif

                                                                @if(permissionCheck('invoice.incomes.edit'))
                                                                    <a href="{{ route('invoice.incomes.edit', $invoice->id) }}"
                                                                       class="dropdown-item edit_brand">{{__('common.Edit')}}</a>
                                                                @endif
                                                                @if(permissionCheck('invoice.incomes.destroy'))
                                                                    <a href="#"
                                                                        data-id="{{ $invoice->id }}"
                                                                          data-url="{{ route('invoice.incomes.destroy', $invoice->id)}}"
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

                            <div role="tabpanel" class="tab-pane fade" id="transactionsTab">
                                <div class="white-box">

                                    @php
                                        $model->invoice_type = 'expense'
                                    @endphp
                                    @includeIf('finance::invoice.payment_table', ['dataTable' => 'Crm_table_active'])
                                </div>
                            </div>
                        @endif


                    </div>
                </div>
            </div>
        </div>
    </section>

    @if(moduleStatusCheck('Finance'))
        <div class="modal fade animated payment_modal infix_biz_modal" id="remote_modal" tabindex="-1" role="dialog"
             aria-labelledby="remote_modal_label" aria-hidden="true" data-backdrop="static">
        </div>
    @endif

@endsection
@push('admin.scripts')
    <script type="text/javascript">

    </script>
@endpush

