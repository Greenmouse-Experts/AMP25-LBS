@extends('layouts.frontend')

@section('page-content')
<!-- banner -->
<div class="all-banner">
    <h1>About Us</h1>
</div>

<!--About Section-->
<section class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-center">
                <img src="assets/images/about.jpg" alt="image">
            </div>
            <div class="col-lg-6">
                <div class="about-note">
                    <h3>Who We Are</h3>
                    <ul class="about_list">
                        <li><i class="fas fa-check-circle"></i> AMP 25 is an extension of the prestigious Lagos Business School Alumni Association. We are a group of 48 (pls check the correctness of the class number as of when we started or graduated) corporate executives (leaders?) brought together since 2012 by sheer Providence of the Almighty God to undertake the 25th edition of the Advanced Management Programme of the school. Since then, we’ve all stuck together and pursing common interests</li>
                        <li><i class="fas fa-check-circle"></i> LBS AMP 25 is a strong, close-knit community of business leaders who are committed to lifting up one another and also making a significant impact in the larger society.</li>
                        <li><i class="fas fa-check-circle"></i>As part of our efforts to giving practical expression to what LBS taught us, we maintain interests in diverse businesses categories. </li>
                        <h3>Our Vision</h3>
                    </ul>
                    <p>Our vision is to help in making the world a better place by helping the underprivileged, particularly in Nigeria; fulfil their God-given purpose in life</p>
                    <h3 style="margin-bottom: 40px;">Our Mission</h3>
                    <p>Our mission is to extend the frontiers of influence of our Alma Mater, the LBS. We hope to leverage our network to create synergistic value for ourselves and the society at large. </p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--About Section Ends-->
@endsection