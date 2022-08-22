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
                            <h2 class="text-black font-w500 mb-0">Messages / Notification</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h4 class="card-title">Personnal Notifications/Messages</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($personal_notifications->isEmpty())
                                    <div class="image" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>
                                            No Message/Notification
                                        </span>
                                    </div>
                                    @else
                                    @foreach($personal_notifications as $key => $personal_notification)
                                    @if($personal_notification->status == 'Read')
                                    <div class="image" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>{{$personal_notification->created_at->diffForHumans()}}</span> - {{$personal_notification->from}}
                                        <p style="font-weight: 500;">{{$personal_notification->subject}}</p> 
                                        <p>
                                            {{$personal_notification->message}}
                                        </p>
                                    </div>
                                    @else
                                    <div class="image" style="background: #e9e3e35e; padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/dot.png')}}" alt="">
                                        <span>{{$personal_notification->created_at->diffForHumans()}}</span> - {{$personal_notification->from}}
                                        <p style="font-weight: 500;">{{$personal_notification->subject}}  <a class="contact-icon mr-3" style="float: right;" href="{{route('read.message', Crypt::encrypt($personal_notification->id))}}"><i class="fa fa-eye" aria-hidden="true"></i></a></p> 
                                        <p>
                                            {{$personal_notification->message}}
                                        </p>
                                    </div>
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card card-statistics">
                                <div class="card-header">
                                    <div class="card-heading">
                                        <h4 class="card-title">General Notifications/Messages</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($general_notifications->isEmpty())
                                    <div class="imagee" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/avatar/1.png')}}" alt="">
                                        <span>
                                            No Message/Notification
                                        </span>
                                    </div>
                                    @else
                                    @foreach($general_notifications as $key => $general_notification)
                                    @if($general_notification->status == 'Read')
                                    <div class="imagee" style="padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/avatar/1.png')}}" alt="">
                                        <span>{{$general_notification->created_at->diffForHumans()}}</span> - {{$general_notification->from}}
                                        <p style="font-weight: 500;">{{$general_notification->subject}}</p> 
                                        <p>
                                            {{$general_notification->message}}
                                        </p>
                                    </div>
                                    @else
                                    <div class="imagee" style="background: #e9e3e35e; padding: 1rem; margin-bottom: 1rem;">
                                        <img src="{{URL::asset('dash/images/avatar/1.png')}}" alt="">
                                        <span>{{$general_notification->created_at->diffForHumans()}}</span> - {{$general_notification->from}}
                                        <p style="font-weight: 500;">{{$general_notification->subject}}  <a class="contact-icon mr-3" style="float: right;" href="{{route('read.message', Crypt::encrypt($personal_notification->id))}}"><i class="fa fa-eye" aria-hidden="true"></i></a></p> 
                                        <p>
                                            {{$general_notification->message}}
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
@includeIf('layouts.dashboard_footer')
@endsection
<!--**********************************
				Footer end
			***********************************-->
@endsection