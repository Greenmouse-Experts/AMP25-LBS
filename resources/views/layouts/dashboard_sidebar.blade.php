<div class="deznav">
    <div class="deznav-scroll">
        <ul class="metismenu" id="menu">
            <li><a class="ai-icon" href="{{route('home')}}" aria-expanded="false">
                    <i class="flaticon-025-dashboard"></i>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li>
                <a class="ai-icon" href="{{route('donation_dues')}}" aria-expanded="false">
                    <i class="flaticon-381-rotate"></i>
                    <span class="nav-text">Donation / Dues</span>
                </a>
            </li>
            <li><a class="ai-icon" href="{{route('messages_notifications')}}" aria-expanded="false">
                    <i class="flaticon-381-send"></i>
                    <span class="nav-text">Messages / Notification</span>
                </a>
            </li>
            <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                    <i class="flaticon-381-settings"></i>
                    <span class="nav-text">Setting</span>
                </a>
                <ul aria-expanded="false">
                    <li><a href="{{route('profile')}}">Profile</a></li>
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