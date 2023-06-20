
<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themezhub.net/live-workplex/workplex/job-search-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:13 GMT -->

<head>
	<meta charset="utf-8" />
	<meta name="author" content="Themezhub" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Workplex - Creative Job Board HTML Template</title>

	<!-- Custom CSS -->
        <link href="{{ asset('assets/website/css/styles.css') }}" rel="stylesheet">

</head>

<body>

	<!-- ============================================================== -->
	<!-- Preloader - style you can find in spinners.css -->
	<!-- ============================================================== -->
	<div class="preloader"></div>

	<!-- ============================================================== -->
	<!-- Main wrapper - style you can find in pages.scss -->
	<!-- ============================================================== -->
	<div id="main-wrapper">

		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->
		<!-- Start Navigation -->
		<div class="header header-light dark-text">
			<div class="container">
				@includeIf('website.header')
			</div>
		</div>
		<!-- End Navigation -->
		<div class="clearfix"></div>
		<!-- ============================================================== -->
		<!-- Top header  -->
		<!-- ============================================================== -->

		<!-- ======================= Searchbar Banner ======================== -->
		<div class="py-3 theme-bg searchingBar">
			<div class="container">
				<div class="row justify-content-between align-items-center">
					<div class="col-xl-7 col-lg-9 col-md-9 col-sm-12 col-12">
						@includeIf('website.search-form')
					</div>

					<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
					</div>

				</div>
			</div>
		</div>
		<!-- ======================= Searchbar Banner ======================== -->

		<!-- ======================= All Product List ======================== -->
		<section class="bg-light middle">
			<div class="container">

				<div class="row">
					<div class="col-xl-12 col-lg-12 col-md-12 col-12">
						<div class="row align-items-center justify-content-between mx-0 bg-white rounded py-2 mb-4">
							<div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
								<h6 class="mb-0 ft-medium fs-sm">{{ count($tenders) }} Tenders Found for {{ request()->segment(2) }} </h6>
							</div>

							<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
							</div>
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row align-items-center">
				@foreach($tenders as $tender)
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="job_grid border rounded ">
							<div class="position-absolute ab-left">
							<!-- 	<button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button> -->
							</div>
							<div class="position-absolute ab-right">

							</div>
							<div class="job_grid_thumb mb-3 pt-3 px-3">
								<a href="{{ url('tender/'.$tender->tender_slug) }}" class="d-block text-center m-auto">
									<img src="{{ asset('assets/website/img/c-1.png') }}" class="img-fluid" style="min-width: 100%;" width="" alt="" />
								</a>
							</div>
							<div class="job_grid_caption text-center pb-5 px-3">
								<h6 class="mb-0 lh-1 ft-medium medium"><a href="employer-detail.html" class="text-muted medium">{{ $tender->tender_no }}</a></h6>
								<h4 class="mb-0 ft-medium medium"><a href="{{ url('tender/'.$tender->tender_slug) }}" class="text-dark fs-md">{{ $tender->tender_title }}</a></h4>
								<div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span> {{ $tender->tender_location }} </span></div>
							</div>
							<div class="job_grid_footer pb-4 px-3 d-flex align-items-center justify-content-between">
								<div class="df-1 text-muted"><i class="lni lni-wallet mr-1"></i> Tender Amount: <br> {{ $tender->tender_amount }} </div> &nbsp; &nbsp;
								<div class="df-1 text-muted"><i class="lni lni-timer mr-1"></i> Deadline: <br>{{ date('M d, Y', strtotime($tender->tender_deadline)) }} </div>
							</div>
						</div>
					</div>
				@endforeach
					
				</div>
				<!-- row -->


			</div>
		</section>
		<!-- ======================= All Product List ======================== -->

@includeIf('website.user_footer')