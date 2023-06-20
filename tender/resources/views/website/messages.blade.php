<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/dashboard-messages.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:40 GMT -->
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
								<h1 class="ft-medium">Messages</h1>
								<nav aria-label="breadcrumb">
									<ol class="breadcrumb">
										<li class="breadcrumb-item text-muted"><a href="#">Home</a></li>
										<li class="breadcrumb-item text-muted"><a href="#">Dashboard</a></li>
										<li class="breadcrumb-item"><a href="#" class="theme-cl">Messages</a></li>
									</ol>
								</nav>
							</div>
						</div>
					</div>
					
					<div class="dashboard-widg-bar d-block">
						<div class="row">
							<div class="col-xl-12 col-lg-12 col-md-12">
								<div class="_dashboard_content bg-white rounded mb-4">
									
									<div class="_dashboard_content_body">
										<!-- Convershion -->
										<div class="messages-container margin-top-0">
											<!-- <div class="messages-headline">
												<h4>Connor Griffin</h4>
												<a href="#" class="message-action"><i class="ti-trash"></i> Delete Conversation</a>
											</div> -->

											<div class="messages-container-inner">

												<!-- Messages -->
												<div class="dash-msg-inbox">
													<ul>
														@foreach ($message_users as $users)
														<li>
															<a href="#">
															<div class="dash-msg-avatar">
																<!-- <img src="assets/img/team-1.jpg" alt=""> -->
																<!-- <span class="_user_status online"></span> -->
															</div>

																<div class="message-by">
																	<div class="message-by-headline">
																		@if($users->from_user->id == Auth::user()->id)
																			<h5 class="username" data-userid="{{ $users->to_user->id }}">{{ $users->to_user->username }}</h5>
																		@endif
																		@if($users->to_user->id == Auth::user()->id)
																			<h5 class="username" data-userid="{{ $users->from_user->id }}">{{ $users->from_user->username }}</h5>
																		@endif
																		{{-- <span>{{ $users->created_at }}</span> --}}
																	</div>
																	<!-- <p>Hello, I am a web designer with 5 year.. </p> -->
																</div>
															</a>
														</li>
														@endforeach

													</ul>
												</div>
												<!-- Messages / End -->

												<!-- Message Content -->
												<div class="dash-msg-content">

													<div id="show_messages">
														
													</div>
													
													<!-- Reply Area -->
													<div class="clearfix"></div>
													<form action="{{ url('user/send-message') }}" method="post">
														@csrf
														<div class="message-reply">
															<input type="hidden" name="user_id" id="user_id" value="{{ isset($user_id) ? $user_id : '' }}">
															<textarea cols="40" rows="3" name="message" class="form-control with-light" placeholder="Your Message"></textarea>
															<button type="submit" id="send-message" class="btn theme-bg text-white">Send Message</button>
														</div>
													</form>
													
												</div>
												<!-- Message Content -->

											</div>

										</div>
									</div>
								</div>
							</div>
						</div>
							
					</div>
@includeIf('website.user_footer')

<script>
	$(function(){

		$('.username').on('click', function(){
			var user_id = $(this).attr('data-userid');

			$.ajax({
				url: '{{ url("user/get-messages") }}',
				data: { user_id:user_id },
				type: 'get',
				dataType: 'html',
				beforeSend:function(){
					$('body').css('opacity', 0.5);
				},
				success:function(res){
					$('body').css('opacity', 1);
					$("#show_messages").html(res);
					$("#user_id").val(user_id);
				},
				error:function(){

				}
			})
		})

		// $('#send-message').on('click', function(){
		// 	var user_id = $(this).attr('data-userid');

		// 	$.ajax({
		// 		url: '{{ url("user/get-messages") }}',
		// 		data: { user_id:user_id },
		// 		type: 'get',
		// 		dataType: 'html',
		// 		beforeSend:function(){
		// 			$('body').css('opacity', 0.5);
		// 		},
		// 		success:function(res){
		// 			$('body').css('opacity', 1);
		// 			$("#show_messages").html(res);
		// 		},
		// 		error:function(){

		// 		}
		// 	})
		// })
	})
</script>