@extends('layouts.dashboard_frontend')

@section('page-content')

@section('header')
@includeIf('layouts.dashboard_header')
@endsection

<!--**********************************
				Sidebar start
			***********************************-->
@section('sidebar')
@includeIf('layouts.dashboard_sidebar')
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
                            <h2 class="text-black font-w500 mb-0">View Payments</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive ">
                                <table class="table display compact table table-striped table-bordered mb-4 text-black" id="example5">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Due Title</th>
                                            <th>Amount</th>
                                            <th>Transaction ID</th>
                                            <th>Ref ID</th>
                                            <th>Paid At</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    @if($payments->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="7">No Payments.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($payments as $key => $payment)
                                    <tbody>
                                        <tr>
                                            <td class="pr-0">{{$loop->iteration}}</td>
                                            <td>{{$payment->donation_due_title}}</td>
                                            <td class="text-black">₦{{number_format($payment->amount, 2)}}</td>
                                            <td class="text-black">{{$payment->transaction_id}}</td>
                                            <td class="text-black">{{$payment->ref_id}}</td>
                                            <td class="text-black">{{$payment->paid_at}}</td>
                                            <td class="text-success">{{$payment->status}}</td>
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
@includeIf('layouts.dashboard_footer')
@endsection
<!--**********************************
				Footer end
			***********************************-->
@endsection