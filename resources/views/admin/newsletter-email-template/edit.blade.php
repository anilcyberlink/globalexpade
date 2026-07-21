@extends('admin.master')

@section('title', 'Edit Newsletter')

@section('breadcrumb')
    <a href="{{ route('newsletter.email.template') }}" class="btn btn-primary btn-sm">List</a>
@endsection

@section('content')
    <div class="container" style="overflow-x: hidden;">
        <h1>Edit Newsletter</h1>

        <form action="{{ route('newsletter.email.template.update', $newsletter->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="exampleInputEmail1">Title</label>
                <input
                    type="text"
                    class="form-control"
                    name="title"
                    id="exampleInputEmail1"
                    aria-describedby="emailHelp"
                    placeholder="Enter title"
                    value="{{ old('title', $newsletter->title) }}"
                >
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Content</label>

                <textarea class="form-control my-editor"
                    id="editor2"
                    name="content"
                    rows="50">{{ old('content', $newsletter->content) }}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleCheck1">Publish Date</label>

                <input
                    type="date"
                    name="publish_date"
                    class="form-control"
                    id="exampleCheck1"
                    value="{{ old('publish_date', \Carbon\Carbon::parse($newsletter->publish_date)->format('Y-m-d')) }}"
                >
            </div>
            <hr />
            <button type="submit" class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
@stop