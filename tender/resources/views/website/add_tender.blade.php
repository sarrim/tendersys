<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-post-Tender.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:13:59 GMT -->
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
			<div class="header header-light dark-text head-shadow">
				<div class="container">
					@includeIf('website.header')
				</div>
			</div>
			<!-- End Navigation -->
			<div class="clearfix"></div>
			<!-- ============================================================== -->
			<!-- Top header  -->
			<!-- ============================================================== -->
			
			<!-- ======================= dashboard Detail ======================== -->
			<div class="dashboard-wrap bg-light">
				<a class="mobNavigation" data-toggle="collapse" href="#MobNav" role="button" aria-expanded="false" aria-controls="MobNav">
					<i class="fas fa-bars mr-2"></i>Dashboard Navigation
				</a>
				 
				@includeIf('website.sidebar')
				<div class="dashboard-content">
					<div class="dashboard-tlbar d-block mb-5">
						<div class="row">
							<div class="colxl-12 col-lg-12 col-md-12">
								<h1 class="ft-medium">Post A New Tender</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
										<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="#" class="theme-cl">Post Tender</a></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					
					<div class="dashboard-widg-bar d-block">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="_dashboard_content bg-white rounded mb-4">
									<div class="_dashboard_content_header br-bottom py-3 px-3">
										<div class="_dashboard__header_flex">
											<h4 class="mb-0 ft-medium fs-md"><i class="fa fa-file mr-1 theme-cl fs-sm"></i>Post Tender</h4>	
										</div>
									</div>
									
									<div class="_dashboard_content_body py-3 px-3">
										<form class="row" action="{{ url('user/tenders') }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="col-xl-12 col-lg-12 col-md-12">
												<div class="row">
												
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Title</label>
															<input type="text" class="form-control rounded" name="tender_title" placeholder="Title" required>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Category</label>
															<select class="form-control rounded" name="category_id" required="true">
															<option value="">Choose Category</option>
															  	@foreach ($categories as $category)
															  		<option value="{{ $category->id }}"> {{ $category->category_name }} </option>
															  	@endforeach
															</select>
														</div>
													</div>

													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Description</label>
															<textarea class="form-control rounded" name="tender_description" placeholder="Tender Description"></textarea>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Keywords <small>(Mandatory: Keywords helps in search. You can enter comma separated)</small> </label>
															<input type="text" class="form-control rounded" name="tender_keywords" placeholder="Tender Keywords" required>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Fees <small>(Optional)</small> </label>
															<input type="number" class="form-control rounded" name="tender_amount" placeholder="Tender Fees">
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Dead Line</label>
															<input type="date" class="form-control rounded" name="tender_deadline" placeholder="Deadline">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Country</label>
															<input type="text" class="form-control rounded" name="tender_country" placeholder="Country">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">City</label>
															<input type="text" class="form-control rounded" name="tender_city" placeholder="City">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Address</label>
															<input type="text" class="form-control rounded" name="tender_location" placeholder="Address">
														</div>
													</div>


													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Requirements</label>
															<textarea class="form-control rounded" name="tender_requirements" placeholder="Tender Description"></textarea>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Attachment</label>
															<input type="file" class="form-control rounded" name="tender_attachment" >
														</div>
													</div>
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Username</label>
															<input type="text" class="form-control rounded" placeholder="User">
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Specialisms</label>
															<select class="form-control rounded">
																<option>Accounting</option>
																<option>Banking</option>
																<option>Software</option>
																<option>Hardware</option>
																<option>Hospital</option>
																<option>Fashion Design</option>
																<option>BPO Services</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Industry</label>
															<select class="form-control rounded">
																<option>IT & Software</option>
																<option>Bank Services</option>
																<option>Power Corporation</option>
																<option>Water Supply</option>
																<option>Chemical Plant</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Type</label>
															<select class="form-control rounded">
																<option>Full Time</option>
																<option>Part Time</option>
																<option>Internship</option>
																<option>Contract</option>
																<option>Freelancing</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Career Level</label>
															<select class="form-control rounded">
																<option>Begginer</option>
																<option>Junior</option>
																<option>Manager</option>
																<option>Team leader</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Specialisms</label>
															<select class="form-control rounded">
																<option>Web Designing</option>
																<option>JAVA Advance</option>
																<option>PHP Developer</option>
																<option>IOS Developer</option>
																<option>App Developer</option>
																<option>Fashion Designing</option>
																<option>Bank Services</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Experience</label>
															<select class="form-control rounded">
																<option>Begginer</option>
																<option>0 To 6 Month</option>
																<option>1 Years</option>
																<option>2 Years</option>
																<option>3 Years</option>
																<option>4 Years</option>
																<option>5+ Years</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Qualification</label>
															<select class="form-control rounded">
																<option>Graduation</option>
																<option>Master Degree</option>
																<option>BPharma</option>
																<option>P.H.D.</option>
																<option>Other</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Gender</label>
															<select class="form-control rounded">
																<option>Male</option>
																<option>Female</option>
																<option>Other</option>
															</select>
														</div>
													</div> -->
													
													<!-- <div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Application Deadline</label>
															<input type="date" class="form-control rounded" placeholder="dd-mm-yyyy">
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Country</label>
															<input type="text" class="form-control" placeholder="Country" />
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">City</label>
															<input type="text" class="form-control" placeholder="City" />
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Full Address</label>
															<input type="text" class="form-control" placeholder="#10 Marke Juger, SBI Road" />
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Zip Code</label>
															<input type="text" class="form-control" placeholder="Zip" />
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Latitude</label>
															<input type="text" class="form-control" placeholder="Liverpool" />
														</div>
													</div>
													
													<div class="col-xl-4 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Longitude</label>
															<input type="text" class="form-control" placeholder="Liverpool" />
														</div>
													</div> -->
													
													<div class="col-12">
														<div class="form-group">
															<button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Publish Tender</button>
														</div>
													</div>
													
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
	
					</div>
					
					<!-- footer -->
					<div class="row">
						<div class="col-md-12">
							<div class="py-3">© 2022 Workplex. Designd By ThemezHub.</div>
						</div>
					</div>
		
				</div>
				
			</div>
			<!-- ======================= dashboard Detail End ======================== -->
			
			<a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>
			

		</div>
		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
		<script src="{{ asset('assets/website/js/jquery.min.js') }}"></script>
		<script src="{{ asset('assets/website/js/popper.min.js') }}"></script>
		<script src="{{ asset('assets/website/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('assets/website/js/slick.js') }}"></script>
		<script src="{{ asset('assets/website/js/slider-bg.js') }}"></script>
		<script src="{{ asset('assets/website/js/smoothproducts.js') }}"></script>
		<script src="{{ asset('assets/website/js/snackbar.min.js') }}"></script>
		<script src="{{ asset('assets/website/js/jQuery.style.switcher.js') }}"></script>
		<script src="{{ asset('assets/website/js/custom.js') }}"></script>
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->	

	</body>

<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-post-Tender.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:00 GMT -->
</html>