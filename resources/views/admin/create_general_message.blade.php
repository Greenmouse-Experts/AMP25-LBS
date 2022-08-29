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
                            <h2 class="text-black mb-0 font-w500">General Message</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12">
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">Send General Message</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="forming">
                                                <div class="sign">
                                                    <form class="sign-div" method="POST" action="{{ route('admin.message.general') }}">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label>Subject:</label>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <input type="text" class="input" id="subject" name="subject">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <label>Message:</label>
                                                                <div class="row">
                                                                    <div class="col-md-12 mb-4">
                                                                        <textarea type="text" class="input" id="message" rows="5" name="message"></textarea>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12 mb-3">
                                                                <button value="submit">Send Message</button>
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