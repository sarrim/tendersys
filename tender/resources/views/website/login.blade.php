<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:43 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Login</title>
		 
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
			
			<!-- ======================= Top Breadcrubms ======================== -->
			<div class="gray py-3">
				<div class="container">
					<div class="row">
						<div class="colxl-12 col-lg-12 col-md-12">
							<nav aria-label="breadcrumb">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="#">Home</a></li>
									<li class="breadcrumb-item"><a href="#">Pages</a></li>
									<li class="breadcrumb-item active" aria-current="page">Login</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Top Breadcrubms ======================== -->
			
			<!-- ======================= Login Detail ======================== -->
			<section class="middle">
				<div class="container">
					<div class="row align-items-start justify-content-between">
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
						@if(isset ($errors) && count($errors) > 0)
			                <div class="alert alert-danger" role="alert">
			                    <ul class="list-unstyled mb-0">
			                        @foreach($errors->all() as $error)
			                            <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
			            @if(Session::has('message'))
			                <div class="alert alert-danger" role="alert">
			                    <ul class="list-unstyled mb-0">
			                            <li>{{ Session::get('message') }}</li>
			                    </ul>
			                </div>
			            @endif
							<form class="border p-3 rounded" method="post" action="{{ route('login') }}">
								@csrf
								<div class="form-group">
									<label>Email *</label>
									<input type="text" name="username" class="form-control" placeholder="Email*" required="true">
								</div>
								
								<div class="form-group">
									<label>Password *</label>
									<input type="password" name="password" class="form-control" placeholder="Password*">
								</div>
								
								<div class="form-group">
									<!-- <div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="dd" class="checkbox-custom" name="dd" type="checkbox">
											<label for="dd" class="checkbox-custom-label">Remember Me</label>
										</div>	
										<div class="eltio_k2">
											<a href="#">Lost Your Password?</a>
										</div>	
									</div> -->
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Login</button>
								</div>
							</form>
						</div>
						
						<div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 mfliud">
							<form class="border p-3 rounded" method="post" action="{{ url('register') }}">
								@csrf
								<div class="row">
									<div class="form-group col-md-12">
										<label>Full Name *</label>
										<input type="text" class="form-control" name="username" placeholder="Full Name">
									</div>
								</div>
								
								<div class="form-group">
									<label>Email *</label>
									<input type="text" name="email" class="form-control" placeholder="Email*">
								</div>
								
								<div class="row">
									<div class="form-group col-md-6">
										<label>Password *</label>
										<input type="password" name="password" class="form-control" placeholder="Password*">
									</div>
									
									<div class="form-group col-md-6">
										<label>Confirm Password *</label>
										<input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password*">
									</div>
								</div>
								
								<div class="form-group">
									<p>By registering your details, you agree with our Terms & Conditions, and Privacy and Cookie Policy.</p>
								</div>
								
								<div class="form-group">
									<div class="d-flex align-items-center justify-content-between">
										<div class="flex-1">
											<input id="ddd" class="checkbox-custom" name="ddd" type="checkbox">
											<label for="ddd" class="checkbox-custom-label">Sign me up for the Newsletter!</label>
										</div>		
									</div>
								</div>
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Create An Account</button>
								</div>
							</form>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ======================= Login End ======================== -->
			
			<!-- ======================= Newsletter Start ============================ -->
			<section class="space bg-cover" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;">
				<div class="container py-5">
					
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-light mb-0">Subscribr Now</h6>
								<h2 class="ft-bold text-light">Get All New Job Notification</h2>
							</div>
						</div>
					</div>
					
					<div class="row align-items-center justify-content-center">
						<div class="col-xl-7 col-lg-10 col-md-12 col-sm-12 col-12">
							<form class="bg-white rounded p-1">
								<div class="row no-gutters">
									<div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-8">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control lg left-ico" placeholder="Enter Your Email Address">
											<i class="bnc-ico lni lni-envelope"></i>
										</div>
									</div>
									<div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-4">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width custom-height-lg theme-bg text-light fs-md" type="button">Subscribe</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
					
				</div>
			</section>
			<!-- ======================= Newsletter Start ============================ -->
			
@includeIf('website.footer')