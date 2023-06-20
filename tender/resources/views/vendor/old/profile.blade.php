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
        <!-- <a href="https://www.creative-tim.com" class="simple-text logo-normal"> -->
          <!-- Creative Tim -->
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        <!-- </a> -->
      </div>
      @includeIf('_partials.sidebar')
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      @includeIf('_partials.nav')
      @php
        $url = '';
        $disabled = '';
        if(Auth::user()->user_type == 1){
          $url = 'admin';
          $disabled = 'disabled';
        }
        if(Auth::user()->user_type == 2){
          $url = 'vendor';
        }
      @endphp
      <!-- End Navbar -->
      <div class="content">
        <div class="row">
          <div class="col-md-4">
          <form action="{{ url('/'.$url.'/profile/update') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="card card-user">
              <div class="image">
                <img src="../assets/img/damir-bosnjak.jpg" alt="...">
              </div>
              <div class="card-body">
                <div class="author">
                  <a href="#">
                  <img class="avatar border-gray" src="{{ isset(Auth::user()->profile_picture) ? '../uploads/profile/'.Auth::user()->profile_picture : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}" alt="...">
                    <h5 class="title">{{ Auth::user()->name }}</h5>
                  </a>
                  <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
                  <div class="form-group">
                    <p for="my-input">Upload Picture</p>
                    <input id="my-input" class="form-control" type="file" name="profile_picture" style="opacity: 1;min-height:50px;margin-top:30px">
                </div>
                  <!-- <p class="description">
                    @chetfaker
                  </p> -->
                </div>
                <!-- <p class="description text-center">
                  "I like the way you work it <br>
                  No diggity <br>
                  I wanna bag it up"
                </p> -->
              </div>
              <div class="card-footer">
                <label for="exampleInputEmail1">Upload Profile</label>
                <hr>
                <div class="button-container">
                  <div class="row">
                    <button type="submit" class="btn btn-info" name="submit" {{ $disabled }} >Update Picture</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
            {{--
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Change Password</h4>
              </div>
              <div class="card-body">
                <form method="post" action="{{ route('password.update') }}">
                    @csrf
                <ul class="list-unstyled team-members">
                  <li>
                    <div class="row">
                    <div class="col-md-8">
                    @if (Session::has('password_error'))
                        <span class="text-danger">{{ Session::get('password_error') }}</span>
                    @endif
                        <div class="form-group">
                            <p>Current Password</p>
                            <input type="password" class="form-control" name="current_password" >
                        </div>
                    </div>
                    </div>
                  </li>

                  <li>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <p>New Password</p>
                            <input type="password" class="form-control" name="password" >
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                    </div>
                  </li>

                  <li>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <p>Confirm Password</p>
                            <input type="password" class="form-control" name="password_confirmation" >
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                    @endif
                    </div>
                  </li>

                  <li>
                    <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <!-- <label>Confirm Password</label> -->
                            <button type="submit" class="btn btn-info"  {{ $disabled }} >Reset Password</button>
                        </div>
                    </div>
                    </div>
                  </li>



                  <!-- <li>
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
                  </li> -->
                </ul>
                </form>
              </div>
            </div>
            --}}
          </div>
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Edit Profile</h5>
              </div>
              <div class="card-body">
                <form action="{{ route('profile.update') }}" method="POST">
                    @csrf
                  <div class="row">
                    <!-- <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <label>Company (disabled)</label>
                        <input type="text" class="form-control" disabled="" placeholder="Company" value="Creative Code Inc.">
                      </div>
                    </div> -->
                    <input type="hidden" name="user_id" value="{{ isset(Auth::user()->id) ? Auth::user()->id : '' }}">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" value="{{ isset(Auth::user()->username) ? Auth::user()->username : '' }}">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control" name="email" value="{{ isset(Auth::user()->email) ? Auth::user()->email : '' }}" placeholder="Email">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Contact</label>
                        <input type="text" class="form-control" name="contact" value="{{ isset(Auth::user()->contact) ? Auth::user()->contact : '' }}" placeholder="Contact">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Address</label>
                        <input type="text" class="form-control" name="address" value="{{ isset(Auth::user()->address) ? Auth::user()->address : '' }}" placeholder="Address">
                      </div>
                    </div>
                    <div class="col-md-8">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Add Amount</label>
                        <input type="text" class="form-control" name="available_amount" value="{{ isset(Auth::user()->available_amount) ? Auth::user()->available_amount : '' }}" placeholder="available_amount">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row">
                    <div class="col-md-6 pr-1">
                      <div class="form-group">
                        <label>First Name</label>
                        <input type="text" class="form-control" placeholder="Company" value="Chet">
                      </div>
                    </div>
                    <div class="col-md-6 pl-1">
                      <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" value="Faker">
                      </div>
                    </div>
                  </div> -->
<!--                   <div class="row">
                    <div class="col-md-8">
                      <div class="form-group">
                        <label>Joined On</label>
                        <input type="text" disabled class="form-control" placeholder="" value="{{ isset(Auth::user()->joined_on) ? Auth::user()->joined_on : '' }}">
                      </div>
                    </div>
                  </div> -->
                  <!-- <div class="row">
                    <div class="col-md-4 pr-1">
                      <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="City" value="Melbourne">
                      </div>
                    </div>
                    <div class="col-md-4 px-1">
                      <div class="form-group">
                        <label>Country</label>
                        <input type="text" class="form-control" placeholder="Country" value="Australia">
                      </div>
                    </div>
                    <div class="col-md-4 pl-1">
                      <div class="form-group">
                        <label>Postal Code</label>
                        <input type="number" class="form-control" placeholder="ZIP Code">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>About Me</label>
                        <textarea class="form-control textarea">Oh so, your weak rhyme You doubt I'll bother, reading into it</textarea>
                      </div>
                    </div>
                  </div> -->
                  <div class="row">
                    <div class="update ml-auto mr-auto">
                      <button type="submit" class="btn btn-primary btn-round"  {{ $disabled }} >Update Profile</button>
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
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="{{ asset('assets/js/plugins/chartjs.min.js') }}"></script>
  <!--  Notifications Plugin    -->
  <script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{ asset('assets/js/paper-dashboard.min.js?v=2.0.1 ') }}" type="text/javascript"></script><!-- Paper Dashboard DEMO methods, don't include it in your project! -->
  <script src="{{ asset('assets/demo/demo.js') }}"></script>
</body>

</html>
