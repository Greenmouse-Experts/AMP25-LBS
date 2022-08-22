@extends('layouts.frontend')
<style>
    body {
        background: url(assets/images/Lagos-Business-School-bg.jpg);
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover
    }
</style>

@section('page-content')
<!-- Hero Section -->
<div class="banner_section mt-5 container col-xl-10 col-xxl-8 px-4 py-5">
    <div class="row align-items-center g-lg-5 py-5">
        <div class="hero col-lg-7 text-center text-lg-start">
            <h1 class="fw-bold mb-3 text-primary">AMP25 LBS <br> Alumni Class </h1>
            <p class="mb-4">LBS has become the first institution in West Africa to be accredited by the Association to
                Advance Collegiate Schools of Business</p>
            <a href="/about"><button class="btn btn-primary">Read More</button></a>
        </div>
        <div class="col-md-10 mx-auto col-lg-5">
            <div class="product-card text-center">
                <div class="main-images pb-4">
                    <i class="fas fa-business-time fa-4x"></i>
                </div>
                <div class="shoe-details">
                    <h5 class="fw-bold pb-3">LAGOS BUSINESS SCHOOL</h5>
                    <p class="text-center pb-3">LBS has become the first institution in West Africa to be accredited by the
                        Association to Advance Collegiate Schools of Business</p>
                </div>
                <div class="button">
                    <a href="/contact">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero -->

<!-- Below Hero -->
<div class="container bottom_cards">
    <div class="row ">
        <div class="col-xl-3 col-lg-6 mb-4">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 py-3 px-5">
                    <div class="mb-2">
                        <h5 class="card-title mb-0">Staffs</h5>
                    </div>
                    <div class="row align-items-center d-flex">
                        <div class="col-12">
                            <h2 class="d-flex align-items-center mb-0">
                                3,243
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 py-3 px-5">
                    <div class="mb-2">
                        <h5 class="card-title mb-0">Members</h5>
                    </div>
                    <div class="row align-items-center d-flex">
                        <div class="col-12">
                            <h2 class="d-flex align-items-center mb-0">
                                1,030
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mb-4">
            <div class="card l-bg-cherry">
                <div class="card-statistic-3 py-3 px-5">
                    <div class="mb-2">
                        <h5 class="card-title mb-0">Experience</h5>
                    </div>
                    <div class="row align-items-center d-flex">
                        <div class="col-12">
                            <h2 class="d-flex align-items-center mb-0">
                                20
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 mt-4">
            <a href="#" class="social facebook float-end" title="Facebook"><svg viewBox="0 0 512 512">
                    <path d="M211.9 197.4h-36.7v59.9h36.7V433.1h70.5V256.5h49.2l5.2-59.1h-54.4c0 0 0-22.1 0-33.7 0-13.9 2.8-19.5 16.3-19.5 10.9 0 38.2 0 38.2 0V82.9c0 0-40.2 0-48.8 0 -52.5 0-76.1 23.1-76.1 67.3C211.9 188.8 211.9 197.4 211.9 197.4z" />
                </svg>
            </a>
        </div>
    </div>
</div>
<!-- Below Hero Ends-->
@endsection