@extends('admin.master')
@section('title', 'Create Subscriber')
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
                  Create Newsletter Subscriber
               </h4>
            </div>
            <div class="panel-body">
               <form action="{{ route('newsletter.subscribers.store') }}" method="POST">
                  @csrf
                  <!-- Name -->
                  <div class="form-group">
                     <label>
                     Full Name
                     </label>
                     <input type="text" name="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        placeholder="Enter subscriber name">
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
                        class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                        placeholder="Enter email address">
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
                        <option value="1">
                           Active
                        </option>
                        <option value="0">
                           Inactive
                        </option>
                     </select>
                  </div>
                  <hr>
                  <button type="submit" class="btn btn-primary">
                  <i class="fa fa-save"></i>
                  Save Subscriber
                  </button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection