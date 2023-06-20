<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-applied-Tenders.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:43 GMT -->
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
								<h1 class="ft-medium">My Posted Tenders</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
										<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="#" class="theme-cl">Tenders</a></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					
					<div class="dashboard-widg-bar d-block">
						<div class="row">
<!-- 							<div class="col-xl-12 col-md-12 col-sm-12">
								<div class="cl-justify"> -->
									
<!-- 									<div class="cl-justify-first">
										<p class="m-0 p-0 ft-sm">You have applied <span class="text-dark ft-medium">26</span> Tenders</p>
									</div> -->
									
									<!-- <div class="cl-justify-last">
										<div class="d-flex align-items-center justify-content-left">
											<div class="dlc-list">
												<select class="form-control sm rounded">
													<option>All Tenders</option>
													<option>Full Time</option>
													<option>Part Time</option>
													<option>Freelancing</option>
													<option>Internship</option>
													<option>Contract</option>
												</select>
											</div>
											<div class="dlc-list ml-2">
												<select class="form-control sm rounded">
													<option>Show 20</option>
													<option>Show 30</option>
													<option>Show 40</option>
													<option>Show 50</option>
													<option>Show 100</option>
													<option>Show 250</option>
												</select>
											</div>
										</div>
									</div> -->
									
								<!-- </div>
							</div> -->
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="mb-4 tbl-lg rounded overflow-hidden">
									<div class="table-responsive bg-white">
										<table class="table">
											<thead class="thead-dark">
												<tr>
												  <th scope="col">Title</th>
												  <th scope="col">Status</th>
												  <th scope="col">Posted Date</th>
												  <th scope="col">Last Date</th>
												  <th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($tenders as $tender)
												<tr>
													<td>
														<div class="cats-box rounded bg-white d-flex align-items-center">
															<div class="text-center"><img src="assets/img/c-1.png" class="img-fluid" width="55" alt=""></div>
															<div class="cats-box-caption px-2">
																<h4 class="fs-md mb-0 ft-medium">{{ $tender->tender_title }}</h4>
																<div class="d-block mb-2 position-relative">
																	<span class="text-muted medium"><i class="lni lni-map-marker mr-1"></i> {{ $tender->tender_location }} </span>
<!-- 																	<span class="muted medium ml-2 theme-cl"><i class="lni lni-briefcase mr-1"></i>Full Time</span> -->
																</div>
															</div>
														</div>
													</td>
													<td><span class="text-info"> {{ $tender->tender_status == 1 ? 'Active' : 'Expired' }} </span></td>
													<td> {{ date('M d, Y' , strtotime($tender->tender_date)) }} </td>
													<td> {{ date('M d, Y' , strtotime($tender->tender_deadline)) }} </td>
													<td>
														<div class="dash-action">
															<a href="{{ route('tender.edit', ['id' => $tender->id]) }}" title="Edit Tender" class="p-2 circle text-info bg-light-info d-inline-flex align-items-center justify-content-center mr-1"><i class="lni lni-eye"></i></a>
															&nbsp; &nbsp;
															<a href="{{ route('tender.edit', ['id' => $tender->id]) }}" title="View Bids" class="p-2 circle text-info bg-light-info d-inline-flex align-items-center justify-content-center mr-1"><i class="lni lni-book"></i></a>
															&nbsp; &nbsp;
															<a href="{{ url('user/tender/delete/'.$tender->id) }}" title="Delete Tender" onclick="return confirm('Are you sure to delete this tender')" class="p-2 circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ml-1"><i class="lni lni-trash-can"></i></a>
														</div>
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						
						<!-- <div class="row">
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
					
@includeIf('website.user_footer')