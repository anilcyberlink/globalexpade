@extends('admin.master')
@section('title', 'Send Newsletter')
@section('breadcrumb')
    <button type="button" class="btn btn-sm btn-success send-email">
        <i class="fa fa-paper-plane"></i>
        Send Email
    </button>
@endsection
@section('content')
    <div class="row mb20">
        <div class="col-md-6">
            <div class="form-group">
                <label>
                    Select Email Template
                </label>
                <select name="news_id" class="form-control" id="news" style="border-radius:5px !important">
                    <option value="">
                        Choose Email Template
                    </option>
                    @foreach ($emailtemplates as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->title }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="tray tray-center">
        <div class="panel">
            <div class="panel-body">
                  <div class="tab-content">
                    <div class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form theme-warning fs13" id="datatable3">
                                <thead>
                                    <tr>
                                        <th width="60">
                                            <label class="option option-primary">
                                                <input type="checkbox" id="checkAll">
                                                <span class="checkbox"></span>
                                            </label>
                                        </th>
                                        <th>
                                            Name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($subscribers as $subscriber)
                                        <tr>
                                            <td>
                                                <label class="option option-primary">
                                                    <input type="checkbox" class="user-checkbox"
                                                        value="{{ $subscriber->id }}">
                                                    <span class="checkbox"></span>
                                                </label>
                                            </td>
                                            <td>
                                                {{ $subscriber->name ?? 'N/A' }}
                                            </td>
                                            <td>
                                                {{ $subscriber->email }}
                                            </td>
                                            <td>
                                                @if ($subscriber->is_active)
                                                    <span class="label label-success">
                                                        Active
                                                    </span>
                                                @else
                                                    <span class="label label-danger">
                                                        Inactive
                                                    </span>
                                                @endif
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
@stop
@section('libraries')
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/jquery.dataTables.js') }}"></script>
    <script
        src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}">
    </script>
    <script
        src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}">
    </script>
    <script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript">
        $('#datatable3').dataTable({

            "aoColumnDefs": [{
                'bSortable': false,
                'aTargets': [0]
            }],

            "oLanguage": {
                "oPaginate": {
                    "sPrevious": "Previous",
                    "sNext": "Next"
                }
            },

            "iDisplayLength": 10,

            "aLengthMenu": [
                [5, 10, 25, 50, -1],
                [5, 10, 25, 50, "All"]
            ],

            "sDom": '<"dt-panelmenu clearfix"Tfr>t<"dt-panelfooter clearfix"ip>',

            "oTableTools": {

                "sSwfPath": "{{ asset('vendor/plugins/datatables/extensions/TableTools/swf/copy_csv_xls_pdf.swf') }}"
            }
        });

        $("#checkAll").click(function() {
            $('.user-checkbox').prop(
                'checked',
                $(this).prop('checked')
            );
        });

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(".send-email").click(function() {
            let ids = $.map(
                $(".user-checkbox:checked"),
                function(c) {
                    return c.value;
                }
            );

            let news_id = $("#news").val();

            if (news_id == '') {
                toastr.warning(
                    'Please select an email template.'
                );
                return;
            }

            if (ids.length <= 0) {
                toastr.warning(
                    'Please select at least one subscriber.'
                );
                return;
            }

            $('.send-email')
                .prop('disabled', true)
                .html(
                    '<i class="fa fa-spinner fa-spin"></i> Sending...'
                );

            $.ajax({
                type: 'POST',
                url: "{{ route('ajax.newsletter.send') }}",
                data: {
                    ids: ids,
                    news_id: news_id
                },

                success: function(data) {
                    toastr.success(
                        data.success
                    );

                    $('.send-email')
                        .prop('disabled', false)
                        .html(
                            '<i class="fa fa-paper-plane"></i> Send Email'
                        );
                },

                error: function() {
                    toastr.error(
                        'Unable to send newsletter.'
                    );

                    $('.send-email')
                        .prop('disabled', false)
                        .html(
                            '<i class="fa fa-paper-plane"></i> Send Email'
                        );
                }
            });

        });
    </script>
@stop
