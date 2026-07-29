@extends('admin.master')
@section('title', 'Testimonials')
@section('breadcrumb') <a href="{{ url('admin/testimonial/create') }}" class="btn btn-primary btn-sm">
        Create </a>
@endsection
@section('content')
    <div class="tray tray-center">

        <div class="panel">
            <div class="panel-body ph20">
                <div class="tab-content">
                    <div id="users" class="tab-pane active">
                        <div class="table-responsive mhn20 mvn15">
                            <table class="table admin-form theme-warning fs13">
                                <thead>
                                    <tr class="bg-light">
                                        <th>SN</th>
                                        <th>Photo</th>
                                        <th>Name</th>
                                        {{-- <th>Country</th>
                                        <th>Rating</th>
                                        <th>Featured</th> --}}
                                        <th>Status</th>
                                        <th>Ordering</th>
                                        <th class="text-left">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $row)
                                            <tr class="id{{ $row->id }}">
                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>
                                                <td>
                                                    @if ($row->picture)
                                                        <img src="{{ asset('uploads/testimonials/' . $row->picture) }}"
                                                            width="60" height="60"
                                                            style="object-fit:cover;border-radius:50%;">
                                                    @else
                                                        <img src="{{ asset('themes-assets/images/default/default-profile.jpg') }}"
                                                            width="60" height="60"
                                                            style="object-fit:cover;border-radius:50%;">
                                                    @endif
                                                </td>
                                                <td>
                                                    <strong>
                                                        {{ $row->name }}
                                                    </strong>
                                                </td>
                                                {{-- <td>
                                                    {{ $row->country }}
                                                </td>
                                                <td>
                                                    @for ($i = 1; $i <= $row->rating; $i++)
                                                        ⭐
                                                    @endfor
                                                </td>
                                                <td>
                                                    @if ($row->featured)
                                                        <span class="label label-success">
                                                            Featured
                                                        </span>
                                                    @else
                                                        <span class="label label-default">
                                                            No
                                                        </span>
                                                    @endif
                                                </td> --}}
                                                <td>
                                                    @if ($row->status)
                                                        <span class="text-success">
                                                            Active
                                                        </span>
                                                    @else
                                                        <span class="text-danger">
                                                            Inactive
                                                        </span>
                                                    @endif
                                                </td>
                                                <td>
                                                    {{ $row->sort_order }}
                                                </td>
                                                <td class="text-left">
                                                    <a href="{{ url('admin/testimonial/' . $row->id . '/edit') }}">
                                                        Edit
                                                    </a>
                                                    |
                                                    <a href="#{{ $row->id }}" class="btn-delete">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        jQuery(document).ready(function() {

            $('.btn-delete').on('click', function(e) {

                e.preventDefault();

                if (!confirm('Are you sure to delete?')) {
                    return false;
                }

                var csrf = $('meta[name="csrf-token"]').attr('content');

                var str = $(this).attr('href');

                var id = str.slice(1);

                $.ajax({

                    type: 'DELETE',

                    url: "{{ url('admin/testimonial') . '/' }}" + id,

                    data: {
                        _token: csrf
                    },

                    success: function(data) {

                        $('tbody tr.id' + id).remove();

                    },

                    error: function() {

                        alert('Error occurred!');

                    }

                });

            });

        });
    </script>
@endsection
