@extends('layouts.admin_frontend')

@section('page-content')

@section('header')
@includeIf('layouts.admin_header')
@endsection

<!--**********************************
				Sidebar start
			***********************************-->
@section('sidebar')
@includeIf('layouts.admin_sidebar')
@endsection
<!--**********************************
				Sidebar end
			***********************************-->

<!--**********************************
				Content body start
			***********************************-->
<div class="content-body">
    <div class="container-fluid">
        <div class="form-head d-flex flex-wrap mb-sm-4 mb-3 align-items-center">
            <div class="mr-auto  d-lg-block mb-3">
                <h2 class="text-black mb-0 font-w500">Dashboard</h2>
                <p class="mb-0">Welcome Back {{Auth::user()->name}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-xxl-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="d-inline-block position-relative donut-chart-sale mr-4">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 51, 242, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
                                <small class="text-black">10%</small>
                            </div>
                            <div class="media-body mr-3">
                                <h2 class="fs-36 text-black font-w700">8</h2>
                                <p class="fs-18 mb-0 text-black font-w500">Payment History</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="d-inline-block position-relative donut-chart-sale mr-4">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 51, 242, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
                                <small class="text-black">10%</small>
                            </div>
                            <div class="media-body mr-3">
                                <h2 class="fs-36 text-black font-w700">8</h2>
                                <p class="fs-18 mb-0 text-black font-w500">Payment History</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-xxl-4 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="d-inline-block position-relative donut-chart-sale mr-4">
                                <span class="donut2" data-peity='{ "fill": ["rgb(246, 67, 67, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>5/8</span>
                                <small class="text-black">2%</small>
                            </div>
                            <div class="media-body ">
                                <h2 class="fs-36 text-black font-w700">2</h2>
                                <p class="fs-18 mb-0 text-black font-w500">Total Notications</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--**********************************
				Content body end
			***********************************-->

<!--**********************************
				Footer start
			***********************************-->
@section('footer')
@includeIf('layouts.admin_footer')
@endsection
<!--**********************************
				Footer end
			***********************************-->
@endsection