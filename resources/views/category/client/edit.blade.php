@extends('layouts.master', ['title' => __('client.Update Client Category')])
@section('mainContent')
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>{{ __('client.New Client Category') }}</h1>
      </div>
      <div class="col-sm-6">
        
     </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
<section class="admin-visitor-area up_st_admin_visitor">
    <div class="container-fluid pt-3">
        <div class="row justify-content-center">
          <div class="col-12">
            <div class="col-12">
              <div class="card">
                <!--div class="card-header">
                  <h3 class="card-title"></h3>
                </div-->
                <div class="card-body">
                  {!! Form::model($model, ['route' => ['category.client.update', $model->id], 'class' =>
                        'form-validate-jquery',
                        'id' => 'content_form', 'method' => 'PUT']) !!}
                        <div class="primary_input">
                            {{Form::label('name', __('client.Name'),['class' => 'required'])}}
                            {{Form::text('name', null, ['required' => '', 'class' => 'form-control', 'placeholder' => __
                            ('Client Category Name')])}}
                        </div>

                        <div class="primary_input">
                            {{Form::label('description', __('client.Description'))}}
                            {{Form::textarea('description', null, ['class' => 'form-control', 'placeholder' =>
                            __('client.Client Category Description'), 'rows' => 5 ])}}
                        </div>
                        <div class="primary_input mt-3">
                            {{Form::label('description', __('client.Business Type'))}}
                            <div class="form-group">
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" value="0" id="generalRadio" name="businessRadio" @if($model->business_type==0) checked @endif>
                                  <label for="generalRadio" class="custom-control-label">{{ __('client.General') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" value="1" id="plaintiffRadio" name="businessRadio" @if($model->business_type==1) checked @endif>
                                  <label for="plaintiffRadio" class="custom-control-label">{{ __('client.Plaintiff') }}</label>
                                </div>
                                <div class="custom-control custom-radio">
                                  <input class="custom-control-input" type="radio" value="2" id="oppositeRadio" name="businessRadio" @if($model->business_type==2) checked @endif>
                                  <label for="oppositeRadio" class="custom-control-label">{{ __('client.Opposite') }}</label>
                                </div>
                            </div>
                        </div>
                       
                       <div class="text-center ">
                       <button class="btn btn-primary submit" type="submit"><i class="ti-check"></i>{{ __('common.Update') }}
                    </button>

                    <button class="btn btn-primary submitting" type="submit" disabled style="display: none;"><i class="ti-check"></i>{{ __('common.Updating') . '...' }}
                    </button>
                        </div>
                        {!! Form::close() !!}
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
        $(document).ready(function () {
            _formValidation();
            $("#checkbox_plaintiff").change(function(){
                if($(this).prop('checked')==true)
                    $("#checkbox_general").prop('checked',false);
            });
        });
    </script>
@endpush

