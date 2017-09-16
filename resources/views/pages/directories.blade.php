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
    			
    			<h5 class="widget-title text-center">Filter By Alphabet</h5>
    		</div>

    		<div class="row">
	    		<div class="col-sm-2">
	    			<a class="btn btn-default btn-block" href="{{ route('directories')}}">Back to Cities</a>
	    		</div>
	    		<div class="col-sm-10">
	    			<div class="pagination-content">
	                <nav >
	                  <ul class="list-inline">
	                    <li class="{{ Request::is('directories/alphabet/a/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['a',$city])}}">a</a></li>

	                    <li class="{{ Request::is('directories/alphabet/b/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['b',$city])}}">b</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/c/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['c',$city])}}">c</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/d/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['d',$city])}}">d</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/e/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['e',$city])}}">e</a></li>

	                    <li class="{{ Request::is('directories/alphabet/f/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['f',$city])}}">f</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/g/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['g',$city])}}">g</a></li>

	                    <li class="{{ Request::is('directories/alphabet/h/city/' . $city)? 'active':''}}">
	                    	<a class="number" href="{{ route('directoriesByAlphabet',['h',$city])}}">h</a>
	                    </li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/i/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['i',$city])}}">i</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/j/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['j',$city])}}">j</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/k/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['k',$city])}}">k</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/l/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['l',$city])}}">l</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/m/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['m',$city])}}">m</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/n/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['n',$city])}}">n</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/o/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['o',$city])}}">o</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/p/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['p',$city])}}">p</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/q/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['q',$city])}}">q</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/r/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['r',$city])}}">r</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/s/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['s',$city])}}">s</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/t/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['t',$city])}}">t</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/u/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['u',$city])}}">u</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/v/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['v',$city])}}">v</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/w/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['w',$city])}}">w</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/x/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['x',$city])}}">x</a></li>
	                   
	                    <li class="{{ Request::is('directories/alphabet/y/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['y',$city])}}">y</a></li>
	                    
	                    <li class="{{ Request::is('directories/alphabet/z/city/' . $city)? 'active':''}}"><a class="number" href="{{ route('directoriesByAlphabet',['z',$city])}}">z</a></li>
	                  </ul>
	                </nav>
            	</div>
	    		</div>
    			
    		</div>
    		<hr/>

			@if($directories->isEmpty())
  				<center ><h1>No record Found</h1></center>
  			@else
    			<?php $item=1; ?>
	      		<div class="row" id="directories">
	      			@foreach($categories as $category)
	      				<?php 
	      				$listDir=$directories->where('industry',$category->industry); 
	      				?>
	      				@if($listDir->isEmpty())
	      					
	      				@else
			      			<div id="{{$item}}" class="col-sm-4 col-xs-6 item">
				      			
			                    <ul class="list-group" >
			                    	<a href="#" class="list-group-item active">
			                    	{{$category->industry}} </a>
			                    	@foreach($listDir as $directory)

				                    	@if($directory->industry==$category->industry)
				                    		<li class="list-group-item">
				                      			<a style="color: black;" href="{{ route('directoryDetails',$directory->id)}}">{{ $directory->name}}</a>
				                    		</li>
				                    	@endif()
			                    	@endforeach()
			                    </ul>
					             
					            <div class="clearfix"></div>
					           
				            </div>
				        @endif()
				        <?php $item=$item+1; ?>
		            @endforeach()
		        	
	      		</div>
	      		<div>
	      			
	      		</div>
      		@endif()
      	</div>
    </div>
@endsection()

@push('scripts')
	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
	<script type="text/javascript">
		$.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){
		 
		    $('#directories').isotope({
		      itemSelector : '.item'
		    });
	
		  
		});
	</script>
@endpush()