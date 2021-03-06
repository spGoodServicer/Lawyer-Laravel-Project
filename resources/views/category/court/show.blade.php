@extends('layouts.master', ['title' => __('court.Court Category Details')])



@section('mainContent')



<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="box_header">
                    <div class="main-title d-flex justify-content-between w-100">
                        <h3 class="mb-0 mr-30">{{ __('court.Court Category') }}</h3>
                    </div>
                </div>
            </div>
                <div class="col-12">
                    <div class="white_box_50px box_shadow_white">
                        <table>
                        <tbody>
                            <tr>
                                <td class="p-2">{{__('court.Name')}} </td>
                                <td>:</td>
                                <td>{{ $model->name }}</td>
                            </tr>
                            <tr>
                                <td class="p-2">{{__('court.Description')}} </td>
                                <td>:</td>
                                <td>{!! $model->description !!}</td>
                            </tr>
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
