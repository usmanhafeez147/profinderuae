@extends('layouts.app')
@section('content')
	<div class="header-page-title clearfix">
        <div class="title-overlay"></div>
        <div class="container">
        	<div class="title-breadcrumb clearfix">
 	           <h1>News Details</h1>

	            <ol class="breadcrumb">
	              <li><a href="{{ route('home')}}">Home</a></li>
	              <li class="active">News Details</li>
	            </ol>
        	</div> <!-- end .title-breadcrumb -->
        </div> <!-- end .container -->
    </div>

    <div id="page-content" class="candidate-profile client-bg-color">
        <div class="container">
          <div class="page-content mt60">
	        <div class="row">
	            <div class="col-md-4">
	            	<div class="motijob-sidebar">
						<h2 class="text-center">Recent News</h2>
						<hr>
						@foreach(\App\Models\News::paginate(5) as $news)
                    	<div class="client-profile-deatils">
	                        <div class="title clearfix">
	                          <h6>{{$news->title}}</h6>
	                          <a class="pull-right" href="{{ route('detailedNews',$news->id)}}"><i class="fa fa-edit"></i>More</a>
	                        </div>
	                        <div class="client-sidebar-area">
	                          
	                          <p>
	                          	{{ $news->short_desc}}
	                          </p>
	                        </div>

                        </div>
                        @endforeach()
                       
                       
                       
                        <hr>
                        <h6 class="text-center"><a href="{{ route('services')}}">view All</a></h6>
	            	</div>
	            </div> <!-- end .3col grid layout -->

	            <div class="col-md-8">
	              <div class="candidate-description client-description mb30">

	                <div class="language-print text-right">
	                  <ul class="list-inline">
	                    <li class="print"><a href="#"><i class="fa fa-print"></i></a></li>
	                    <li class="star-rating"><a href="#"><i class="fa fa-star"></i></a></li>
	                  </ul>
	                </div> <!-- end .language-print -->

	                <div class="candidate-details">
	                  <div class="candidate-title">
	                    <h5>{{$news->title}}</h5>
	                  </div>

	                  <p>{{ $news->short_desc }}

	                  </p>
	                  <hr>
	                  <p>
	                   {{ $news->description }}
	                  </p>

	                </div> <!-- end .candidate-details -->

	            </div> <!-- end .9col grid layout -->

	          </div> <!-- end .row --> 
          </div> <!-- end .page-content -->
        </div> <!-- end .container -->
      </div> <!-- end #page-content -->
@endsection()

@push('styles')
@endpush()

@push('scripts')
@endpush()