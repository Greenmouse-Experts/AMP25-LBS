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
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="{{URL::asset('assets/images/about.jpg')}}" alt="blog image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Title Here</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus sem, et iaculis odio mollis in. Vestibulum a urna mattis, facilisis dolor in, malesuada nisi.</p>
                        <div class="btn-div">
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="far fa-clock"></i> 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="assets/images/about.jpg" alt="blog image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Title Here</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus sem, et iaculis odio mollis in. Vestibulum a urna mattis, facilisis dolor in, malesuada nisi.</p>
                        <div class="btn-div">
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="far fa-clock"></i> 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="assets/images/about.jpg" alt="blog image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Title Here</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus sem, et iaculis odio mollis in. Vestibulum a urna mattis, facilisis dolor in, malesuada nisi.</p>
                        <div class="btn-div">
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="far fa-clock"></i> 3 mins ago</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 py-3">
                <div class="card">
                    <img src="assets/images/about.jpg" alt="blog image">
                    <div class="card-body">
                        <h5 class="card-title">Blog Title Here</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque malesuada purus sem, et iaculis odio mollis in. Vestibulum a urna mattis, facilisis dolor in, malesuada nisi.</p>
                        <div class="btn-div">
                            <a href="#">Read More</a>
                        </div>
                    </div>
                    <div class="card-footer">
                        <small><i class="far fa-clock"></i> 3 mins ago</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection