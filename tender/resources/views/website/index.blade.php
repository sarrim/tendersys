<!DOCTYPE html>
<html lang="zxx">
	
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
			
			<!-- ======================= Home Banner ======================== -->
			<div class="home-banner margin-bottom-0" style="background:#28b661 url(assets/img/banner-4.jpg) no-repeat;" data-overlay="4">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-11 col-lg-12 col-md-12 col-sm-12 col-12">
							<div class="banner_caption text-center mb-5">
								<h1 class="banner_title ft-bold mb-1">The Most Exciting Products</h1>
								<p class="fs-md ft-medium">Your Dream Products is Waiting</p>
							</div>
							@includeIf('website.search-form')
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Home Banner ======================== -->
			
			<!-- ======================= Tender List ======================== -->
			<section class="middle">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Trending</h6>
								<h2 class="ft-bold">All Popular Listed Trendings</h2>
							</div>
						</div>
					</div>
					
					<!-- row -->
					<div class="row align-items-center">
					
						@if($tenders)
						@foreach ($tenders as $tender)
						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
							<div class="Tender_grid border rounded ">
								<!-- <div class="position-absolute ab-left">
									<button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray">
										<i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i>
									</button>
								</div> -->
								<div class="position-absolute ab-right">
									<!-- <span class="medium theme-cl theme-bg-light px-2 py-1 rounded">Full Time</span> -->
								</div>
								<div class="Tender_grid_thumb mb-2 pt-3 px-3">
									<a href="{{ url('tender/'.$tender->tender_slug) }}" class="d-block text-center m-auto">
										<img src="{{ url('assets/website/img/c-1.png') }}" class="img-fluid" style="min-width: 100%;" width="" alt="" />
									</a>
								</div>
								<div class="Tender_grid_caption text-center pb-3 px-3">
									<h4 class="mb-0 ft-medium medium"><a href="{{ url('tender/'.$tender->tender_slug) }}" class="text-dark fs-md">{{ $tender->tender_title }}</a></h4>
									<div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{ $tender->tender_location }}</span></div>
								</div>
								<div class="Tender_grid_footer pb-4 px-3">
									<ul class="p-0 skills_tag text-center">
										<li><span class="px-2 py-1 medium skill-bg rounded text-dark"> {{ $tender->tender_keywords }} </span></li>
									</ul>
								</div>
							</div>
						</div>
						@endforeach
						@else
							<p>No tenders available with above criteria</p>
						@endif

						
					</div>
					<!-- row -->
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="position-relative text-center">
								<a href="{{ url('tenders') }}" class="btn btn-md theme-bg rounded text-white hover-theme">Explore More<i class="lni lni-arrow-right-circle ml-2"></i></a>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Tender List ======================== -->
			
			<!-- ======================= All Category ======================== -->
			<section class="space gray">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Popular Categories</h6>
								<h2 class="ft-bold">Browse Top Categories</h2>
							</div>
						</div>
					</div>
					
					<!-- row -->
					<div class="row align-items-center">

						@foreach ($categories as $category)
							<div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-6">
								<div class="cats-wrap text-center">
									<a href="{{ url('category/'.$category->category_slug) }}" class="cats-box d-block rounded bg-white px-2 py-4">
										<div class="text-center mb-2 mx-auto position-relative d-inline-flex align-items-center justify-content-center p-3 theme-bg-light circle">
											<i class="lni lni-gallery fs-lg theme-cl"></i>
										</div>
										<div class="cats-box-caption">
											<h4 class="fs-md mb-0 ft-medium m-catrio">{{ $category->category_name }}</h4>
											<span class="text-muted"> {{ $category->tenders_count }} </span>
										</div>
									</a>
								</div>
							</div>
						@endforeach
						
					</div>
					<!-- /row -->
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="position-relative text-center">
								<a href="{{ url('categories') }}" class="btn btn-md bg-dark rounded text-light hover-theme">Browse All Categories<i class="lni lni-arrow-right-circle ml-2"></i></a>
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= All category ======================== -->
			
			<!-- ======================= About Start ============================ -->
			<section class="space">
				<div class="container">
					
					<div class="row align-items-center justify-content-between">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
							<div class="m-spaced">
								<div class="position-relative">
									<div class="mb-1"><span class="theme-bg-light theme-cl px-2 py-1 rounded">About Us</span></div>
									<h2 class="ft-bold mb-3">Create and Build Your<br>Attractive Profile</h2>
									<p class="mb-4">We Have Everything You Need ? Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus. </p>
								</div>
								<div class="position-relative row">
									<!-- <div class="col-lg-4 col-md-4 col-4">
										<h3 class="ft-bold theme-cl mb-0">10k+</h3>
										<p class="ft-medium">Active Tenders</p>
									</div>
									<div class="col-lg-4 col-md-4 col-4">
										<h3 class="ft-bold theme-cl mb-0">12k+</h3>
										<p class="ft-medium">Web Designers</p>
									</div>
									<div class="col-lg-4 col-md-4 col-4">
										<h3 class="ft-bold theme-cl mb-0">07k+</h3>
										<p class="ft-medium">Employers</p>
									</div> -->
									<div class="col-lg-12 col-md-12 col-12 mt-3">
										<!-- <a href="javascript:void(0);" class="btn btn-md theme-bg-light rounded theme-cl hover-theme">See Details<i class="lni lni-arrow-right-circle ml-2"></i></a> -->
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
							<div class="position-relative">
								<img src="{{ asset('assets/website/img/bn-5.png') }}" class="img-fluid" alt="" />
							</div>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= About Start ============================ -->
			
			<!-- ======================= About Start ============================ -->
			<section class="space pt-0">
				<div class="container">
					
					<div class="row align-items-center justify-content-between">
					
						<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12">
							<div class="position-relative">
								<img src="{{ asset('assets/website/img/bn-4.png') }}" class="img-fluid" alt="" />
							</div>
						</div>
						
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">	
							<div class="m-spaced">
								<div class="position-relative">
									<div class="mb-1"><span class="theme-bg-light theme-cl px-2 py-1 rounded">About Us</span></div>
									<h2 class="ft-bold mb-3">Get All The Tenders Details<br>You're Looking For</h2>
									<p class="mb-3">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
								</div>
								<div class="position-relative row">
									<div class="col-lg-12 col-md-12 col-12">
										<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
											<div class="d-flex align-items-center">
											  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
												<i class="fas fa-check"></i>
											  </div>
											  <h6 class="mb-0 ml-3">Full lifetime access</h6>
											</div>
										</div>
										<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
											<div class="d-flex align-items-center">
											  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
												<i class="fas fa-check"></i>
											  </div>
											  <h6 class="mb-0 ml-3"> downloadable resources</h6>
											</div>
										</div>
										<!-- <div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
											<div class="d-flex align-items-center">
											  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
												<i class="fas fa-check"></i>
											  </div>
											  <h6 class="mb-0 ml-3">Certificate of completion</h6>
											</div>
										</div>
										<div class="mb-3 mr-4 ml-lg-0 mr-lg-4">
											<div class="d-flex align-items-center">
											  <div class="rounded-circle bg-light-success theme-cl p-2 small d-flex align-items-center justify-content-center">
												<i class="fas fa-check"></i>
											  </div>
											  <h6 class="mb-0 ml-3">Free Trial 7 Days</h6>
											</div>
										</div> -->
									</div>
									<div class="col-lg-12 col-md-12 col-12 mt-4">
										<!-- <a href="javascript:void(0);" class="btn btn-md theme-bg rounded text-white hover-theme">Get Started<i class="lni lni-arrow-right-circle ml-2"></i></a> -->
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</section>
			<!-- ======================= About Start ============================ -->
			
			<!-- ======================= Our Partner Start ============================ -->
			<!-- <section class="p-0">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-5 col-lg-7 col-md-9 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Our Partners</h6>
								<h2 class="ft-bold">We Have Worked with <span class="theme-cl">10,000+</span> Trusted Companies</h2>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-1.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-2.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-3.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-4.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-5.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-6.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-7.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-8.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-9.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
						<div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
							<div class="empl-thumb text-center px-3 py-4">
								<img src="assets/img/l-10.png" class="img-fluid mx-auto" alt="" />
							</div>
						</div>
						
					</div>
					
				</div>
			</section> -->
			<!-- ======================= Our Partner Start ============================ -->
			
			<!-- ======================= Blog Start ============================ -->
			<!-- <section class="space min">
				<div class="container">
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-4">
								<h6 class="text-muted mb-0">Latest News</h6>
								<h2 class="ft-bold">Pickup New Updates</h2>
							</div>
						</div>
					</div>
					
					<div class="row justify-content-center">
						
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-4.jpg" class="img-fluid" alt=""></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Marketing</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">How To Register &amp; Enrolled on SkillUp Step by Step?</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="assets/img/team-2.jpg" class="img-fluid circle" width="35" alt=""></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-5.jpg" class="img-fluid" alt=""></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Business</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">Let's Know How Skillup Work Fast and Secure?</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="assets/img/team-3.jpg" class="img-fluid circle" width="35" alt=""></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
						<div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
							<div class="blg_grid_box">
								<div class="blg_grid_thumb">
									<a href="blog-detail.html"><img src="assets/img/b-6.jpg" class="img-fluid" alt=""></a>
								</div>
								<div class="blg_grid_caption">
									<div class="blg_tag"><span>Accounting</span></div>
									<div class="blg_title"><h4><a href="blog-detail.html">How To Improove Digital Marketing for Fast SEO</a></h4></div>
									<div class="blg_desc"><p>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum</p></div>
								</div>
								<div class="crs_grid_foot">
									<div class="crs_flex d-flex align-items-center justify-content-between br-top px-3 py-2">
										<div class="crs_fl_first">
											<div class="crs_tutor">
												<div class="crs_tutor_thumb"><a href="instructor-detail.html"><img src="assets/img/team-5.jpg" class="img-fluid circle" width="35" alt=""></a></div>
											</div>
										</div>
										<div class="crs_fl_last">
											<div class="foot_list_info">
												<ul>
													<li><div class="elsio_ic"><i class="fa fa-eye text-success"></i></div><div class="elsio_tx">10k Views</div></li>
													<li><div class="elsio_ic"><i class="fa fa-clock text-warning"></i></div><div class="elsio_tx">10 July 2021</div></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					
				</div>
			</section> -->
			<!-- ======================= Blog Start ============================ -->
	
@includeIf('website.footer')