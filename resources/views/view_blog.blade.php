@extends('layouts.frontend')

@section('page-content')
<!--Blog Post Section-->
<section class="blog-post">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="body-div">
                            <h2>{{$blog->title}}</h2>
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <img src="/storage/blogs/{{$blog->image}}" class="blog-image" alt="blog image">
                                </div>
                                <div class="col-lg-2"></div>
                            </div>
                            <div class="row blog-text">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10">
                                    <p>
                                        {{$blog->description}}
                                    </p>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                            <div class="row share-social">
                                <div class="col-lg-1"></div>
                                <div class="col-lg-10 border-top-div">
                                    <a>Share:</a>
                                    <a href="" title="Share on Facebook"><i class="fab fa-facebook"></i></a>
                                    <a href="" title="Share on Twitter"><i class="fab fa-twitter"></i></a>
                                    <a href="" title="Share on Whatsapp"><i class="fab fa-whatsapp"></i></a>
                                </div>
                                <div class="col-lg-1"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--Blog Post Section Ends-->

<!--Blog Section-->
<section class="blog-section blog-section-post">
    <div class="container">
        <!--First Row-->
        <div class="row">
            <div class="col-lg-12">
                <h1>More Posts</h1>
            </div>
            @foreach($blogs as $moreblog)
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="/storage/blogs/{{$moreblog->image}}" alt="blog image">
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