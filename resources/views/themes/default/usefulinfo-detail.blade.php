@extends('themes.default.common.master')
@section('title', $data->page_title)
@section('brief', $data->page_excerpt)
@section('thumbnail', $data->page_thumbnail)
@section('meta_keyword', $data->meta_keyword)
@section('meta_description', $data->meta_description)
@section('content')

    <div class="detail-trip-header d-flex justify-content-end flex-column"
        @if(!empty($data->page_banner))
            style="background-image: url('{{ asset('uploads/banners/'.$data->page_banner) }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;"
        @endif
    >
        <div class="section-padding">
            <p class="page-title--secondary">
                <a href="{{ url('/') }}">Home</a> • <a class="active-list">{{ $data->page_title }}</a>
            </p>
            <h1 class="header-font">{{ $data->sub_title }}</h1>
            <p class="small-header-font"></p>
        </div>
    </div>

    <div class="container section-padding">
        <div class="row">
            <div class="col-lg-8">
                <div class="detail-thumbnail">
                    <img src="{{ $data->page_thumbnail ? asset('uploads/original/'.$data->page_thumbnail) : asset('themes-assets/img/list/1.jpg') }}" alt="{{ $data->page_title }}" class="img-fluid rounded">
                </div>

                <div class="detail-content mt-4">
                    {!!$data->page_excerpt!!}
                </div>
                <div class="detail-content mt-4">
                    {!! $data->page_content !!}
                </div>
                <!-- gear list added -->
                @if($doc->count() > 0)
                    <div class="doc-grid">
                        @foreach($doc as $row)
                            <a class="doc-card" target="_blank" href="{{ asset('uploads/doc/' . $row->document) }}">
                                <div class="doc-card-image">
                                    @if($row->thumbnail)
                                        <img src="{{ asset('uploads/original/' . $row->thumbnail) }}" alt="{{ $row->title }}">
                                    @else
                                        <img src="{{ asset('themes-assets/images/blank.png') }}" alt="{{ $row->title }}">
                                    @endif
                                    <div class="doc-card-overlay"></div>
                                    <div class="doc-card-title">
                                        <h4>{{ $row->title }}</h4>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="col-lg-4">
                <div class="related-links-sidebar">
                    <h4 class="sidebar-title">Related Info</h4>
                    <ul class="related-links-list">
                        @foreach($links as $row)
                            <li><a href="{{url('info/'.$row->uri)}}">{{$row->page_type}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
