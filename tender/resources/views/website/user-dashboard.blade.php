<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/employer-dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:22 GMT -->
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
								<h1 class="ft-medium">Hello, {{ Auth::user()->username }} </h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
										<li class="breadcrumb-item"><a href="#" class="theme-cl">Dashboard</a></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					
					<div class="dashboard-widg-bar d-block">
						<div class="row">
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
								<div class="dash-widgets py-5 px-4 bg-success rounded">
									<h2 class="ft-medium mb-1 fs-xl text-light"> {{ count($tenders) }} </h2>
									<p class="p-0 m-0 text-light fs-md">Tenders</p>
									<i class="lni lni-empty-file"></i>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
								<div class="dash-widgets py-5 px-4 bg-purple rounded">
									<h2 class="ft-medium mb-1 fs-xl text-light"> {{ count($messages) }} </h2>
									<p class="p-0 m-0 text-light fs-md">Messages</p>
									<i class="lni lni-users"></i>
								</div>
							</div>
<!-- 							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
								<div class="dash-widgets py-5 px-4 bg-danger rounded">
									<h2 class="ft-medium mb-1 fs-xl text-light">312</h2>
									<p class="p-0 m-0 text-light fs-md">Notifications</p>
									<i class="lni lni-bar-chart"></i>
								</div>
							</div>
							<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6">
								<div class="dash-widgets py-5 px-4 bg-blue rounded">
									<h2 class="ft-medium mb-1 fs-xl text-light">32</h2>
									<p class="p-0 m-0 text-light fs-md">Bookmark</p>
									<i class="lni lni-heart"></i>
								</div>
							</div> -->
						</div>
						
						<div class="row">
							<div class="col-lg-12 col-md-12">
								<div class="dashboard-gravity-list with-icons">
									<h4 class="mb-0 ft-medium">Recent Activities</h4>
									<ul>
										<li>
											<i class="dash-icon-box ti-layers text-purple bg-light-purple"></i> Your job for <strong class="ft-medium text-dark"><a href="#">IOS Developer</a></strong> has been approved!
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-star text-success bg-light-success"></i> Jodie Farrell left a review <div class="numerical-rating high" data-rating="5.0"></div> for<strong class="ft-medium text-dark"><a href="#"> Real Estate Logo</a></strong>
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-heart text-warning bg-light-warning"></i> Someone bookmarked your <strong class="ft-medium text-dark"><a href="#">SEO Expert Job</a></strong> listing!
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-star text-info bg-light-info"></i> Gracie Mahmood left a review <div class="numerical-rating mid" data-rating="3.8"></div> on <strong class="ft-medium text-dark"><a href="#">Product Design</a></strong>
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-heart text-danger bg-light-danger"></i> Your Magento Developer job expire<strong class="ft-medium text-dark"><a href="#">Renew</a></strong> now it!
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-star text-success bg-light-success"></i> Ethan Barrett left a review <div class="numerical-rating high" data-rating="4.7"></div> on <strong class="ft-medium text-dark"><a href="#">New Logo</a></strong>
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>

										<li>
											<i class="dash-icon-box ti-star text-purple bg-light-purple"></i> Your Magento Developer job expire <strong class="ft-medium text-dark"><a href="#">Renew</a></strong> now it.
											<a href="#" class="close-list-item"><i class="fas fa-times"></i></a>
										</li>
									</ul>
								</div>
							</div>
						</div>	
							
					</div>
					
@includeIf('website.user_footer')