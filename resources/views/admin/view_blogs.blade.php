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
                            <h2 class="text-black font-w500 mb-0">View Blogs</h2>
                            
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
                                            <th>Image</th>
                                            <th>Created At</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    @if($blogs->isEmpty())
                                    <tbody>
                                        <tr>
                                            <td class="align-enter text-dark font-15" colspan="5">No Blog Added.</td>
                                        </tr>
                                    </tbody>
                                    @else
                                    @foreach($blogs as $key => $blog)
                                    <tbody>
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$blog->title}}</td>
                                            <td class="text-black">{{$blog->description}}</td>
                                            <td class="text-black">
                                                <img class="img-fluid border-primary" style="height: 100px; "src="/storage/blogs/{{$blog->image}}" alt="{{$blog->title}}">
                                            </td>
                                            <td>{{$blog->created_at}}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a class="contact-icon mr-3 " href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
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