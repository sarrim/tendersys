<nav id="navigation" class="navigation navigation-landscape">
						<div class="nav-header">
							<a class="nav-brand" href="#">
								<img src="assets/img/logo.png" class="logo" alt="" />
							</a>
							<div class="nav-toggle"></div>
							<div class="mobile_nav">
								<ul>
								<li>
									<a href="#" data-toggle="modal" data-target="#login" class="theme-cl fs-lg">
										<i class="lni lni-user"></i>
									</a>
								</li>
								<li>
									<a href="{{ url('user/add-tender') }}" class="crs_yuo12 w-auto text-white theme-bg">
										<span class="embos_45"><i class="fas fa-plus-circle mr-1 mr-1"></i>Post a Tender</span>
									</a>
								</li>
								</ul>
							</div>
						</div>
						<div class="nav-menus-wrapper" style="transition-property: none;">
							<ul class="nav-menu">
							
								<li><a href="{{ url('/') }}">Home</a>
									<!-- <ul class="nav-dropdown nav-submenu">
										<li><a href="index.html">Home 1</a></li>
										<li><a href="home-2.html">Home 2</a></li>
										<li><a href="home-3.html">Home 3</a></li>
										<li><a href="home-4.html">Home 4</a></li>
										<li><a href="home-5.html">Home 5</a></li>
										<li><a href="home-6.html">Home 6</a></li>
										<li><a href="home-7.html">Home 7</a></li>
										<li><a href="home-8.html">Home 8</a></li>
									</ul> -->
								</li>
								
								<li><a href="{{ url('tenders') }}">Tenders</a>
									<!-- <ul class="nav-dropdown nav-submenu">
										<li><a href="job-search-v1.html">Job Search V1</a></li>
										<li><a href="job-search-v2.html">Job Search V2</a></li>
										<li><a href="job-search-v3.html">Job Search V3</a></li>
										<li><a href="job-list-v1.html">Job Search V4</a></li>
										<li><a href="job-list-v2.html">Job Search V5</a></li>
										<li><a href="job-list-v3.html">Job Search V6</a></li>
										<li><a href="javascript:void(0);">Map Styles</a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="job-half-map.html">Search On Map V1</a></li>
												<li><a href="job-half-map-v2.html">Search On Map V2</a></li>
												<li><a href="job-search-map-v1.html">Search On Map V3</a></li>
												<li><a href="job-search-map-v2.html">Search On Map V4</a></li>
											</ul>
										</li>
										<li><a href="javascript:void(0);">Single Job</a>
											<ul class="nav-dropdown nav-submenu">
												<li><a href="single-job-1.html">Single Job V1</a></li>
												<li><a href="single-job-2.html">Single Job V2</a></li>
												<li><a href="single-job-3.html">Single Job V3</a></li>
												<li><a href="single-job-4.html">Single Job V4</a></li>
											</ul>
										</li>
									</ul> -->
								</li>
								
								<li><a href="{{ url('categories') }}">Categories</a>
									<!-- <ul class="nav-dropdown nav-submenu">
										<li><a href="browse-jobs.html">Browse Jobs</a></li>
										<li><a href="browse-resumes.html">Browse Resumes</a></li>
										<li><a href="browse-category.html">Browse Categories</a></li>
										<li><a href="candidate-detail.html">Candidate Detail</a></li>
										<li><a href="candidate-dashboard.html">Candidate Dashboard</a></li>
									</ul> -->
								</li>
								
								<li><a href="javascript:void(0);">Bids</a>
									<!-- <ul class="nav-dropdown nav-submenu">
										<li><a href="browse-employers.html">Browse Employers V1</a></li>
										<li><a href="browse-employers-list.html">Browse Employers V2</a></li>
										<li><a href="employer-detail.html">Employer Detail</a></li>
										<li><a href="employer-dashboard.html">Employer Dashboard</a></li>
									</ul> -->
								</li>
								
								<li><a href="javascript:void(0);">More</a>
									<ul class="nav-dropdown nav-submenu">
										<li><a href="{{ url('about-us') }}">About Us</a></li>
										<li><a href="{{ url('contact') }}">Contact</a></li>
										<li><a href="{{ url('privacy') }}">Privacy Policy</a></li>
										<li><a href="{{ url('faq') }}">FAQs</a></li>
									</ul>
								</li>
								
							</ul>
							
							<ul class="nav-menu nav-menu-social align-to-right">
								<li>
                                    @if(Auth::user())
                                    <a href="{{ url('user/dashboard') }}" class="theme-cl ft-medium">
										<i class="lni lni-user mr-2"></i>{{ Auth::user()->username }}
									</a>
                                    @else
									<a href="{{ url('user/login') }}" class="theme-cl ft-medium">
										<i class="lni lni-user mr-2"></i>Sign In
									</a>
<!-- 									<a href="{{ url('login') }}" data-toggle="modal" data-target="#login" class="theme-cl ft-medium">
										<i class="lni lni-user mr-2"></i>Sign In
									</a> -->
                                    @endif
								</li>
								<li class="add-listing">
									<a href="{{ url('user/add-tender') }}" >
										<i class="lni lni-circle-plus mr-1"></i> Post a Tendor
									</a>
								</li>
							</ul>
						</div>
					</nav>