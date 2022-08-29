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
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="d-inline-block position-relative donut-chart-sale mr-4">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 51, 242, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
                                <small class="text-black">{{$total_members->count()}}%</small>
                            </div>
                            <div class="media-body mr-3">
                                <h2 class="fs-36 text-black font-w700">{{$total_members->count()}}</h2>
                                <p class="fs-18 mb-0 text-black font-w500">Total Members</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-xxl-6 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="media align-items-center">
                            <div class="d-inline-block position-relative donut-chart-sale mr-4">
                                <span class="donut2" data-peity='{ "fill": ["rgb(30, 51, 242, 1)", "rgba(241, 241, 241,1)"],   "innerRadius": 45, "radius": 10}'>3/8</span>
                                <small class="text-black">{{$donation_dues->count()}}%</small>
                            </div>
                            <div class="media-body mr-3">
                                <h2 class="fs-36 text-black font-w700">{{$donation_dues->count()}}</h2>
                                <p class="fs-18 mb-0 text-black font-w500">Total Donations/Dues</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-12">
                <h4 style="color: #000;">Member's Payments</h4>
                <div class="table-responsive ">
                    <table class="table mb-4 dataTablesCard card-table text-black">
                        <thead>
                            <tr>
                                <th>S/N</th>
                                <th>Membership ID</th>
                                <th>Donation/Due Title</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Transaction ID</th>
                                <th>Reference ID</th>
                                <th>Paid At</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        @if($payments->isEmpty())
                        <tbody>
                            <tr>
                                <td class="align-enter text-dark font-15" colspan="9">No Payments.</td>
                            </tr>
                        </tbody>
                        @else
                        @foreach($payments as $key => $payment)
                        <tbody>
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$payment->membership_id}}</td>
                                <td>{{$payment->donation_due_title}}</td>
                                <td>{{$payment->name}}</td>
                                <td>₦{{number_format($payment->amount, 2)}}</td>
                                <td>{{$payment->transaction_id}}</td>
                                <td>{{$payment->ref_id}}</td>
                                <td>{{$payment->paid_at}}</td>
                                <td><span style="color: green">{{$payment->status}}</span></td>
                            </tr>
                        </tbody>  
                        @endforeach
                        @endif
                    </table>
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