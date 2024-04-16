<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from akademi.dexignlab.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 16:35:15 GMT -->
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="author" content="DexignLab" >
	<meta name="robots" content="" >
	<meta name="keywords" content="school, school admin, education, academy, admin dashboard, college, college management, education management, institute, school management, school management system, student management, teacher management, university, university management" >
	<meta name="description" content="Discover Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard" >
	<meta property="og:title" content="Akademi : School and Education Management Admin Dashboard Template" >
	<meta property="og:description" content="Akademi - the ultimate admin dashboard and Bootstrap 5 template. Specially designed for professionals, and for business. Akademi provides advanced features and an easy-to-use interface for creating a top-quality website with School and Education Dashboard">
	<meta property="og:image" content="social-image.html" >
	<meta name="format-detection" content="telephone=no">

	<!-- Mobile Specific -->
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Page Title Here -->
	<title>SSMS | Secondary School Management System</title>

<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="{{asset('backend/images/favicon.png')}}" >


	<link href="{{asset('backend/vendor/wow-master/css/libs/animate.css')}}" rel="stylesheet">
	<link href="{{asset('backend/vendor/bootstrap-select/dist/css/bootstrap-select.min.css')}}" rel="stylesheet">
	<link rel="stylesheet" href="{{asset('backend/vendor/bootstrap-select-country/css/bootstrap-select-country.min.css')}}">
	<link rel="stylesheet" href="{{asset('backend/vendor/jquery-nice-select/css/nice-select.css')}}">
	<link href="{{asset('backend/vendor/datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
	
	 <link href="{{asset('backend/vendor/datatables/css/jquery.dataTables.min.css')}}" rel="stylesheet">
	<!--swiper-slider-->
	<link rel="stylesheet" href="{{asset('backend/vendor/swiper/css/swiper-bundle.min.css')}}">
	<!-- Style css -->
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

     <!-- Material color picker -->
     <link href="{{asset('backend/vendor/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css')}}" rel="stylesheet">
     <link href="{{asset('backend/vendor/bootstrap-datepicker-master/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">
     <script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	
</head>
<body>

    <!--*******************
        Preloader start 
    ********************-->
	<div id="preloader">
	  <div class="loader">
		<div class="dots">
			  <div class="dot mainDot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
			  <div class="dot"></div>
		</div>
			
		</div>
	</div>
    <!--*******************
        Preloader end
    ********************-->
    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper" class="wallet-open active">
	
        <!--**********************************
            Nav header start
        ***********************************-->
        @include('admin.fractions.navheader')
        <!--**********************************
            Nav header end
        ***********************************-->
		
		<!--**********************************
            Chat box start
        ***********************************-->
		
		<!--**********************************
            Chat box End
        ***********************************-->
		<!--**********************************
            Header start
        ***********************************-->
		@include('admin.fractions.header')
			<!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        @include('admin.fractions.sidebar')
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--****
		Wallet Sidebar
		****-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <!--**********************************
            Content body start
        ***********************************-->
		<div class="content-body">
            <!-- row -->
			@yield('admin')
		</div>
		
        <!--**********************************
            Content body end
        ***********************************-->
		<!--**********************************
			Footer start
		***********************************-->
		@include('admin.fractions.footer')

	</div>

	
    <!--**********************************
        Main wrapper end
    ***********************************-->
		
	<!--**********************************
		Modal
	***********************************-->
    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="{{asset('backend/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('backend/vendor/chart.js/Chart.bundle.min.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	<!-- Apex Chart -->
	<script src="{{asset('backend/vendor/apexchart/apexchart.js')}}"></script>
	<!-- Chart piety plugin files -->
    <script src="{{asset('backend/vendor/peity/jquery.peity.min.js')}}"></script>
	<script src="{{asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<!--swiper-slider-->
	<script src="{{asset('backend/vendor/swiper/js/swiper-bundle.min.js')}}"></script>
	
	
    <!-- Datatable -->
    <script src="{{asset('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/js/plugins-init/datatables.init.js')}}"></script>

	<!-- Dashboard 1 -->
	<script src="{{asset('backend/js/dashboard/dashboard-1.js')}}"></script>
	<script src="{{asset('backend/vendor/wow-master/dist/wow.min.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap-datetimepicker/js/moment.js')}}"></script>
	<script src="{{asset('backend/vendor/datepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap-select-country/js/bootstrap-select-country.min.js')}}"></script>
	
	<script src="{{asset('backend/js/dlabnav-init.js')}}"></script>
    <script src="{{asset('backend/js/custom.min.js')}}"></script>
	<script src="{{asset('backend/js/demo.js')}}"></script>
    <script src="{{asset('backend/js/styleSwitcher.js')}}"></script>

    <!-- Datatable -->
    <script src="{{asset('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/js/plugins-init/datatables.init.js')}}"></script>

     <!-- Material color picker -->
    <script src="{{asset('backend/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js')}}"></script>

     <!-- Material color picker init -->
     <script src="{{asset('backend/js/plugins-init/material-date-picker-init.js')}}"></script>
{{-- /// --}}
     <script src="{{asset('backend/vendor/global/global.min.js')}}"></script>
<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
	
		
	<script src="{{asset('backend/vendor/bootstrap-datepicker-master/js/bootstrap-datepicker.min.js')}}"></script>
	

    <script src="{{asset('backend/js/custom.js')}}"></script>
    <script src="{{asset('backend/js/custom.min.js')}}"></script>
	<script src="{{asset('backend/js/dlabnav-init.js')}}"></script>
	<script src="{{asset('backend/js/demo.js')}}"></script>
    <script src="{{asset('backend/js/styleSwitcher.js')}}"></script>
    
{{-- // JQUERY CDN //  --}}
	<script src="{{asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


    <script src="{{asset('backend/vendor/global/global.min.js')}}"></script>
	<script src="{{asset('backend/vendor/jquery-nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{asset('backend/vendor/bootstrap-select/dist/js/bootstrap-select.min.js')}}"></script>
    
<script>
 @if(Session::has('message'))
 var type = "{{ Session::get('alert-type','info') }}"
 switch(type){
    case 'info':
    toastr.info(" {{ Session::get('message') }} ");
    break;

    case 'success':
    toastr.success(" {{ Session::get('message') }} ");
    break;

    case 'warning':
    toastr.warning(" {{ Session::get('message') }} ");
    break;

    case 'error':
    toastr.error(" {{ Session::get('message') }} ");
    break; 
 }
 @endif 
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

 <script src="{{ asset('js/main.js') }}"></script>
	
</body>

<!-- Mirrored from akademi.dexignlab.com/xhtml/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 18 Dec 2023 16:35:57 GMT -->
</html>