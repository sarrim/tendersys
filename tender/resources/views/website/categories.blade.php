<!DOCTYPE html>
<html lang="zxx">

<!-- Mirrored from themezhub.net/live-workplex/workplex/job-search-v2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 20 Apr 2023 06:14:13 GMT -->

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
        <div class="header header-light dark-text">
            <div class="container">
                @includeIf('website.header')
            </div>
            <!-- End Navigation -->
            <div class="clearfix"></div>
            <!-- ============================================================== -->
            <!-- Top header  -->
            <!-- ============================================================== -->

            <!-- ======================= Searchbar Banner ======================== -->
            <div class="py-3 theme-bg searchingBar">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-xl-7 col-lg-9 col-md-9 col-sm-12 col-12">
                            @includeIf('website.search-form')
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
                            <!-- <div class="d-block position-relative text-right">
								<a href="#" onclick="openSearch()" class="mlb-btn btn ft-medium rounded text-dark bg-light"><i class="ti-bell mr-1"></i>Job Alert</a>
							</div> -->
                        </div>

                    </div>
                </div>
            </div>
            <!-- ======================= Searchbar Banner ======================== -->

            <!-- ======================= All Product List ======================== -->
            <section class="bg-light middle">
                <div class="container">

                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                            <div class="row align-items-center justify-content-between mx-0 bg-white rounded py-2 mb-4">
                                <div class="col-xl-3 col-lg-4 col-md-5 col-sm-12">
                                    <h6 class="mb-0 ft-medium fs-sm">{{ count($categories) }} Categories Found</h6>
                                </div>

                                <div class="col-xl-9 col-lg-8 col-md-7 col-sm-12">

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- row -->
                    <div class="row align-items-center">
                        @foreach ($categories as $category)
							<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6">
								<div class="cats-wrap text-center">
									<a href="{{ url('category/'.$category->category_slug) }}" class="cats-box d-block rounded bg-white px-2 py-4">
										<div class="text-center mb-2 mx-auto position-relative d-inline-flex align-items-center justify-content-center p-3 theme-bg-light circle">
											<i class="lni lni-gallery fs-lg theme-cl"></i>
										</div>
										<div class="cats-box-caption">
											<h4 class="fs-md mb-0 ft-medium m-catrio">{{ $category->category_name }}</h4>
											<span class="text-muted"> {{ $category->tenders_count }} Tender(s) </span>
										</div>
									</a>
								</div>
							</div>
						@endforeach

                    </div>
                    <!-- row -->

                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <!-- <ul class="pagination">
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
                            </ul> -->
                        </div>
                    </div>

                </div>
            </section>
            <!-- ======================= All Product List ======================== -->
        </div>
    </div>

@includeIf('website.footer')