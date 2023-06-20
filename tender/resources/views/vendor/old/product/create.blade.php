<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    {{ Auth::user()->name }} Portal
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('assets/css/paper-dashboard.css?v=2.0.1') }}" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="{{ asset('assets/demo/demo.css') }}" rel="stylesheet" />

</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="https://www.creative-tim.com" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="../assets/img/logo-small.png">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="https://www.creative-tim.com" class="simple-text logo-normal">
          Creative Tim
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      @includeIf('_partials.sidebar')
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      @includeIf('_partials.nav')
      @php
      $redirect = '';
          if(Auth::user()->user_type == 2){
            $redirect = 'vendor';
          }
          if(Auth::user()->user_type == 1){
            $redirect = 'admin';
          }
      @endphp
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Add Product</h5>
              </div>
              <div class="card-body">
                <form action="{{ url('/'.$redirect.'/products') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Category</label>
                        <select name="category_id" id="" class="form-control">
                            <option value="">Select Category</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}"> {{ $cat->category_name }} </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Sub Category</label>
                        <select name="subcategory_id" id="" class="form-control">
                            <option value="">Select Sub Category</option>
                            @foreach ($subcategories as $sub_cat)
                                <option value="{{ $sub_cat->id }}"> {{ $sub_cat->subcategory_name }} </option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" class="form-control" name="product_title" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Sub Title</label>
                        <input type="text" class="form-control" name="subtitle" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" class="form-control" name="product_price" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Inventory</label>
                        <input type="number" class="form-control" name="product_inventory" value="" >
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Product Description</label>
                        <textarea name="product_description" class="form-control" id="summernote" cols="30" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 pr-1">
                      <div class="form-group">
                        <label>Product Thumbnail</label>
                        <input type="file" name="product_thumbnail" id="" class="form-control" style="opacity: 1; min-height: 40px; margin-top:30px">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10">
                      <div class="form-group">
                        <label>Product Status</label>
                        <select name="product_status" id="" class="form-control" style="margin-top:30px">
                            <option value="1">Active</option>
                            <option value="2">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div>

              <div class="text-center pt-5">
                <p>Product Images</p>
                </div>
                <table class="table" style="width: 100%;">
                    <thead>
                        <th>Upload Image(s)</th>
                    </thead>

                    <tbody>
                        <tr>
                            <td><input type="file" name="image[]" multiple ></td>
                            <!-- <td><button type="submit" class="btn btn-info btn-sm">Save Image</button></td> -->
                        </tr>
                    </tbody>
                </table>

                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Save Product</button>
                    </div>
                  </div>


                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <!--<div class="container-fluid">-->
        <!--  <div class="row">-->
        <!--    <nav class="footer-nav">-->
        <!--      <ul>-->
        <!--        <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>-->
        <!--        <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>-->
        <!--        <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>-->
        <!--      </ul>-->
        <!--    </nav>-->
        <!--    <div class="credits ml-auto">-->
        <!--      <span class="copyright">-->
        <!--        © <script>-->
        <!--          document.write(new Date().getFullYear())-->
        <!--        </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim-->
        <!--      </span>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->
  <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
  <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js') }}"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1 ') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  <!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

</body>

</html>
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>
