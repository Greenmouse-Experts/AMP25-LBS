<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href="index" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-user-3"></i>
                    <span class="nav-text">Member</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.members')}}">Add a member</a></li>
                    <li><a href="{{route('admin.view.members')}}">View all members</a></li>
                    <li><a href="Disable">Disable / suspend member</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-send"></i>
                    <span class="nav-text">Messages</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.create.general.message')}}">Create a message / notification</a></li>
                    <li><a href="{{route('admin.view.messages')}}}}">View replies from members</a></li>
                </ul>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-picture"></i>
                    <span class="nav-text">Payment</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.payment.request')}}">Create payment request</a></li>
                    <li><a href="{{route('admin.view.payments.request')}}">View payment requests</a></li>
                    <li><a href="{{route('admin.view.payments')}}">View all payments from members</a></li>
                </ul>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-add"></i>
                    <span class="nav-text">Blog</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.blog')}}">Upload Blog</a></li>
                    <li><a href="{{route('admin.view.blogs')}}">View Blogs</a></li>
                </ul>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('admin.profile')}}">Profile</a></li>
                    <li>
                        <a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>