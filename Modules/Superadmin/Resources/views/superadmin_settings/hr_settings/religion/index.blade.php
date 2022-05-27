<section class="content">
    <div class="row">
        <div class="col-md-12">
            @component('components.widget', ['class' => 'box-primary', 'title' => __(
            'hr::lang.all_religion')])
            @slot('tool')
            <div class="box-tools">
                <button type="button" class="primary-btn fix-gr-bg btn-modal pull-right" id="add_religion_btn"
                    data-href="{{action('\Modules\HR\Http\Controllers\ReligionController@create')}}"
                    data-container=".religion_model">
                    <i class="fa fa-plus"></i> @lang( 'hr::lang.add' )</button>
            </div>
            @endslot
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="religion_table" style="width: 100%;">
                        <thead>
                            <tr>
                                <th>@lang( 'hr::lang.religion_name' )</th>
                                <th>@lang( 'hr::lang.religion_status' )</th>
                                <th>@lang( 'messages.action' )</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
            @endcomponent
        </div>
    </div>
</section>
<!-- /.content -->