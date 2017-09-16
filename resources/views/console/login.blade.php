@extends('layouts.app')
@section('content')
	<!-- process content -->
  <div class="process-content">
    <div class="container">

      <!-- SIgn Up -->
      <div class="moti-sign">
        <h3>Sign in</h3>
        <div class="form-sec">
          <div class="process-num">

          @if ($errors->any())
            <div class="">
              @foreach ($errors->all() as $error)
                  <p class="alert alert-warning">{{ $error }}</p>
              @endforeach

            </div>
          @endif
          @if(Session::has('error'))
          <div>
               <p class="alert alert-info">{{ Session::get('error') }}</p>
          </div>
          @endif
           @if(Session::has('status'))
          <div>
               <p class="alert alert-info">{{ Session::get('status') }}</p>
          </div>
          @endif

          </div>

          <!-- Sign Up Form -->
          <form action="{{ route('postLoginForm')}}" method="post">
          {{ csrf_field() }}
            <ul class="row">
              <li class="col-md-12">
                <input type="text" required name="email" placeholder="Email" class="form-control" >
              </li>
              
              <li class="col-md-12">
                <input type="password" required name="password" placeholder="Password" class="form-control" >
              </li>
              <li class="col-md-6">
                <p>New member? <a href="{{ route('viewRegisterForm')}}">SignUp</a></p>
              </li>
              <li class="col-md-6"> <input type="submit" name="submit" class="btn btn-default btn-new" value="Sign in"> </li>
              <li class="col-md-12">
                <a href="{{ route('resetPassword')}}">Forgot password?</a>
              </li>
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection()