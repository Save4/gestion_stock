<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>


	<!-- ================== BEGIN BASE CSS STYLE ================== -->
  @include('base.head')

	<!-- ================== END BASE CSS STYLE ================== -->

	<!-- ================== BEGIN BASE JS ================== -->
	<script src="{{ asset('detail/js/pace/pace.min.js') }}"></script>
	<!-- ================== END BASE JS ================== -->
</head>

<body class="pace-top bg-white">



@yield('content')



	<!-- ================== BEGIN BASE JS ================== -->
@include('base.script')
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
