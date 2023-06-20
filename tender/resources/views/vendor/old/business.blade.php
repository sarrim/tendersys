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
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
            <form action="{{ route('business.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body" style="min-height: 150px !important">
                <div class="author">
                  <a href="#">
                    <img class="avatar border-gray" src="{{ isset($get_business->business_logo) ? '../uploads/business/logo/'.$get_business->business_logo : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}" alt="...">
                    <h5 class="title">{{ isset($get_business->business_name) ? $get_business->business_name : '' }}</h5>
                  </a>
                  <input type="hidden" name="business_id" value="{{ isset($get_business->id) ? $get_business->id : '' }}">
                </div>
                <div class="form-group">
                    <p for="my-input">Upload Logo</p>
                    <input id="my-input" class="form-control" type="file" name="business_logo" style="opacity: 1;min-height:50px;margin-top:30px">
                </div>
                <!-- <p class="description text-center">
                  "I like the way you work it <br>
                  No diggity <br>
                  I wanna bag it up"
                </p> -->
              </div>
              <div class="card-footer">
                <label for="exampleInputEmail1">Upload Business Logo</label>
                <hr>
                <div class="button-container">
                  <div class="row">
                    <button type="submit" class="btn btn-info" name="submit">Update Logo</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
            <!-- <div class="card">
              <div class="card-header">
                <h4 class="card-title">Business User</h4>
              </div>
              <div class="card-body">
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/ayo-ogunseinde-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        DJ Khaled
                        <br />
                        <span class="text-muted"><small>Offline</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/joe-gardner-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-md-7 col-7">
                        Creative Tim
                        <br />
                        <span class="text-success"><small>Available</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="row">
                      <div class="col-md-2 col-2">
                        <div class="avatar">
                          <img src="../assets/img/faces/clem-onojeghuo-2.jpg" alt="Circle Image" class="img-circle img-no-padding img-responsive">
                        </div>
                      </div>
                      <div class="col-ms-7 col-7">
                        Flume
                        <br />
                        <span class="text-danger"><small>Busy</small></span>
                      </div>
                      <div class="col-md-3 col-3 text-right">
                        <btn class="btn btn-sm btn-outline-success btn-round btn-icon"><i class="fa fa-envelope"></i></btn>
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
            </div> -->
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Business Details</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('business.update') }}" method="POST">
                    @csrf
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Business Name</label>
                        <input type="text" class="form-control" name="business_name" placeholder="Business" value="{{ isset($get_business->business_name) ? $get_business->business_name : '' }}">
                      </div>
                    </div>
                    <input type="hidden" name="business_id" value="{{ isset($get_business->id) ? $get_business->id : '' }}">
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email_address" value="{{ isset($get_business->email_address) ? $get_business->email_address : '' }}" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Contact Person</label>
                        <input type="text" class="form-control" name="contact_person" value="{{ isset($get_business->contact_person) ? $get_business->contact_person : '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input type="text" class="form-control" name="contact_number" placeholder="" value="{{ isset($get_business->contact_number) ? $get_business->contact_number : '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" name="business_city" value="{{ isset($get_business->business_city) ? $get_business->business_city : '' }}" class="form-control" >
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="business_address" placeholder="Business Address" value="{{ isset($get_business->business_address) ? $get_business->business_address : '' }}">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>Latitude</label>
                        <input type="text" class="form-control" name="business_latitude" placeholder="Latitude" value="{{ isset($get_business->business_latitude) ? $get_business->business_latitude : ''  }}">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Longitude</label>
                        <input type="text" class="form-control" name="business_longitude" placeholder="Longitude" value="{{ isset($get_business->business_longitude) ? $get_business->business_longitude : '' }}">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Status</label>
                        <select name="business_status" id="" class="form-control">
                            <option value="1">Active</option>
                            <option value="2">In active</option>
                        </select>
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About</label>
                        <textarea name="business_profile" class="form-control textarea"> {{ isset($get_business->business_profile) ? $get_business->business_profile : '' }} </textarea>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round">Update Details</button>
                    </div>
                  </div>
                </form>
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
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1 ') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>

  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
// if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(function (p) {
//         var LatLng = new google.maps.LatLng(p.coords.latitude, p.coords.longitude);
//         var mapOptions = {
//             center: LatLng,
//             zoom: 13,
//             mapTypeId: google.maps.MapTypeId.ROADMAP
//         };
//         var map = new google.maps.Map(document.getElementById("dvMap"), mapOptions);
//         var marker = new google.maps.Marker({
//             position: LatLng,
//             map: map,
//             title: "<div style = 'height:60px;width:200px'><b>Your location:</b><br />Latitude: " + p.coords.latitude + "<br />Longitude: " + p.coords.longitude
//         });
//         document.getElementById('latitude').value = p.coords.latitude;
//         document.getElementById('longitude').value = p.coords.longitude;
//         google.maps.event.addListener(marker, "click", function (e) {
//             var infoWindow = new google.maps.InfoWindow();
//             infoWindow.setContent(marker.title);
//             infoWindow.open(map, marker);
//         });
//     });
// } else {
//     alert('Geo Location feature is not supported in this browser.');
// }

function initGeolocation()
     {
        if( navigator.geolocation )
        {
           // Call getCurrentPosition with success and failure callbacks
           navigator.geolocation.getCurrentPosition( success, fail );
        }
        else
        {
           alert("Sorry, your browser does not support geolocation services.");
        }
     }

     function success(position)
     {
        console.log(position)
         document.getElementById('longitude').value = position.coords.longitude;
         document.getElementById('latitude').value = position.coords.latitude
     }

     function fail()
     {
        // Could not obtain location
        console.log('error');
     }


</script>


</body>

</html>
