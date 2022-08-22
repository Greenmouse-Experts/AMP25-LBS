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
                <h2 class="text-black mb-0 font-w500">Profile</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="card card-statistics">
                <div class="card-body p-0">
                    <div class="row no-gutters">
                        <div class="col-xl-3 pb-xl-0 pb-5 border-right">
                            <div class="page-account-profil pt-5">
                                <div class="profile-img text-center rounded-circle">
                                    <div class="pt-5">
                                        <div class="bg-img m-auto rounded-circle">
                                            @if(Auth::user()->avatar)
                                            <img class="img-fluid border-primary" style="height: 100px; "src="/storage/avatars/{{Auth::user()->avatar}}" alt="Profile Picture">
                                            @else
                                            <img src="{{URL::asset('dash/images/avatar/1.png')}}" class="img-fluid" alt="users-avatar">
                                            @endif
                                        </div>
                                        <div class="profile pt-4">
                                            <h4 class="mb-1">{{Auth::user()->name}}</h4>
                                            <p style="font-weight: 700;">{{Auth::user()->membership_id}}</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="profile-btn text-center">
                                    <form method="POST" action="{{ route('admin.upload-avatar', Crypt::encrypt(Auth::user()->id)) }}" enctype="multipart/form-data">
                                        @csrf
                                        <div>
                                            <button class="btn btn-light text-primary mb-2">
                                                <input type="file" name="avatar">
                                            </button>
                                        </div>
                                        <div>
                                            <button class="btn" style="background: #1E33F2; color: #fff;">Upload New Avatar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-md-6 col-12 border-t border-right">
                            <div class="page-account-form">
                                <div class="form-titel border-bottom p-3">
                                    <h5 class="mb-0 py-2">Edit Your Personal Settings</h5>
                                </div>
                                <div class="">
                                    <div class="forming">
                                        <div class="sign">
                                            <form class="sign-div" method="POST" action="{{ route('admin.profile.update', Crypt::encrypt(Auth::user()->id)) }}">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <label>Full Name</label>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <input type="text" placeholder="Enter Your Full Name" name="name" value="{{Auth::user()->name}}" class="input" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <label>Email</label>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <input type="email" readonly placeholder="Enter Your Email" name="email" value="{{Auth::user()->email}}" class="input" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <button value="submit" required> Update Profile</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 border-t col-12">
                            <div class="page-account-form">
                                <div class="form-titel border-bottom p-3">
                                    <h5 class="mb-0 py-2">Reset Your Password</h5>
                                </div>
                                <div class="">
                                    <div class="forming">
                                        <div class="sign">
                                            <form class="sign-div" method="POST" action="{{ route('admin.update.password', Crypt::encrypt(Auth::user()->id)) }}">
                                                @csrf
                                                <div class="row">
                                                    <!--Old Password-->
                                                    <div class="col-md-12">
                                                        <label>Old Password</label>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <input type="password" placeholder="**********" value="{{Auth::user()->password}}" class="input" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Old Password Ends-->
                                                    <!--New Password-->
                                                    <div class="col-md-12">
                                                        <label>New Password</label>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <input type="password" placeholder="**********" name="new_password" class="input">
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--New Password Ends-->
                                                    <!--Confirm Password-->
                                                    <div class="col-md-12">
                                                        <label>Confirm New Password</label>
                                                        <div class="row">
                                                            <div class="col-md-12 mb-4">
                                                                <input type="password" placeholder="**********" name="new_password_confirmation" class="input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Confirm Password Ends-->
                                                    <div class="col-md-12 mb-3">
                                                        <button value="submit"> Update Password</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
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