@extends('layouts.app')
@section('content')
	<!-- process content -->
  <div class="process-content">
    <div class="container">

      <!-- SIgn Up -->
      <div class="moti-sign">
        <h3>Welcome to Profinder UAE</h3>
        <div class="form-sec">
          <div class="process-num">

          </div>

          <!-- Confirm Email -->
          <div class="confirm-email wel-come text-left"> <img height="100" width="100" src="{{ URL::asset('Dubai.png')}}" alt=" ">
            <h6>Your registration has been completed. Welcome to Profinder UAE!</h6>
            <p></p>
            <a href="{{ route('viewLoginForm')}}">login</a> </div>
        </div>
      </div>
    </div>
  </div>
@endsection
