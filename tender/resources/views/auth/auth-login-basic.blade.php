@extends('layouts/blankLayout')

@section('title', 'Login - Page')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="https://demos.themeselection.com/sneat-bootstrap-html-laravel-admin-template-free/demo/assets/vendor/css/pages/page-auth.css">
@endsection

@section('content')
<div class="container-xxl">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner">
      <!-- Register -->
      <div class="card">
        <div class="card-body">
          <!-- Logo -->
          <div class="app-brand justify-content-center">
            <a href="{{url('/')}}" class="app-brand-link gap-2">
              <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'#696cff'])</span>
              <span class="app-brand-text demo text-body fw-bolder">{{config('variables.templateName')}}</span>
            </a>
          </div>
          <!-- /Logo -->
          <h4 class="mb-2">Welcome to {{config('variables.templateName')}}! 👋</h4>
          <p class="mb-4">Please sign-in to your account and start the adventure</p>
            @if(isset ($errors) && count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if(Session::has('message'))
                <div class="alert alert-danger" role="alert">
                    <ul class="list-unstyled mb-0">
                        <li>{{ Session::get('message') }}</li>
                    </ul>
                </div>
            @endif

          <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">

            @csrf
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" id="email" name="username" value="{{ old('username') }}" placeholder="Enter your email or username" autofocus autocomplete="off">
            </div>
            <div class="mb-3 form-password-toggle">
              <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Password</label>
                {{--
                <a href="{{url('auth/forgot-password-basic')}}">
                  <small>Forgot Password?</small>
                </a>
                --}}
              </div>
              <div class="input-group input-group-merge">
                <input type="password" id="password" class="form-control" name="password" value="{{ old('password') }}" aria-describedby="password" autocomplete="off" />
                <!-- <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span> -->
              </div>
            </div>
            <div class="mb-3">
              <!-- <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember-me">
                <label class="form-check-label" for="remember-me">
                  Remember Me
                </label>
              </div> -->
            </div>
            <div class="mb-3">
              <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
            </div>
          </form>

          <p class="text-center">
            <span>New on our platform?</span>
            <a href="{{url('vendor/register')}}">
              <span>Create an account</span>
            </a>
          </p>
        </div>
      </div>
    </div>
    <!-- /Register -->
  </div>
</div>
</div>
@endsection
