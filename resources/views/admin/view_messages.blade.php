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
                            <h2 class="text-black font-w500 mb-0">View Messages</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h4 class="card-title">Personnal Notifications/Messages</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($notifications->isEmpty())
                                    <div class="image" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>
                                            No Message/Notification
                                        </span>
                                    </div>
                                    @else
                                    @foreach($notifications as $key => $notification)
                                    @if($notification->status == 'Read')
                                    <div class="image" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>{{$notification->created_at->diffForHumans()}}</span> - {{$notification->from}}
                                        <p style="font-weight: 500;">{{$notification->subject}} <a class="contact-icon mr-3" style="float: right;"><i class="fa fa-eye" aria-hidden="true"> {{$notification->seen}}</i></a></p> 
                                        <p>
                                            {{$notification->message}}
                                        </p>
                                    </div>
                                    @else
                                    <div class="image" style="background: #e9e3e35e; padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>{{$notification->created_at->diffForHumans()}}</span> - {{$notification->from}}
                                        <p style="font-weight: 500;">{{$notification->subject}}  <a class="contact-icon mr-3" style="float: right;"><i class="fa fa-eye" aria-hidden="true"> {{$notification->seen}}</i></a></p> 
                                        <p>
                                            {{$notification->message}}
                                        </p>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
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