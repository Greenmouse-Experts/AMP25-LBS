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
                            <h2 class="text-black mb-0 font-w500">Member</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Add Member</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="forming">
                                                <div class="sign">
                                                    <form class="sign-div" method="POST" action="{{ route('admin.add.member') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label>Title:</label>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <input type="text" placeholder="Enter Title" name="title" class="input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Name:</label>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <input type="text" placeholder="Enter Name" name="name" class="input">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <button value="submit">Add Member</button>
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