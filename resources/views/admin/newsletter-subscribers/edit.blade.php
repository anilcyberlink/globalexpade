@extends('admin.master')
@section('title', 'Edit Subscriber')
@section('breadcrumb')
    <a href="{{ route('newsletter.subscribers') }}" class="btn btn-primary btn-sm">
        <i class="fa fa-arrow-left"></i>
        Subscriber List
    </a>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h4 class="panel-title">
                            Edit Newsletter Subscriber
                        </h4>
                    </div>
                    <div class="panel-body">
                        <form action="{{ route('newsletter.subscribers.update') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data->id }}">
                            <!-- Name -->
                            <div class="form-group">
                                <label>
                                    Full Name
                                </label>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{ old('name', $data->name) }}" placeholder="Enter subscriber name">
                                @error('name')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <!-- Email -->
                            <div class="form-group">
                                <label>
                                    Email Address
                                </label>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    value="{{ old('email', $data->email) }}" placeholder="Enter email address">
                                @error('email')
                                    <small class="text-danger">
                                        {{ $message }}
                                    </small>
                                @enderror
                            </div>
                            <!-- Status -->
                            <div class="form-group">
                                <label>
                                    Status
                                </label>
                                <select name="is_active" class="form-control">
                                    <option value="1" {{ $data->is_active ? 'selected' : '' }}>
                                        Active
                                    </option>
                                    <option value="0" {{ !$data->is_active ? 'selected' : '' }}>
                                        Inactive
                                    </option>
                                </select>
                            </div>
                            <!-- Subscribed At -->
                            <div class="form-group">
                                <label>
                                    Subscribed At
                                </label>
                                <input type="text" class="form-control" value="{{ $data->subscribed_at }}" readonly>
                            </div>
                            <!-- Unsubscribed At -->
                            <div class="form-group">
                                <label>
                                    Unsubscribed At
                                </label>
                                <input type="text" class="form-control" value="{{ $data->unsubscribed_at }}" readonly>
                            </div>
                            <hr>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-save"></i>
                                Update Subscriber
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
