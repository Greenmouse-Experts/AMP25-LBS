<!--**********************************
				Footer start
			***********************************-->
<div class="footer">
    <div class="copyright">
        <p>Copyright © {{ date('Y') }} {{config('app.name')}} | All Right Reserved</p>
    </div>
</div>
<!--**********************************
				Footer end
			***********************************-->

<!-- Alerts  Start-->
<div style="position: fixed; top: 10px; right: 10px; z-index: 100000; width: auto;">
    @include('layouts.alert')
</div>
<!-- Alerts End -->