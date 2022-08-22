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
                            <h2 class="text-black font-w500 mb-0">View Payment Request</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive ">
                                <table class="table table-responsive-lg mb-4 dataTablesCard card-table text-black" id="example5">
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
                                            <td class="align-enter text-dark font-15" colspan="6">No Payment Request Added.</td>
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
                                                    <a class="contact-icon mr-3" data-toggle="modal" data-target="#delete-{{$donation_due->id}}" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    <div class="modal fade" id="delete-{{$donation_due->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete {{$donation_due->title}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span style="color: #000;">Are you sure, you want to delete this member?</span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('admin.delete.payment.request', Crypt::encrypt($donation_due->id)) }}" class="btn btn-success">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>  
                                    @endforeach
                                    @endif
                                </table>
                            </div>
                        </div>
                        <div class="col-xl-12">
                            <nav aria-label="Page navigation example ">
                                <ul class="pagination pagination-circle mt-3">
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="la la-angle-left"></i></a>
                                    </li>
                                    <li class="page-item active"><a class="page-link" href="javascript:void(0)">1</a>
                                    </li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">2</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">3</a></li>
                                    <li class="page-item"><a class="page-link" href="javascript:void(0)">4</a></li>
                                    <li class="page-item page-indicator">
                                        <a class="page-link" href="javascript:void(0)">
                                            <i class="la la-angle-right"></i>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
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