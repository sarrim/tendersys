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
                <h4 class="card-title"> List of All Orders</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th> Order # </th>
                      <th> Username </th>
                      <th> User Email </th>
                      @if(Auth::user()->user_type == 1)
                      <th> Vendor Name </th>
                      <th> Vendor Email </th>
                      @endif
                      <th> Product </th>
                      <th> Thumbnail </th>
                      <th> Quantity </th>
                      <th> Amount </th>
                      <th> Buyer Status </th>
                      <th> Vendor Status </th>
                      <th> Payment Status </th>
                      <th class="text-right"> Action </th>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                        @php
                          $type = '';
                          if(Auth::user()->user_type == 1){
                            $type = 'admin';
                          }
                          if(Auth::user()->user_type == 2){
                            $type = 'vendor';
                          }
                        @endphp
                        <tr>
                          <td> {{ $order->order->order_no }} </td>
                          <td> {{ isset($order->user->username) ? $order->user->username : '' }} </td>
                          <td> {{ isset($order->user->email) ? $order->user->email : '' }} </td>
                          @if(Auth::user()->user_type == 1)
                            <td> {{ isset($order->vendor[0]->username) ? $order->vendor[0]->username : 'Not available'; }} </td>
                            <td> {{ isset($order->vendor[0]->email) ? $order->vendor[0]->email : 'Not available'; }} </td>
                          @endif
                          <td> {{ isset($order->product[0]) ? $order->product[0]->product_title : 'Product Not Found' }} </td>
                          <td> @if(isset($order->product[0])) <img src='{{ asset("uploads/products/".$order->product[0]->product_thumbnail) }}' style="width: 200px;" alt=""> 
                              @endif
                          </td>
                          <td> {{ $order->quantity }} </td>
                          <td> {{ $order->order->order_amount  }} </td>
                          <td>
                              {{ $order->order->order_status == 1 ? 'Pending' : '' }}
                              {{ $order->order->order_status == 2 ? 'Accepted' : '' }}
                              {{ $order->order->order_status == 3 ? 'Rejected' : '' }}
                          </td>
                          @if($order->order->order_status != 1)
                          <td>
                            <form action="{{ url('/'.$type.'/order/update/'.$order->order->id) }}" method="get" accept-charset="utf-8">
                            <select name="vendor_status" {{ $type == 'admin' ? 'disabled=disabled' : '' }} {{ $order->order->vendor_status != 1 ? 'disabled=disabled' : '' }} >
                              <option value="1" {{ $order->order->vendor_status == 1 ? 'selected=selected' : '' }} >Pending</option>
                              <option value="2" {{ $order->order->vendor_status == 2 ? 'selected=selected' : '' }}>Product Received</option>
                              <option value="3" {{ $order->order->vendor_status == 3 ? 'selected=selected' : '' }}>Product Returned</option>
                            </select>
                          </td>
                          @endif
                          <td>
                              {{ $order->order->payment_status == 1 ? 'Pending' : '' }}
                              {{ $order->order->payment_status == 2 ? 'Transferred to Seller' : '' }}
                              {{ $order->order->payment_status == 3 ? 'Returned to Buyer' : '' }}
                          </td>
                          <td class="text-right">
                            @if(Auth::user()->user_type == 1)
                              @if($order->order->payment_status == 1)
                                <a href="{{ url('admin/order/payment-status?order_id='.$order->order->id.'&payment_status=2&user_id='.$order->user->id.'&vendor_id='.$order->vendor_id) }}"> Confirm Payment </a>
                                &nbsp; &nbsp; <br>
                                <a href="{{ url('admin/order/payment-status?order_id='.$order->order->id.'&payment_status=3&user_id='.$order->user->id.'&vendor_id='.$order->vendor_id) }}"> Return Payment </a>
                              @endif
                              <br>
                            @else
                              <button type="submit" class="btn btn-info btn-sm">Update</button><br>
                            @endif
                          <a href="{{ url('order/details/'.$order->order->id) }}"> View Details </a>
                            </form>
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
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <!-- <ul>
                <li><a href="https://www.creative-tim.com" target="_blank">Creative Tim</a></li>
                <li><a href="https://www.creative-tim.com/blog" target="_blank">Blog</a></li>
                <li><a href="https://www.creative-tim.com/license" target="_blank">Licenses</a></li>
              </ul> -->
            </nav>
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
