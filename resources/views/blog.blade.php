@extends('layouts.frontend')

@section('page-content')
<!-- banner -->
<div class="all-banner">
    <h1>Blog</h1>
</div>

<!--Blog Section-->
<section class="blog-section">
    <div class="container">
        <!--First Row-->
        <div class="row">
            @foreach($blogs as $blog)
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="/storage/blogs/{{$blog->image}}" alt="blog image">
                    <div class="card-body">
                        <h5 class="card-title">{{$blog->title}}</h5>
                        <p class="card-text">{{$blog->description}}</p>
                        <div class="btn-div">
                            <a href="{{ route('blogPost', Crypt::encrypt($blog->id)) }}">Read More</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="far fa-clock"></i>{{$blog->created_at->diffForHumans()}}</small>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection