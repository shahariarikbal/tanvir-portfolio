@extends('frontend.master')

@section('content')
    {{-- Banner --}}
    <section class="banner-section">
        <div class="container">
            <div class="banner-content-wrapper">
                <h1 class="banner-title">Blog Details</h1>
                <ul class="banner-item">
                    <li>
                        <a href="https://mdjamalmia.com/">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Home
                        </a>
                    </li>
                    <li class="active">
                        <a href="javascript:void(0)">
                            Blog Details
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    {{-- /Banner --}}
    <section class="blog-details-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-details-wrapper">
                        <div class="blog-details-image">
                           <img src="{{ asset('/blog/'. $blog->image) }}">
                        </div>
                        <div class="blog-details-contant">
                            <h5 class="blog-item-name">{{ $blog->title }}</h5>
                            <p class="text">
                                {!! $blog->description !!}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="recent-blog-wrapper">
                        <div class="recent-blog-title-inner">
                            <h3 class="title">
                                Recent Blog
                            </h3>
                        </div>
                        @foreach($data['blogs'] as $blog)
                        <div class="recent-blog-outer">
                            <div class="recent-blog-image-inner">
                                <a href="{{ url('/blog/details/'.$blog->id) }}" class="recent-blog-image">
                                    <img src="{{ asset('/blog/'.$blog->image) }}" class="recent-blog-img">
                                </a>
                            </div>
                            <div class="recent-blog-content">
                                <h4 class="recent-blog-content-title">
                                    <a href="{{ url('/blog/details/'.$blog->id) }}" class="recent-blog-title">
                                        {{ $blog->title }}
                                    </a>
                                </h4>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
