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
                            <h2 class="text-black font-w500 mb-0">View Payments Made</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive ">
                                <table class="table mb-4 dataTablesCard card-table text-black" id="example5">
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