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
                            <h2 class="text-black font-w500 mb-0">View Donations/Dues</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive ">
                                <table class="table display compact table table-striped table-bordered mb-4 text-black" id="example5">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Amount</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @if($donation_dues->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="6">No Donation/Due Added.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($donation_dues as $key => $donation_due)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$donation_due->title}}</td>
                                            <td class="text-black">{{$donation_due->description}}</td>
                                            <td class="text-black">₦{{number_format($donation_due->amount, 2)}}</td>
                                            <td>{{$donation_due->created_at->diffForHumans()}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <!-- <form method="POST" action=""> -->
                                                    <form method="POST" action="{{ route('payment', Crypt::encrypt($donation_due->id)) }}">
                                                        @csrf
                                                        <button type="submit" class="btn btn-primary btn-round btn-xs" style="cursor: pointer">Make Payment</button>
                                                    </form>    
                                                </div>
                                            </td>
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