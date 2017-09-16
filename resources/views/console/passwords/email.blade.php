@extends('layouts.app')
@section('content')
    <div class="process-content">
        <div class="container">

          <!-- SIgn Up -->
          <div class="moti-sign">
            <h3>Reset Password</h3>
            <div class="form-sec">
              <div class="process-num">
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
              </div>

              <!-- Sign Up Form -->
              <form action="{{ url('/company_password/email') }}" method="post">
              {{ csrf_field() }}
                <ul class="row">

                  <li class="col-md-12">
                    <input type="text" name="email" placeholder="Email" class="form-control" value="{{ old('email') }}" required >
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                  </li>
                    
                  <li class="col-md-12"> <input type="submit" name="submit" class="btn btn-default btn-new" value="Send Password Reset Link"> </li>
                  
                </ul>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection()