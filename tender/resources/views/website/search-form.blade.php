                            <form class="bg-white rounded p-1" method="get" action="{{ url('/') }}">
								<div class="row no-gutters">
									<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control lg left-ico" name="tender_title" placeholder="Keyword " />
											<i class="bnc-ico lni lni-search-alt"></i>
										</div>
									</div>
<!-- 									<div class="col-xl-3 col-lg-3 col-md-2 col-sm-12 col-12">
									</div> -->
<!-- 									<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<input type="text" class="form-control lg left-ico" name="location" placeholder="Location" />
											<i class="bnc-ico lni lni-target"></i>
										</div>
									</div> -->
									<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<select class="custom-select lg b-0" name="category">
											  <option value="">Choose Category</option>
											  	@foreach ($categories as $category)
											  		<option value="{{ $category->id }}"> {{ $category->category_name }} </option>
											  	@endforeach
											</select>
										</div>
									</div>
									<div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-12">
										<div class="form-group mb-0 position-relative">
											<button class="btn full-width custom-height-lg theme-bg text-white fs-md" type="submit">Search Now</button>
										</div>
									</div>
								</div>
							</form>