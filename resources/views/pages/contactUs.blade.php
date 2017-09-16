@extends('layouts.app')
@section('content')
	<div class="header-page-title job-registration clearfix">
        <div class="title-overlay"></div>
        <div class="container">
          <h1>Contact us</h1>
          <ol class="breadcrumb">
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class="active">Contact us</li>
          </ol>
        </div> <!-- end .container -->
    </div>

	<div id="page-content" class="pt50">
   		<div class="container">
          <div class="row">
            <div class="col-sm-8 page-content">
              <div id="contact-page-map" class="white-container"></div>

              <div class="white-container mb0">
                <div class="row">
              
                  <div class="col-sm-12">
                    <h5 class="bottom-line mt10">Profinder Technology Center</h5>

                    <address>
                       Office No.22, Floor No.1, Plot No.4, Postal Code: 15258<br>
                        Alsalas Street, Al Araas Sector<br>
                      Al Ain UAE

                    </address>

                    <p>
                      Phone: <a href="tel:+971547409908">+971 5474 09908</a> <br>
                      Email: <a href="mailto:info@profinderuae.com">info@profinderuae.com</a>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-sm-4 page-sidebar">
              <aside>
                <div class="widget sidebar-widget white-container contact-form-widget">
                  <h5 class="widget-title">Send Us a Message</h5>

                  <div class="widget-content">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="alert alert-warning">{{ $error }}</li>
                        @endforeach
                    </ul>
                    @if(Session::has('status'))
                        <p class="alert alert-success">Message sent Successfully!</p>
                    @endif

                    <form class="mt30" method="post" action="{{ route('postEmail')}}">
                    	{{ csrf_field() }}
                      <div class="form-group">
                         @if(Request::old('name'))
                          <input type="text" class="form-control" name="name"  placeholder="Name" value="{{ Request::old('name')}}">
                        @else
                          <input type="text" class="form-control" name="name"  placeholder="Name" >
                        @endif()
                      </div>

                      <div class="form-group">
                        @if(Request::old('email'))
                          <input type="text" class="form-control" name="email"  placeholder="Email" value="{{ Request::old('email')}}">
                        @else
                          <input type="text" class="form-control" name="email"  placeholder="Email" >
                        @endif()
                        
                      </div>

                      <div class="form-group">
                        @if(Request::old('subject'))
                          <input type="text" class="form-control" name="subject"  placeholder="Subject" value="{{ Request::old('subject')}}">
                        @else
                          <input type="text" class="form-control" name="subject"  placeholder="Subject" >
                        @endif()
                        
                      </div>

                      <div class="form-group">
                        @if(Request::old('message'))
                          <textarea class="form-control" rows="5" name="message" placeholder="How can we help you?">{{ Request::old('message')}}</textarea>
                        @else
                          <textarea class="form-control" rows="5" name="message" placeholder="How can we help you?"></textarea>
                        @endif()
                      
                      </div>

                      <button type="submit" class="btn btn-default"><i class="fa fa-envelope-o"></i> Send Message</button>
                    </form>
                  </div>
                </div>
              </aside>
            </div>
          </div>
        </div> <!-- end .container -->	
	</div>
<!-- /.main-wrapper -->
@endsection()
@push('styles')
  <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600" rel="stylesheet">
@endpush()

@push('scripts')
  
  
@endpush()