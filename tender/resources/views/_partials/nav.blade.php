<nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="javascript:;">{{ Auth::user()->user_type == 1 ? 'Admin' : 'Vendor' }} Portal</a>

          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="javascript:;" id="navbarDropdownMenuLinkSetting" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
                @php
                  $url = '';
                  if(Auth::user()->user_type == 1){
                    $url = 'admin';
                  }
                  if(Auth::user()->user_type == 2){
                    $url = 'vendor';
                  }
                @endphp
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLinkSetting">
                    <a class="dropdown-item" href="{{ url('/'.$url.'/profile') }}">Profile Setting</a>
                    @if(Auth::user()->user_type == 2)
                    <a class="dropdown-item" href="{{ url('/'.$url.'/business') }}">Business Settings</a>
                    @endif
                    <a class="dropdown-item" href="{{ url('/'.$url.'/logout') }}">Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
