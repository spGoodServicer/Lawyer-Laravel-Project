@extends('layouts.master', ['title' => __('client.'.$from)])

@section('mainContent')


    <section class="admin-visitor-area up_st_admin_visitor">
        <div class="container-fluid pt-3">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="box_header common_table_header xs_mb_0">
                        <div class="main-title d-md-flex">
                            <h3 class="mb-0 mr-30 mb_xs_15px mb_sm_20px" >
                                {{ __('client.'.$from) }}
                            </h3>
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
                                        <th scope="col">{{ __('case.Case') }}</th>
                                        <th scope="col">{{ __('case.Client') }}</th>
                                        <th scope="col">{{ __('case.Details') }}</th>
                                        <th scope="col">{{ __('common.Actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($models as $model)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <b>{{ __('case.Case No.') }}: </b>
                                                {{$model->case_category? $model->case_category->name : '' }}/{{$model->case_no}} <br>
                                                @if($model->case_category_id)
                                                    <b>{{ __('case.Category') }}:
                                                        </b> {{$model->case_category? $model->case_category->name : '' }}
                                                @else
                                                    <b>{{ __('case.Category') }}: </b>
                                                    {{$model->case_category? $model->case_category->name : '' }}
                                                @endif<br>
                                                <a href="{{ route('client.case.show', $model->id) }}"><b>{{ __('case.Title') }}: </b>{{ $model->title }}
                                                </a>
                                                <br>
                                                <b>{{ __('case.Next Hearing Date') }}: </b> {{ formatDate($model->hearing_date) }} <br>
                                                <b>{{ __('case.Filing Date') }}: </b> {{formatDate($model->filling_date)}}
                                            </td>
                                            <td>
                                                @if($model->client == 'Plaintiff' and $model->plaintiff_client)
                                                    <b>{{ __('case.Name') }}</b>:
                                                        {{ $model->plaintiff_client->name }} <br>
                                                    <b>{{ __('case.Mobile') }}: </b> {{ $model->plaintiff_client->mobile }} <br>
                                                    <b>{{ __('case.Email') }}: </b> {{ $model->plaintiff_client->email }} <br>
                                                    <b>{{ __('case.Address') }}: </b> {{ $model->plaintiff_client->address }}
                                                    {{ $model->plaintiff_client->city ? ', '. $model->plaintiff_client->city->name : '' }}
                                                    {{ $model->plaintiff_client->state ? ', '. $model->plaintiff_client->state->name : '' }}
                                                @elseif($model->client == 'Opposite' and $model->opposite_client)
                                                    <b>{{ __('case.Name') }}</b>:
                                                        {{ $model->opposite_client->name }} <br>
                                                    <b>{{ __('case.Mobile') }}: </b> {{ $model->opposite_client->mobile }} <br>
                                                    <b>{{ __('case.Email') }}: </b> {{ $model->opposite_client->email }} <br>
                                                    <b>{{ __('case.Address') }}: </b> {{ $model->opposite_client->address }}
                                                    {{ $model->opposite_client->city ? ', '. $model->opposite_client->city->name : '' }}
                                                    {{ $model->opposite_client->state ? ', '. $model->opposite_client->state->name : '' }}
                                                @endif
                                            </td>
                                            <td>
                                                @if($model->court)
                                                   <b>{{ __('case.Court') }}</b>:
                                                        {{ $model->court->name}} <br>
                                                    <b>{{ __('case.Category') }}</b>:
                                                        {{ $model->court->court_category ? $model->court->court_category->name : '' }}
                                                   <br>
                                                    <b>{{ __('case.Room No') }}: </b> {{ $model->court->room_number }} <br>
                                                    <b>{{ __('case.Address') }}: </b> {{ $model->court->location }}
                                                    {{ $model->court->city ? ', '. $model->court->city->name : '' }}
                                                    {{ $model->court->state ? ', '. $model->court->state->name : '' }}
                                                @endif
                                            </td>


                                            <td>


                                                <div class="dropdown CRM_dropdown">
                                                    <button class="primary-btn fix-gr-bg dropdown-toggle" type="button"
                                                            id="dropdownMenu2" data-toggle="dropdown"
                                                            aria-haspopup="true"
                                                            aria-expanded="false">
                                                        {{ __('common.Select') }}
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                                        <a href="{{ route('client.case.show', $model->id) }}" class="dropdown-item"><i
                                                                class="icon-file-eye"></i> {{ __
                                                            ('common.View') }}</a>
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
            </div>
        </div>
    </section>

@stop
@push('admin.scripts')
    <script>


    </script>
@endpush
