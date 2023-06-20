<!DOCTYPE html>
<html lang="zxx">
	
<!-- Mirrored from themezhub.net/live-workplex/workplex/Tender-detail.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:25 GMT -->
<head>
		<meta charset="utf-8" />
		<meta name="author" content="Themezhub" />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
        <title>Workplex - Creative Tender Board HTML Template</title>
		 
        <!-- Custom CSS -->
        <link href="{{ asset('assets/website/css/styles.css') }}" rel="stylesheet">
		
		<style>
			/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}
		</style>

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
			<div class="py-5" style="background:#03343b url(assets/img/landing-bg.png) no-repeat;" data-overlay="0">
				<div class="container">
					<div class="row justify-content-center">
						<div class="col-xl-8 col-lg-10 col-md-12 col-sm-12 col-12">
							<div class="banner_caption text-center mb-2">
								<h1 class="ft-bold mb-4">The Most Exciting Tenders</h1>
							</div>
								@includeIf('website.search-form')
						</div>
					</div>
				</div>
			</div>
			<!-- ======================= Searchbar Banner ======================== --
			
			<!-- ============================ Tender Details Start ================================== -->
			<section class="bg-light py-5 position-relative">
				<div class="container">
					<div class="row">
						
						<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
							<div class="bg-white rounded px-3 py-4 mb-4">
							@if(Session::has('message'))
								<p class="px-5 py-1" style="color:#6c02f7">{{ Session::get('message') }}</p>
							@endif
								<div class="jbd-01 d-flex align-items-center justify-content-between">
									<div class="jbd-flex d-flex align-items-center justify-content-start">
										<div class="jbd-01-thumb">
											<i style="text-align: center; display: block;" class="fa fa-user"></i> &nbsp; <br> {{ $tender->user->username }}
										</div>
										<div class="jbd-01-caption pl-3">
											<p class="mb-0">{{ $tender->tender_no }}</p>
											<div class="tbd-title"><h4 class="mb-0 ft-medium">{{ $tender->tender_title }}</h4></div>
											<div class="jbl_location mb-3">
												<span><i class="lni lni-map-marker mr-1"></i>{{ $tender->tender_location }}</span>
											</div>
											<div class="jbl_info01">
												<span class="px-2 py-1 ft-medium medium rounded theme-cl theme-bg-light mr-2">{{ $tender->tender_keywords }}</span>
											</div>
										</div>
									</div>
									<div class="jbd-01-right text-right hide-1023">
										<!-- <div class="jbl_button mb-2"><a href="javascript:void(0);" class="btn rounded theme-bg-light theme-cl fs-sm ft-medium">Apply This Tender</a></div> -->
										<div class="jbl_button"><button id="myBtn"  class="btn rounded bg-white border fs-sm ft-medium"> <i class="fa fa-envelope"></i> Message </button></div>
									</div>
								</div>
							</div>
							
							<div class="bg-white rounded mb-4">
								<div class="jbd-01 px-3 py-4">
									<div class="jbd-details mb-4">
										<h5 class="ft-medium fs-md">About Tender</h5>
										<p> <b>Category:</b> {{ $tender->category->category_name }} </p>
										<p> <b>Tender Amount:</b> {{ $tender->tender_amount }} </p>
										<p> <b>Announce Date:</b> {{ $tender->tender_date }} </p>
										<p> <b>Last Date:</b> {{ $tender->tender_deadline }} </p>
										<p> <b>Location: </b> {{ $tender->tender_location }} </p>
										<p> <b>City:</b> {{ $tender->tender_city }} </p>
										<p> <b>Country:</b> {{ $tender->tender_country }} </p>
									</div>

									<div class="jbd-details mb-4">
										<h5 class="ft-medium fs-md">Tender Attachment</h5>
										<p> <a href="{{ url('uploads/tenders/attachment/'.$tender->tender_attachment) }}">{{ $tender->tender_attachment }}</a> </p>
									</div>
									<div class="jbd-details mb-4">
										<h5 class="ft-medium fs-md">Tender description</h5>
										<p> {{ $tender->tender_description }} </p>
									</div>
									
									<div class="jbd-details mb-3">
										<h5>Requirements:</h5>
										<div class="position-relative row">
											<div class="col-lg-12 col-md-12 col-12">
												<div class="mb-2 mr-4 ml-lg-0 mr-lg-4">
													<div class="d-flex align-items-center">
													  <div class="rounded-circle bg-light-success theme-cl p-1 small d-flex align-items-center justify-content-center">
														<i class="fas fa-check small"></i>
													  </div>
													  	<h6 class="mb-0 ml-3 text-muted fs-sm">
														  {{ $tender->tender_requirements == '' ? 'No special requirements' : $tender->tender_requirements }}
														</h6>
													</div>
												</div>
											</div>
										</div>
									</div>
									
								</div>
								
								<div class="jbd-02 px-3 py-3 br-top">
									<div class="jbd-02-flex d-flex align-items-center justify-content-between">
										<!-- <div class="jbd-02-social">
											<ul class="jbd-social">
												<li><i class="ti-sharethis"></i></li>
												<li><a href="javascript:void(0);"><i class="ti-facebook"></i></a></li>
												<li><a href="javascript:void(0);"><i class="ti-twitter"></i></a></li>
												<li><a href="javascript:void(0);"><i class="ti-linkedin"></i></a></li>
												<li><a href="javascript:void(0);"><i class="ti-instagram"></i></a></li>
											</ul>
										</div> -->
										<div class="jbd-02-aply">
											<div class="jbl_button mb-2">
												<!-- <a href="{{ url('save-tender/'.$tender->id) }}" class="btn btn-md rounded gray fs-sm ft-medium mr-2">Save This Tender</a> -->
												<!-- <a href="#" class="btn btn-md rounded theme-bg text-light fs-sm ft-medium">Apply Tender</a> -->
											</div>
										</div>
									</div>
								</div>
							</div>

							<!-- Blog Comment -->
							<div class="article_detail_wrapss single_article_wrap format-standard">
								
								<div class="comment-area">
									<div class="all-comments">
										<h3 class="comments-title">{{ count($comments) }} Comments</h3>
										<div class="comment-list">
											<ul>
												@foreach($comments as $comment)
												<li class="article_comments_wrap">
													<article>
														<div class="article_comments_thumb">
														</div>
														<div class="comment-details">
															<div class="comment-meta">
																<div class="comment-left-meta">
																	<h4 class="author-name"> {{ $comment->full_name }} </h4>
																	<div class="comment-date"> {{ $comment->created_at }} </div>
																</div>
															</div>
															<div class="comment-text">
																<p> {{ $comment->comment }} </p>
															</div>
														</div>
													</article>
												</li>
												@endforeach
											</ul>
										</div>
									</div>
									<div class="comment-box submit-form">
										<h3 class="reply-title">Post Comment</h3>
										<div class="comment-form">
											<form action="{{ url('save_comment') }}" method="POST">
												@csrf
												<div class="row">
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input type="text" name="full_name" class="form-control" placeholder="Full Name">
														</div>
													</div>
													<div class="col-lg-6 col-md-6 col-sm-12">
														<div class="form-group">
															<input type="text" name="email" class="form-control" placeholder="Your Email">
														</div>
													</div>
													<input type="hidden" name="tender_id" value=" {{ $tender->id }} ">
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group">
															<textarea name="comment" class="form-control" cols="30" rows="6" placeholder="Type your comments...."></textarea>
														</div>
													</div>
													<div class="col-lg-12 col-md-12 col-sm-12">
														<div class="form-group">
															<button type="submit" class="btn theme-bg text-white">Submit Now</button>
														</div>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								
							</div>

							
						</div>
						
						<!-- Sidebar -->
						<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
							<div class="jb-apply-form bg-white rounded py-3 px-4 box-static">
								<h4 class="ft-medium fs-md mb-3">Intrested in this Tender? Bid Now!</h4>
								
								@if(Auth::user())
								<form class="_apply_form_form" action="{{ url('user/apply-for-tender/'.$tender->id) }}" method="POST" enctype="multipart/form-data">
									@csrf
								
									<div class="form-group">
										<label class="text-dark mb-1 ft-medium medium">Title</label>
										<input type="text" class="form-control" name="bid_title" placeholder="Title">
									</div>
									
									<div class="form-group">
										<label class="text-dark mb-1 ft-medium medium">Bid Offer</label>
										<input type="text" class="form-control" name="bid_offer" >
									</div>
									
									<div class="form-group">
										<label class="text-dark mb-1 ft-medium medium">Timeframe</label>
										<input type="text" class="form-control" name="timeframe" >
									</div>
									
									<div class="form-group">
										<label class="text-dark mb-1 ft-medium medium">Short Description:</label>
										<textarea name="bid_description" class="form-control" id="" cols="30" rows="6"></textarea>
									</div>
									
									<div class="form-group">
										<label class="text-dark mb-1 ft-medium medium">Upload attachment:<font>pdf, doc, docx</font></label>
										<div class="custom-file">
										  <input type="file" name="bid_attachment" class="custom-file-input" id="customFile">
										  <label class="custom-file-label" for="customFile">Choose file</label>
										</div>
									</div>
									
									<!-- <div class="form-group">
										<div class="terms_con">
											<input id="aa3" class="checkbox-custom" name="Coffee" type="checkbox">
											<label for="aa3" class="checkbox-custom-label">I agree to pirvacy policy</label>
										</div>
									</div> -->
									
									<div class="form-group">
										<button type="submit" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width">Apply For This Tender</button>
									</div>
								</form>
								@else
									<div class="form-group">
										<a href="{{ url('user/login') }}" class="btn btn-md rounded theme-bg text-light ft-medium fs-sm full-width">Please login to bid on this tender</a>
									</div>
								@endif
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- ============================ Tender Details End ================================== -->
			
			<!-- ======================= Related Tenders ======================== -->
			<section class="space min">
				<div class="container">
				
					<div class="row justify-content-center">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
							<div class="sec_title position-relative text-center mb-5">
								<h6 class="text-muted mb-0">Related Tenders</h6>
								<h2 class="ft-bold">All Related Listed Tenders</h2>
							</div>
						</div>
					</div>
					
					<!-- row -->
					<div class="row align-items-center">
					
						@foreach ($related_tenders as $related)
							<div class="col-xl-3 col-lg-4 col-md-6 col-sm-12">
								<div class="Tender_grid border rounded ">
									<!-- <div class="position-absolute ab-left">
										<button type="button" class="p-3 border circle d-flex align-items-center justify-content-center bg-white text-gray"><i class="lni lni-heart-filled position-absolute snackbar-wishlist"></i></button>
									</div> -->
									<div class="position-absolute ab-right">
										<!-- <span class="medium theme-cl theme-bg-light px-2 py-1 rounded">Full Time</span> -->
									</div>
									<div class="Tender_grid_thumb mb-3 pt-3 px-3">
										<a href="{{ url('tender/'.$related->tender_slug) }}" class="d-block text-center m-auto">
											<img src="{{ url('assets/website/img/c-1.png') }}" class="img-fluid" style="min-width: 100%;" width="" alt="" />
										</a>
									</div>
									<div class="Tender_grid_caption text-center pb-5 px-3">
										<h4 class="mb-0 ft-medium medium"><a href="{{ url('tender/'.$related->tender_slug) }}" class="text-dark fs-md">{{ $related->tender_title }}</a></h4>
										<div class="jbl_location"><i class="lni lni-map-marker mr-1"></i><span>{{ $related->tender_location }}</span></div>
										<br>
										<h4 class="mb-0 ft-medium medium">{{ $related->tender_keywords }}</h4>
									</div>
									<div class="Tender_grid_footer pb-4 px-3 d-flex align-items-center justify-content-between">
										<div class="df-1 text-muted"><i class="lni lni-wallet mr-1"></i>Tender Amount: <br>{{ $related->tender_amount }} </div>
										<div class="df-1 text-muted"><i class="lni lni-timer mr-1"></i>Tender Deadline: <br>{{ $related->tender_deadline }} </div>
									</div>
								</div>
							</div>
						@endforeach

						
					</div>
					<!-- row -->
					
				</div>
			</section>
			<!-- ======================= Related Tenders ======================== -->

			<!-- Log In Modal -->
			<div class="modal" id="myModal">
				<div class="modal-dialog login-pop-form" role="document">
					<div class="modal-content" id="loginmodal">
						<div class="modal-headers">
							<button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
							  <span class="ti-close"></span>
							</button>
						  </div>
					
						<div class="modal-body p-5">
							<div class="text-center mb-4">
								<h2 class="m-0 ft-regular">Message</h2>
							</div>
							
							<form method="post" action="{{ url('user/send-message') }}">
								@csrf
								<div class="form-group">
									<label>Message: </label>
									<textarea name="message" class="form-control" id="" cols="10" rows="5"></textarea>
								</div>
								<input type="hidden" name="user_id" value="{{ $tender->user_id }}">
								
								<div class="form-group">
									<button type="submit" class="btn btn-md full-width theme-bg text-light fs-md ft-medium">Send</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- End Modal -->

@includeIf('website.footer')

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
	console.log(modal);
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>