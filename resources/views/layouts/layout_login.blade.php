<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>

  <link href="{{ asset('detail/css/jquery-ui/themes/base/minified/jquery-ui.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/ionicons/css/ionicons.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/animate.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/style.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/style-responsive.min.css')}}" rel="stylesheet" />
  <link href="{{ asset('detail/css/theme/default.css')}}" rel="stylesheet" id="theme" />
  <!-- ================== END BASE CSS STYLE ================== -->
  <link rel="stylesheet" href="{{ asset('detail/css/bootstrap-select.css')}}">

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('detail/js/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top bg-white">



@yield('content')



	<!-- ================== BEGIN BASE JS ================== -->
@include('base_login.script')
	<!-- ================== END BASE JS ================== -->

	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<!-- ================== END PAGE LEVEL JS ================== -->

	<script>
		$(document).ready(function() {
			App.init();
		});
	</script>

</body>
</html>
