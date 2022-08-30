<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<title>{{config('app.name')}} - Admin Dashboard</title>
		<!-- Favicon icon -->
		<link rel="shortcut icon" href="{{URL::asset('assets/images/favicon.png')}}" type="image/x-icon">
		<link rel="stylesheet" href="vendor/chartist/css/chartist.min.css')}}">
		<link href="{{URL::asset('dash/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
		<link href="{{URL::asset('dash/vendor/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
		<link href="{{URL::asset('dash/css/style.css')}}" rel="stylesheet">
        <script type="text/javascript">
            window.setTimeout(function() {
                $(".alert-timeout").fadeTo(500, 0).slideUp(1000, function() {
                    $(this).remove();
                });
            }, 11000);
        </script>
	</head>
	<body>

		<!--*******************
			Preloader start
		********************-->
		<div id="preloader">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1"></div>
				<div class="sk-child sk-bounce2"></div>
				<div class="sk-child sk-bounce3"></div>
			</div>
		</div>
		<!--*******************
			Preloader end
		********************-->
        <!--**********************************
			Main wrapper start
		***********************************-->
		<div id="main-wrapper">

            @yield('header')

            @yield('sidebar')

            <!-- Page-Content -->
            @yield('page-content')

            <!-- SECTION: FOOTER -->
            @yield('footer')

        </div>
		<!--**********************************
			Main wrapper end
		***********************************-->
		<!--**********************************
			Scripts
		***********************************-->
		<!-- Required vendors -->
		<script src="{{URL::asset('dash/vendor/global/global.min.js')}}"></script>
		<script src="{{URL::asset('dash/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>	
		<script src="{{URL::asset('dash/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
		<script src="{{URL::asset('dash/vendor/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')}}"></script>
		<script src="{{URL::asset('dash/vendor/peity/jquery.peity.min.js')}}"></script>
		<!-- Apex Chart -->
		<script src="{{URL::asset('dash/vendor/apexchart/apexchart.js')}}"></script>
		<!-- Dashboard 1 -->
		<script src="{{URL::asset('dash/js/dashboard/dashboard-1.js')}}"></script>
		<script src="{{URL::asset('dash/js/custom.min.js')}}"></script>
		<script src="{{URL::asset('dash/js/deznav-init.js')}}"></script>
		<script src="{{URL::asset('vendor_components/datatable/datatables.min.js')}}"></script>
		<script src="{{URL::asset('js/js/pages/data-table.js')}}"></script>
		
	</body>
</html>