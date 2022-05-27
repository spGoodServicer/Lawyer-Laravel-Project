<div class="modal-dialog" role="document" style="width: 55%;">
  <div class="modal-content">

    {!! Form::open(['url' => action('\Modules\HR\Http\Controllers\SalrayGradeController@store'), 'method' =>
    'post', 'id' => 'salary_grade_form' ])
    !!}
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
          aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">@lang( 'hr::lang.add_salary_grade' )</h4>
    </div>

    <div class="modal-body">
      <div class="col-md-12">
        <div class="form-group">
          {!! Form::label('grade_name', __( 'hr::lang.grade_name' )) !!}
          {!! Form::text('grade_name', null, ['class' => 'form-control', 'required', 'placeholder' =>
          __( 'hr::lang.grade_name')]);
          !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('min_salary', __( 'hr::lang.min_salary' )) !!}
          {!! Form::text('min_salary', null, ['class' => 'form-control input_number', 'required', 'placeholder' =>
          __( 'hr::lang.min_salary')]);
          !!}
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          {!! Form::label('max_salary', __( 'hr::lang.max_salary' )) !!}
          {!! Form::text('max_salary', null, ['class' => 'form-control input_number', 'required', 'placeholder' =>
          __( 'hr::lang.max_salary')]);
          !!}
        </div>
      </div>

    <div class="clearfix"></div>

    <div class="modal-footer">
      <button type="submit" class="primary-btn fix-gr-bg" id="save_salary_grade_btn">@lang( 'messages.save' )</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">@lang( 'messages.close' )</button>
    </div>

    {!! Form::close() !!}

  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->

<script>
  $('#start_date').datepicker("setDate" , new Date());
  $('#end_date').datepicker("setDate" , new Date());
</script>