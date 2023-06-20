<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themezhub.net/live-workplex/workplex/Tender-search-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:13 GMT -->

<head>
	<meta charset="utf-8" />
	<meta name="author" content="Themezhub" />
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Workplex - Creative Tender Board HTML Template</title>

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
						<!-- <div class="d-block position-relative text-right">
								<a href="#" onclick="openSearch()" class="mlb-btn btn ft-medium rounded text-dark bg-light"><i class="ti-bell mr-1"></i>Tender Alert</a>
							</div> -->
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
								<h6 class="mb-0 ft-medium fs-sm">{{ count($tenders) }} Tenders Found</h6>
							</div>

							<div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">
								<!-- <div class="filter_wraps elspo_wrap d-flex align-items-center justify-content-end">
										<div class="single_fitres mr-2 br-right">
											<select class="custom-select simple">
											  <option value="1" selected="">Default Sorting</option>
											  <option value="2">Recent tenders</option>
											  <option value="3">Featured tenders</option>
											  <option value="4">Trending tenders</option>
											  <option value="5">Premium tenders</option>
											</select>
										</div>
										<div class="single_fitres">
											<a href="Tender-search-v2.html" class="simple-button active theme-cl mr-1"><i class="ti-layout-grid2"></i></a>
											<a href="Tender-list-v2.html" class="simple-button"><i class="ti-view-list"></i></a>
										</div>
									</div> -->
							</div>
						</div>
					</div>
				</div>

				<!-- row -->
				<div class="row align-items-center">

					@foreach ($tenders as $tender)
					<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
						<div class="Tender_grid border rounded ">
							<!-- <div class="position-absolute ab-left">
								<button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button>
							</div> -->
							<div class="position-absolute ab-right">
								{{-- <span class="mediumtheme-cltheme-bg-lightpx-2py-1rounded">$tender->tender_no </span> --}}
							</div>
							<div class="Tender_grid_thumb mb-3 pt-3 px-3">
								<a href="{{ url('tender/'.$tender->tender_slug) }}" class="d-block text-center m-auto">
									<img src="{{ url('assets/website/img/c-1.png') }}" class="img-fluid" style="min-width: 100%;" width="" alt="" />
								</a>
							</div>
							<div class="Tender_grid_caption text-center pb-5 px-3">
								<h4 class="mb-0 ft-medium medium"><a href="{{ url('tender/'.$tender->tender_slug) }}" class="text-dark fs-md">{{ $tender->tender_title }}</a></h4>
								<div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{ $tender->tender_location }}</span></div>
								<br>
								<h4 class="mb-0 ft-medium medium">{{ $tender->tender_keywords }}</h4>
							</div>
							<div class="Tender_grid_footer pb-4 px-3 d-flex align-items-center justify-content-between">
								<div class="df-1 text-muted"><i class="lni lni-wallet mr-1"></i>Tender Amount: <br>{{ $tender->tender_amount }} </div>
								<div class="df-1 text-muted"><i class="lni lni-timer mr-1"></i>Tender Deadline: <br>{{ $tender->tender_deadline }} </div>
							</div>
						</div>
					</div>
					@endforeach

				</div>
				<!-- row -->

<!-- 				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12">
						<ul class="pagination">
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Previous">
									<span class="fas fa-arrow-circle-right"></span>
									<span class="sr-only">Previous</span>
								</a>
							</li>
							<li class="page-item"><a class="page-link" href="#">1</a></li>
							<li class="page-item"><a class="page-link" href="#">2</a></li>
							<li class="page-item active"><a class="page-link" href="#">3</a></li>
							<li class="page-item"><a class="page-link" href="#">...</a></li>
							<li class="page-item"><a class="page-link" href="#">18</a></li>
							<li class="page-item">
								<a class="page-link" href="#" aria-label="Next">
									<span class="fas fa-arrow-circle-right"></span>
									<span class="sr-only">Next</span>
								</a>
							</li>
						</ul>
					</div>
				</div> -->

			</div>
		</section>
		<!-- ======================= All Product List ======================== -->

		@includeIf('website.footer')