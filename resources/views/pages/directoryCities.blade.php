@extends("layouts.app")
@section('content')
	<div class="header-page-title clearfix">
        <div class="title-overlay"></div>
        <div class="container">
        	<div class="title-breadcrumb clearfix">
 	           <h1>Directories</h1>

	            <ol class="breadcrumb">
	              <li><a href="{{ route('home')}}">Home</a></li>
	              <li class="active">Directories List</li>
	            </ol>
        	</div> <!-- end .title-breadcrumb -->
        </div> <!-- end .container -->
    </div>

    <div id="page-content" class="page-content pt60">
    	<div class="container">
    		<div class="row">
    			<h5 class="widget-title text-center">City vise Directories</h5>
    		</div>
    		<hr>
      		<div class="row" id="directories">
      			
      			<div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','ajman'])}}">Ajman</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>
	            
	            <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','fujairah'])}}">Fujairah</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

			    <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','abu-dhabi'])}}">Abu Dhabi</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

	            <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','dubai'])}}">Dubai</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

	            <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','ras-al-khaimah'])}}">Ras Al Khaimah</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

	            <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','sharjah'])}}">Sharjah</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

	            <div class="col-sm-3 col-xs-6 item text-center">
	      			<div class="white-container mb0" >
	              
		              <div class="widget sidebar-widget " >
		                <div class="widget-content" >
		                  <h6><a href="{{ route('directoriesByAlphabet',['a','umm-Al-quwain'])}}">Umm Al Quwain</a></h6>
		                  
		                </div>
		              </div>
		            </div>
	            </div>

      		</div>
      	</div>
    </div>
@endsection()

@push('scripts')
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script type="text/javascript">
		/*$.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){
		 
		    $('#directories').isotope({
		      itemSelector : '.item'
		    });
	
		  
		});*/
	</script>
@endpush()