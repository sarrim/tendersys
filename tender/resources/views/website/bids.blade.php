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
								<h1 class="ft-medium">Tender Bids</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
										<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="#" class="theme-cl">Bids</a></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					
					<div class="dashboard-widg-bar d-block">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="mb-4 tbl-lg rounded overflow-hidden">
									<div class="table-responsive bg-white">
										<table class="table">
											<thead class="thead-dark">
												<tr>
												  <th scope="col">Tender</th>
												  <th scope="col">Bid Title</th>
												  <th scope="col">Bid Offer</th>
												  <th scope="col">Timeframe</th>
												  <th scope="col">Attachment</th>
												  <th scope="col">Action</th>
												</tr>
											</thead>
											<tbody>
												@foreach($bids as $bid)
												<tr>
													<td>
														<div class="cats-box rounded bg-white d-flex align-items-center">
															<div class="text-center"><img src="assets/img/c-1.png" class="img-fluid" width="55" alt=""></div>
															<div class="cats-box-caption px-2">
																<h4 class="fs-md mb-0 ft-medium">{{ $bid->tender->tender_title }}</h4>
																<div class="d-block mb-2 position-relative">
																	{{-- <span class="text-muted medium"><i class="lni lni-map-marker mr-1"></i> {{ $bid->bid_title }} </span>	--}}
																</div>
															</div>
														</div>
													</td>
													<td> {{ $bid->bid_title }} </td>
													<td> {{ $bid->bid_offer }} </td>
													<td> {{ $bid->timeframe }} </td>
													<td> <a href="{{ url('uploads/bids/attachment/'.$bid->bid_attachment) }}" title=""></a> </td>
													<td>
														<div class="dash-action">
															<a href="{{ route('tender.edit', ['id' => $bid->id]) }}" class="p-2 circle text-info bg-light-info d-inline-flex align-items-center justify-content-center mr-1"><i class="lni lni-eye"></i></a>
															<a href="{{ url('user/tender/delete/'.$bid->id) }}" onclick="return confirm('Are you sure to delete this bid')" class="p-2 circle text-danger bg-light-danger d-inline-flex align-items-center justify-content-center ml-1"><i class="lni lni-trash-can"></i></a>
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
							
					</div>
					
@includeIf('website.user_footer')