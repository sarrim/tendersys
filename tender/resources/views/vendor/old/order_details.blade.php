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
            <img src="{{ asset('assets/img/logo-small.png') }}">
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
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Order Shipment Details</h4>
              </div>
              <div class="card-body" style="padding:50px">
                @if(!empty($order))
                <div class="row">
                  <label>User: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->order->name }}</p>
                </div>
                <div class="row">
                  <label>Email: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->order->email }}</p>
                </div>
                <div class="row">
                  <label>Contact: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->order->contact }}</p>
                </div>
                <div class="row">
                  <label>Shipping Address: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->order->shipping_address }}</p>
                </div>
                <div class="row">
                  <label>Product: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->product[0]->product_title }}</p>
                </div>
                <div class="row">
                  <label>Quantity: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->quantity }}</p>
                </div>
                <div class="row">
                  <label>Price: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->amount }}</p>
                </div>
                <div class="row">
                  <label>Amount: &nbsp; &nbsp;</label><br>
                  <p>{{ $order->product[0]->product_price * $order->quantity }}</p>
                </div>
                @endif

              </div>

              @php
                $type = '';
                if(Auth::user()->user_type == 1){
                  $type = 'admin';
                }
                if(Auth::user()->user_type == 2){
                  $type = 'vendor';
                }
              @endphp
                <a href="{{ url('/'.$type.'/orders') }}" title="" class="btn btn-info btn-sm col-sm-3">Back</a>
            </div>
          </div>

        </div>
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <!-- <nav class="footer-nav">
              <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul>
            </nav> -->
            <div class="credits ml-auto">
              <!-- <span class="copyright">
                © <script>
                  document.write(new Date().getFullYear())
                </script>, made with <i class="fa fa-heart heart"></i> by Creative Tim
              </span> -->
            </div>
          </div>
        </div>
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
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
</body>

</html>
