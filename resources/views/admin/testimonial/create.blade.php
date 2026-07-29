@extends('admin.master')
@section('title', 'Create Testimonial')
@section('breadcrumb') <a href="{{ url('admin/testimonial') }}" class="btn btn-primary btn-sm">
        List </a>
@endsection
@section('content')
    <form class="form-horizontal" role="form" action="{{ url('admin/testimonial') }}" method="post"
        enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="col-md-9">
            <div class="panel">
                <div class="panel-heading">
                    <span class="panel-title">
                        New Partners
                    </span>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Name
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Country
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="country" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Title
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="title" class="form-control"
                                placeholder="Amazing Everest Experience">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Trip Name
                        </label>
                        <div class="col-lg-8">
                            <input type="text" name="trip_name" class="form-control">
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
                                <option value="Trekking">
                                    Trekking
                                </option>
                                <option value="Expedition">
                                    Expedition
                                </option>
                                <option value="Peak Climbing">
                                    Peak Climbing
                                </option>
                                <option value="Tour">
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
                                <option value="5">5 Star</option>
                                <option value="4">4 Star</option>
                                <option value="3">3 Star</option>
                                <option value="2">2 Star</option>
                                <option value="1">1 Star</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Testimonial
                        </label>
                        <div class="col-lg-8">
                            <textarea name="testimonial" rows="8" class="form-control"></textarea>
                        </div>
                    </div> --}}
                    <div class="form-group">
                        <label class="col-lg-3 control-label">
                            Picture
                        </label>
                        <div class="col-lg-8">
                            <input type="file" name="picture">
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
                            Status :
                            <a href="avoid:javascript;" data-toggle="collapse" data-target="#publish_1">
                                Active
                            </a>
                        </div>
                    </div>
                    <footer>
                        <div id="publishing-action">
                            <input type="submit" class="btn btn-primary btn-lg" value="Publish" />
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                </div>
                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Ordering</h4>
                        <input type="number" name="sort_order" value="0" class="form-control">
                    </label>
                </div>
                <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Status</h4>
                        <select name="status" class="form-control">
                            <option value="1">
                                Active
                            </option>
                            <option value="0">
                                Inactive
                            </option>
                        </select>
                    </label>
                </div>
                {{-- <div class="sid_bvijay mb10">
                    <label class="field text">
                        <h4>Featured On Homepage</h4>
                        <select name="featured" class="form-control">
                            <option value="0">
                                No
                            </option>
                            <option value="1">
                                Yes
                            </option>
                        </select>
                    </label>
                </div> --}}
            </div>
        </div>

    </form>
@endsection
