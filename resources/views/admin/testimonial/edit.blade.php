@extends('admin.master')
@section('title', 'Edit Testimonial')
@section('breadcrumb') <a href="{{ url('admin/testimonial') }}" class="btn btn-primary btn-sm">
        List </a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ url('admin/testimonial/' . $data->id) }}" method="post"
        enctype="multipart/form-data">

        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT" />
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        Edit Testimonial
                    </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Name
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control" value="{{ $data->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Country
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="country" class="form-control" value="{{ $data->country }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Title
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="title" class="form-control" value="{{ $data->title }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Trip Name
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="trip_name" class="form-control" value="{{ $data->trip_name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Trip Type
                        </label>
                        <div class="col-lg-8">
                            <select name="trip_type" class="form-control">
                                <option value="">
                                    Select Trip Type
                                </option>
                                <option value="Trekking" {{ $data->trip_type == 'Trekking' ? 'selected' : '' }}>
                                    Trekking
                                </option>
                                <option value="Expedition" {{ $data->trip_type == 'Expedition' ? 'selected' : '' }}>
                                    Expedition
                                </option>
                                <option value="Peak Climbing" {{ $data->trip_type == 'Peak Climbing' ? 'selected' : '' }}>
                                    Peak Climbing
                                </option>
                                <option value="Tour" {{ $data->trip_type == 'Tour' ? 'selected' : '' }}>
                                    Tour
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Rating
                        </label>
                        <div class="col-lg-8">
                            <select name="rating" class="form-control">
                                @for ($i = 5; $i >= 1; $i--)
                                    <option value="{{ $i }}" {{ $data->rating == $i ? 'selected' : '' }}>
                                        {{ $i }} Star
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Testimonial
                        </label>
                        <div class="col-lg-8">
                            <textarea name="testimonial" rows="8" class="form-control">{{ $data->testimonial }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Picture
                        </label>
                        <div class="col-lg-8">
                            <input type="file" name="picture" />
                            @if ($data->picture)
                                <span class="id{{ $data->id }}">
                                    <a href="#{{ $data->id }}" class="imagedelete">
                                        X
                                    </a>
                                    <br><br>
                                    <img src="{{ asset('uploads/testimonials/' . $data->picture) }}" width="150">
                                    <hr>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="admin-form">
                <div class="sid_bvijay mb10">
                    <div class="hd_show_con">
                        <div class="publice_edi">
                            Status:
                            <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                                Active
                            </a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Update" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                </div>
                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Ordering</h4>
                        <input type="number" name="sort_order" class="form-control" value="{{ $data->sort_order }}">
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Status</h4>
                        <select name="status" class="form-control">
                            <option value="1" {{ $data->status == 1 ? 'selected' : '' }}>
                                Active
                            </option>
                            <option value="0" {{ $data->status == 0 ? 'selected' : '' }}>
                                Inactive
                            </option>
                        </select>
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Featured On Homepage</h4>
                        <select name="featured" class="form-control">
                            <option value="0" {{ $data->featured == 0 ? 'selected' : '' }}>
                                No
                            </option>
                            <option value="1" {{ $data->featured == 1 ? 'selected' : '' }}>
                                Yes
                            </option>
                        </select>
                    </label>
                </div>
            </div>
        </div>

    </form>
@endsection
@section('libraries')
    <script>
        $('.imagedelete').on('click', function(e) {

            e.preventDefault();

            if (!confirm('Are you sure to delete?')) {
                return false;
            }

            var csrf = $('meta[name="csrf-token"]').attr('content');

            var str = $(this).attr('href');

            var id = str.slice(1);

            $.ajax({

                type: 'DELETE',

                url: "{{ url('delete_testimonial_picture') . '/' }}" + id,

                data: {
                    _token: csrf
                },

                success: function(data) {

                    $('span.id' + id).remove();

                    jQuery.each(data.errors, function(key, value) {

                        toastr.success(value);

                    });

                },

                error: function() {

                    alert('Error occurred!');

                }

            });

        });
    </script>
@endsection
@section('scripts')
    <script></script>
@endsection
