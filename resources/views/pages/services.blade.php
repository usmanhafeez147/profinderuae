@extends('layouts.app')
@section('content')
	<div class="header-page-title job-registration clearfix">
   		<div class="title-overlay"></div>
	    <div class="container">
	      <h1>News</h1>

	      <ol class="breadcrumb">
	        <li><a href="{{route('home')}}">Home</a></li>
	        <li class="active">News</li>
	      </ol>

	    </div> <!-- end .container -->

	</div> <!-- end .header-page-title -->
	<!-- Page Content -->

	<div id="page-content" class="page-content pt60">
    <div class="container">
        <div class="row">
        	<div class="col-md-3 page-sidebar">
	          <aside>
	            <div class="white-container mb0">
	              
	              <div class="widget sidebar-widget jobs-filter-widget">
	                <h5 class="widget-title">Filter Results</h5>

	                <div class="widget-content">
	                  <h6>Top News</h6>
	                  <div>
	                    <ul class="filter-list">
	                     @foreach ($topNewses as $news)
	                      <li><a href="{{ route('detailedNews', $news->id)}}">{{ $news->title}}</a></li>
	                      @endforeach()
	                    </ul>

	                    <a href="#" class="toggle"></a>
	                  </div>
	                </div>
	              </div>
	            </div>
	          </aside>
	        </div><!-- end .page-sidebar -->

            <div class="col-sm-9 page-content" id="content">
				@foreach($newses as $news)
					<div class="candidate-description client-description applicants-content">
		                <div class="language-print client-des clearfix">
		                 	<div class="aplicants-pic pull-left">
			                    <img src="{{ $news->image}}" alt="{{ $news->title}}">
	                  		</div>
						
							<!-- end .aplicants-pic -->
							<div class="clearfix">
								<div class="pull-left">
								  <h5>{{ $news->title}}</h5>
								  
								</div>
							</div>

							<div class="aplicant-details-show clearfix">
								<p>
									{{ $news->short_desc}}
								</p>

								<ul class="list-unstyled pull-left">
								  <li>
								    <span>Created At: <b class="aplicant-detail">{{ $news->created_at}}</b></span>
								  </li>
								</ul>

							</div>

						<!-- end .aplicant-details-show -->
                		</div> <!-- end .language-print -->

						<div class="candidate-details">
							<div class="toggle-content-client">
							    <div class="candidate-title">
							      <h5>{{ $news->title }}</h5>
							    </div>
							    <p>
							    	{{$news->description}}
							    </p>
							    <div class="apply-share clearfix">

							      <ul class="list-inline pull-left job-preview-social-link">
							        <li class="share">Share:</li>
							       
							        <li class="facebook-color"><a href="https://www.facebook.com/sharer.php?u={{ Request::fullUrl(). '/details/' .$news->id }}"><i class="fa fa-facebook"></i></a></li>
							        <li class="twitt-color"><a href="http://www.twitter.com/share?url={{ Request::fullUrl(). '/details/' .$news->id}}"><i class="fa fa-twitter"></i></a></li>
							        <li class="pinterest-color"><a href="https://plus.google.com/share?url={{ Request::fullUrl(). '/details/' .$news->id}}"><i class="fa fa-google-plus"></i></a></li>
							      </ul>
							    </div>
							    <!-- end .apply-share -->
							</div>
							<!-- end .toggle-content-client -->

							<div class="toggle-details text-right">
								<a class="btn btn-toggle" href="#">Info</a>
							</div>
							<div class="text-right">
			                  <a class="btn btn-default" href="{{ route('detailedNews',$news->id)}}">View Detailed</a>
			                </div>
				 			<!-- end .toggle-details -->
						</div> <!-- end .candidate-details -->
              		</div> <!-- end .candidate-description -->
              	@endforeach()
              	<div class="pagination-content clearfix pb20">
		            {{$newses->render()}}
		        </div>
    		</div> <!-- end .page-content -->
    		
		</div>
	</div> <!-- end .container -->
</div> <!-- end #page-content -->
@endsection()

@push('styles')
  <style type="text/css">
    .pagination-content ul li a{
      padding-bottom:100% ; 
    }
  </style>
@endpush()

@push('scripts')
 
@endpush()