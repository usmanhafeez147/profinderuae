@extends('layouts.app')
@section('content')

<div class="process-content">
    <div class="container">

      <!-- SIgn Up -->
      <div class="moti-sign">
        <h3>Reset Password</h3>
        <div class="form-sec">
            <div class="process-num">
               @if(Session::has('status'))
              <div>
                   <p class="alert alert-info">{{ Session::get('status') }}</p>
              </div>
              @endif

            </div>

          <!-- Sign Up Form -->
          <form action="{{ url('/company_password/reset') }}" method="post">
          {{ csrf_field() }}
            <ul class="row">
              
              <li class="col-md-12">
                <input type="email" name="email" placeholder="Email" class="form-control" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
              </li>
              
              <li class="col-md-12">
                <input type="password" name="password" placeholder="Password" class="form-control" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </li>

              <li class="col-md-12">
                <input type="password" name="password_confirmation" placeholder="Password" class="form-control" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
              </li>
              
              <li class="col-md-12"> <input type="submit" name="submit" class="btn btn-default btn-new" value="Reset Password"> </li>
              
            </ul>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection()