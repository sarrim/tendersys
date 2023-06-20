<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-post-job.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:13:59 GMT -->
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
										<form class="row" action="{{ url('user/tenders/update/'.$tender->id) }}" method="POST" enctype="multipart/form-data">
											@csrf
											<div class="col-xl-12 col-lg-12 col-md-12">
												<div class="row">
												
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Title</label>
															<input type="text" class="form-control rounded" name="tender_title" placeholder="Title" required value="{{ $tender->tender_title  }}">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Category</label>
															<select class="form-control rounded" name="category_id" required="true">
															<option value="">Choose Category</option>
															  	@foreach ($categories as $category)
															  		<option {{ $tender->category_id == $category->id ? 'selected=selected' : '' }} value="{{ $category->id }}"> {{ $category->category_name }} </option>
															  	@endforeach
															</select>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Description</label>
															<textarea class="form-control rounded" name="tender_description" placeholder="Tender Description"> {{ $tender->tender_description  }} </textarea>
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Keywords <small>(Mandatory: Keywords helps in search. You can enter comma separated)</small> </label>
															<input type="text" class="form-control rounded" name="tender_keywords" value="{{ $tender->tender_keywords }}" required>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Fees <small>(Optional)</small> </label>
															<input type="number" class="form-control rounded" name="tender_amount" value="{{ $tender->tender_amount }}" placeholder="Tender Fees">
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Dead Line</label>
															<input type="date" class="form-control rounded" name="tender_deadline" value="{{ $tender->tender_deadline }}" placeholder="Deadline">
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Country</label>
															<input type="text" class="form-control rounded" name="tender_country" value="{{ $tender->tender_country }}" >
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">City</label>
															<input type="text" class="form-control rounded" name="tender_city" value="{{ $tender->tender_city }}" >
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Address</label>
															<input type="text" class="form-control rounded" name="tender_location" value="{{ $tender->tender_location }}" >
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Attachment: </label>
															<a href="{{ url('uploads/tenders/attachment/'.$tender->tender_attachment) }}" target="_blank" > {{ $tender->tender_attachment }} </a>
														</div>
													</div>
													
													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Upload New Attachment</label>
															<input type="file" class="form-control rounded" name="tender_attachment" >
														</div>
													</div>

													<div class="col-xl-12 col-lg-12 col-md-12">
														<div class="form-group">
															<label class="text-dark ft-medium">Tender Requirements</label>
															<textarea class="form-control rounded" name="tender_requirements" placeholder="Tender Requirements"> {{ $tender->tender_requirements  }} </textarea>
														</div>
													</div>
													
													<div class="col-xl-6 col-lg-6 col-md-6">
														<div class="form-group">
															<label class="text-dark ft-medium">Status</label>
															<select class="form-control rounded" name="tender_status">
																<option {{ $tender->tender_status == 1 ? 'selected=selected' : '' }} value="1">Active</option>
																<option {{ $tender->tender_status == 2 ? 'selected=selected' : '' }} value="2">Expired</option>
															</select>
														</div>
													</div>
													
													<div class="col-12">
														<div class="form-group">
															<button type="submit" class="btn btn-md ft-medium text-light rounded theme-bg">Update Tender</button>
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
					
@includeIf('website.user_footer')