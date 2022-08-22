@extends('layouts.frontend')

@section('page-content')
<!-- banner -->
<div class="all-banner">
    <h1>Membership</h1>
</div>

<div class="container py-5">
    <div class="row">
        <!-- Purple Table -->
        <div class="col-md-4">
            <div class="pricing-table purple">
                <!-- Table Head -->
                <h2>Basic Members</h2>
                <h5>Made for starters</h5>
                <!-- Features -->
                <div class="pricing-features">
                    <div class="feature">Lorem ipsum<span>100</span></div>
                    <div class="feature">Lorem ipsum<span>10</span></div>
                    <div class="feature">Lorem ipsum<span>250</span></div>
                    <div class="feature">Lorem ipsum<span>25</span></div>
                    <div class="feature">Lorem ipsum<span>Only Mail</span></div>
                </div>
                <!-- Price -->
                <div class="price-tag">
                    <span class="symbol">₦</span>
                    <span class="amount">5,000</span>
                    <span class="after">/year</span>
                </div>
                <!-- Button -->
                <a class="price-button" href="signup.html">Become A Member</a>
            </div>
        </div>
        <!-- Turquoise Table -->
        <div class="col-md-4">
            <div class="pricing-table turquoise">
                <!-- Table Head -->
                <h2>Intermediate Members</h2>
                <h5>Made for experienced users</h5>
                <!-- Features -->
                <div class="pricing-features">
                    <div class="feature">Lorem ipsum<span>150</span></div>
                    <div class="feature">Lorem ipsum<span>25</span></div>
                    <div class="feature">Lorem ipsum<span>500</span></div>
                    <div class="feature">Lorem ipsum<span>50</span></div>
                    <div class="feature">Lorem ipsum<span>Mail/Phone</span></div>
                </div>
                <!-- Price -->
                <div class="price-tag">
                    <span class="symbol">₦</span>
                    <span class="amount">7,000</span>
                    <span class="after">/year</span>
                </div>
                <!-- Button -->
                <a class="price-button" href="signup.html">Become A Member</a>
            </div>
        </div>
        <!-- Red Table -->
        <div class="col-md-4">
            <div class="pricing-table red">
                <!-- Table Head -->
                <h2>Pro Members</h2>
                <h5>Made for professionals/agencies</h5>
                <!-- Features -->
                <div class="pricing-features">
                    <div class="feature">Lorem ipsum<span>250</span></div>
                    <div class="feature">Lorem ipsum<span>50</span></div>
                    <div class="feature">Lorem ipsum<span>1</span></div>
                    <div class="feature">Lorem ipsum<span>75</span></div>
                    <div class="feature">Lorem ipsum<span>7/24</span></div>
                </div>
                <!-- Price -->
                <div class="price-tag">
                    <span class="symbol">₦</span>
                    <span class="amount">10,000</span>
                    <span class="after">/year</span>
                </div>
                <!-- Button -->
                <a class="price-button" href="signup.html">Become A Member</a>
            </div>
        </div>
    </div>
</div>

@endsection