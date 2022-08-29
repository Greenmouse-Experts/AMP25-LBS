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
                            <h2 class="text-black font-w500 mb-0">View All Members</h2>
                            
                        </div>	
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="table-responsive">
                                <table id="example" class="display compact table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Membership ID</th>
                                            <th>Title</th>
                                            <th>Name</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @if($members->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="6">No Member Added.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($members as $key => $member)
                                    <tbody>
                                        <tr>
                                            <td class="text-black">{{$loop->iteration}}</td>
                                            <td class="text-black">{{$member->membership_id}}</td>
                                            <td class="text-black">{{$member->title}}</td>
                                            <td class="text-black">{{$member->name}} </td>
                                            <td class="text-black">{{$member->created_at->diffForHumans()}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a data-toggle="modal" data-target="#send-message-{{$member->id}}" class="contact-icon mr-3"><i class="fa fa-paper-plane-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send Message"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="send-message-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-right" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Send message to {{$member->membership_id}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{ route('admin.message.member', Crypt::encrypt($member->id)) }}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="subject">Subject</label>
                                                                            <input type="text" class="form-control" id="subject" style="border: 1px solid #1E33F2" name="subject">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="message">Message</label>
                                                                            <textarea type="text" class="input" id="message" rows="5" name="message"></textarea>
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary" style="width: 100%;">Send Message</button>
                                                                    </form>
                                                                </div>
                                                            </div>  
                                                        </div>
                                                    </div>
                                                    <a data-toggle="modal" data-target="#view-member-{{$member->id}}" class="contact-icon mr-3"><i class="fa-fw fa fa-file-o" data-toggle="tooltip" data-placement="top" title="" data-original-title="View/Edit"></i></a>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="view-member-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="loginModal" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-right" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit {{$member->membership_id}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="POST" action="{{ route('admin.update.member', Crypt::encrypt($member->id)) }}">
                                                                        @csrf
                                                                        <div class="form-group">
                                                                            <label for="title">Title</label>
                                                                            <input type="text" class="form-control" id="title" name="title" value="{{$member->title}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="name">Name</label>
                                                                            <input type="text" class="form-control" id="name" name="name" value="{{$member->name}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="email">Email</label>
                                                                            <input type="text" class="form-control" id="email" name="email" value="{{$member->email}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="phone_number">Phone Number</label>
                                                                            <input type="number" class="form-control" id="phone_number" name="phone_number" value="{{$member->phone_number}}">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="address">Address</label>
                                                                            <textarea type="text" class="form-control" id="address" name="address" value="{{$member->address}}"></textarea>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="occupation">Occupation</label>
                                                                            <input type="text" class="form-control" id="occupation" name="occupation" value="{{$member->occupation}}">
                                                                        </div>
                                                                        <button type="submit" class="btn btn-primary" style="width: 100%;">Update</button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal -->
                                                    <a class="contact-icon mr-3" data-toggle="modal" data-target="#delete-{{$member->id}}" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    <div class="modal fade" id="delete-{{$member->id}}" tabindex="-1" role="dialog" aria-labelledby="defaultModal" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Delete {{$member->title}} {{$member->name}}</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <span style="color: #000;">Are you sure, you want to delete this member?</span>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                                    <a href="{{ route('admin.delete.member', Crypt::encrypt($member->id)) }}" class="btn btn-success">Delete</a>
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