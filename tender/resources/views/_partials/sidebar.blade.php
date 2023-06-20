    <div class="sidebar" data-color="white" data-active-color="danger">
      <div class="logo">
        <a href="{{ url('/') }}" target="_blank" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{ isset(Auth::user()->profile_picture) ? '../uploads/profile/'.Auth::user()->profile_picture : 'https://upload.wikimedia.org/wikipedia/commons/1/14/No_Image_Available.jpg?20200913095930' }}">
          </div>
          <!-- <p>CT</p> -->
        </a>
        <a href="{{ url('/') }}" target="_blank" class="simple-text logo-normal">
          {{ Auth::user()->username }}
          <!-- <div class="logo-image-big">
            <img src="../assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      @php
      $user_type = '';
      if(Auth::user()->user_type == 1){
        $user_type = 'admin';
      }
      if(Auth::user()->user_type == 2){
        $user_type = 'vendor';
      }
      @endphp

    <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="{{ url('/'.$user_type.'/dashboard') }}">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/'.$user_type.'/categories') }}">
              <i class="nc-icon nc-diamond"></i>
              <p>Categories</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/'.$user_type.'/subcategories') }}">
              <i class="nc-icon nc-diamond"></i>
              <p>Sub Categories</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/'.$user_type.'/locations') }}">
              <i class="nc-icon nc-diamond"></i>
              <p>Locations</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/'.$user_type.'/tenders') }}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Tenders</p>
            </a>
          </li>
          <li>
            <a href="{{ url('/'.$user_type.'/orders') }}">
              <i class="nc-icon nc-bell-55"></i>
              <p>Manage Orders</p>
            </a>
          </li>
          @if(Auth::user()->user_type == 1)
          <li>
            <a href="{{ url('/admin/users') }}">
              <i class="nc-icon nc-pin-3"></i>
              <p>Users</p>
            </a>
          </li>
          @endif
          <!-- <li class="active ">
            <a href="./user.html">
              <i class="nc-icon nc-single-02"></i>
              <p>User Profile</p>
            </a>
          </li>
          <li>
            <a href="./tables.html">
              <i class="nc-icon nc-tile-56"></i>
              <p>Table List</p>
            </a>
          </li>
          <li>
            <a href="./typography.html">
              <i class="nc-icon nc-caps-small"></i>
              <p>Typography</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="./upgrade.html">
              <i class="nc-icon nc-spaceship"></i>
              <p>Upgrade to PRO</p>
            </a>
          </li> -->
        </ul>
      </div>
    </div>
