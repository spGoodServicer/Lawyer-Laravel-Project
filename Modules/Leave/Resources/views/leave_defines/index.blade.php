@extends('backEnd.master')
@section('mainContent')
    @include("backEnd.partials.alertMessage")
    <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{{ __('leave.Leave Define') }}</h1>
            </div>
            <div class="col-sm-6">
                <button class="btn btn-primary mr-10" onclick="createModalShow()">
                    <i class="ti-plus"></i>{{ __('common.Add New') }} {{ __('leave.Leave Define') }}
                </button>
           </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
    <section class="admin-visitor-area up_st_admin_visitor">

        @include('leave::page-components.create_leave_define')
        @include('leave::page-components.edit_leave_define')
        @include('backEnd.partials.deleteModalAjaxRequest',['item_name' => 'Leave Define'])

        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body" id="leave_define_table">
                                {{-- Leave Define List --}}
                                @include('leave::page-components.leave_define_list')
                            </div>
                        </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')

    <script>
        var baseUrl = $('#app_base_url').val();

        $(document).ready(function () {

            $('#leave_define_create_form').on('submit', function (event) {
                event.preventDefault();
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");

                $.ajax({
                    url: "{{ route('leave_define.store')}}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        $('#leave_define_table').empty()
                        $('#leave_define_table').html(response.TableData)
                        toastr.success('Leave Define hase benn created successfully!')
                        $('#leave_define_add').modal('hide');
                        resetForm();
                        // startDatatable();
                    },
                    error: function (response) {
                        $('#role_id_error').text(response.responseJSON.errors.role_id);
                        $('#leave_type_id_error').text(response.responseJSON.errors.leave_type_id);
                        $('#total_days_error').text(response.responseJSON.errors.total_days);
                        $('#max_forward_error').text(response.responseJSON.errors.max_forward);
                    }

                });
            });

            $('#leave_define_edit_form').on('submit', function (event) {
                event.preventDefault();
                var formElement = $(this).serializeArray()
                var formData = new FormData();
                formElement.forEach(element => {
                    formData.append(element.name, element.value);
                });
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#item_id').val());

                $.ajax({
                    url: "{{ route('leave_define.update')}}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        $('#leave_define_table').empty()
                        $('#leave_define_table').html(response.TableData)
                        toastr.success('Leave Define hase benn updated successfully!')

                        $('#leave_define_edit').modal('hide');
                        resetForm();
                        // startDatatable();
                    },
                    error: function (response) {
                        toastr.error('Something wrong !');
                        $('#role_id_error').text(response.responseJSON.errors.role_id);
                        $('#leave_type_id_error').text(response.responseJSON.errors.leave_type_id);
                        $('#total_days_error').text(response.responseJSON.errors.total_days);
                    }
                });
            });

            $('#deleteItemModal').on('submit', function (event) {
                event.preventDefault();
                var formData = new FormData();
                formData.append('_token', "{{ csrf_token() }}");
                formData.append('id', $('#delete_item_id').val());

                $.ajax({
                    url: "{{ route('leave_define.delete')}}",
                    type: "POST",
                    cache: false,
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function (response) {
                        $('#leave_define_table').empty()
                        $('#leave_define_table').html(response.TableData)
                        // startDatatable();
                        toastr.success('Leave Define has been deleted successfully!')

                        $('#deleteItemModal').modal('hide');
                    },
                    error: function (response) {
                        toastr.error('Something wrong !')
                    }
                });
            });

        });

        function createModalShow() {
            $('#leave_define_add').modal('show');
            resetForm();
        }

        function showDeleteModal(imteId) {
            $('#delete_item_id').val(imteId);
            $('#deleteItemModal').modal('show');
        }

        function editLeaveDefine(item) {
            $('#leave_define_edit').modal('show');
            $('#leave_define_edit_form #item_id').val(item.id);
            $('#leave_define_edit_form #role_id').val(item.role_id);
            $('#leave_define_edit_form #leave_type_id').val(item.leave_type_id);
            $('#leave_define_edit_form #total_days_id').val(item.total_days);
            $('#leave_define_edit_form .max_forward_balance').val(item.max_forward);
            if (item.balance_forward == 1) {
                $('#leave_define_edit_form #status_active').prop("checked", true);
                $('#leave_define_edit_form  .max_forward').show();
            } else {
                $('#leave_define_edit_form #status_active').prop("checked", false);
                $('#leave_define_edit_form .max_forward').hide();
            }
            $('select').select2();
        }

        function resetForm() {
            $('select').select2();
            $('#leave_define_create_form')[0].reset();
            $('#role_id_error').text('');
            $('#leave_type_id_error').text('');
            $('#total_days_error').text('');
        }

        function setMaxForward(selector) {
            if ($(selector).is(':checked')) {
                $('.max_forward').show();
            } else {
                $('.max_forward').hide();
            }
        }

        function checkForwardBalance(selector) {
            let total_days = parseInt($('#total_days_id').val());
            total_days = isNaN(total_days) ? 0 : total_days;
            let forward_balance = parseInt($(selector).val());
            forward_balance = isNaN(forward_balance) ? 0 : forward_balance;

            if (forward_balance > total_days) {
                toastr.warning('{{trans('leave.your entered days exceed the total days')}}');
            }
        }
        function getUserByRole(el) {
            let val = $(el).val();

            $.ajax({
                'method': 'POST',
                'url': '{{route('get.role.users')}}',
                data: {
                    role_id: val,
                    _token: '{{csrf_token()}}',
                },
                success: function (result) {
                    $('#user_id').html(result);
                    $('select').select2();
                }
            });
        }

    </script>
@endpush
