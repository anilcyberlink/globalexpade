@extends('admin.master')
@section('title', 'Newsletter Email Templates')
@section('breadcrumb')
<a href="{{ route('newsletter.email.template.create') }}"
   class="btn btn-primary btn-sm">
Add Template
</a>
@endsection
@section('content')
<div class="tray tray-center">
   <div class="panel">
      <div class="panel-body ph20">
         <div class="tab-content">
            <div id="users" class="tab-pane active">
               <div class="table-responsive mhn20 mvn15">
                  <h4>Newsletter Email Templates</h4>
                  <table class="table admin-form theme-warning fs13" id="datatable3">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Title</th>
                           <th>Publish Date</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        @forelse($data as $key => $value)
                        <tr>
                           <td>
                              {{ $key += 1 }}
                           </td>
                           <td>
                              {{ $value->title }}
                           </td>
                           <td>
                              {{ $value->publish_date ?? 'N/A' }}
                           </td>
                           <td>
                              @if($value->is_active)
                              <span class="label label-success">
                              Active
                              </span>
                              @else
                              <span class="label label-danger">
                              Inactive
                              </span>
                              @endif
                           </td>
                           <td>
                              <a href="{{ route('newsletter.email.template.edit', $value->id) }}">
                              Edit
                              </a>
                              |
                              <a href="{{ route('newsletter.email.template.delete', $value->id) }}"
                                 onclick="return confirm('Are you sure you want to delete this template?')">
                              Delete
                              </a>
                           </td>
                        </tr>
                        @empty
                        <tr>
                           <td colspan="5" class="text-center">
                              No templates found.
                           </td>
                        </tr>
                        @endforelse
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
<script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js') }}"></script>
<script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset(env('PUBLIC_PATH') . '/vendor/plugins/datatables/media/js/dataTables.bootstrap.js') }}"></script>
<script type="text/javascript">
   $('#datatable3').dataTable({
   
       "aoColumnDefs": [{
           'bSortable': true,
           'aTargets': [-1]
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
   
</script>
@endsection