@extends('layouts.app')
@section('content')
  
<div class="header-page-title our-agents-header">
  <div class="title-overlay">
  </div>

  <div class="container">
    <div class="title-breadcrumb clearfix">
      <h1>Our Companies</h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('home')}}">Home</a></li>
        <li class="active">Companies</li>
      </ol>
    </div>
    <!-- end .title-breadcrumb -->
  </div>
  <!-- end .container -->
</div>

<div id="page-content" class="page-content pt60">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
              <div class="col-md-3 col-sm-3">
                <aside>
                  <div class="white-container mb0">
                    
                    <div class="widget sidebar-widget jobs-filter-widget">
                      <h5 class="widget-title">Filter Results</h5>

                      <div class="widget-content">
                        <h6>Top Companies</h6>
                        <div>
                          <ul class="filter-list">
                           @foreach ($topCompanies as $company)
                            <li><a href="{{ route('merchantDetails', $company->id)}}">{{ $company->name}}</a></li>
                            @endforeach()
                          </ul>

                          <a href="#" class="toggle"></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </aside>
              </div>
              <div class="col-md-9 col-sm-9">
                @if($companies->isEmpty())
                  <center ><h1>No record Found</h1></center>
                @else
                  <div class="row" id="companies">
                    <?php $item=1; ?>
                    @forelse($companies as $company)
                      <div id="{{$item}}" class="item col-sm-4 col-xs-12">
                        <div class="agent-single">
                          @if($company->image==null)
                          <img src="{{ URL::asset('img/notFound.png')}}" style="height: 225px;" alt="{{ $company->name }}">
                          @else
                          <img src="{{$company->image}}" style="height: 225px;" alt="{{ $company->name}}">
                          @endif()
                          <ul>
                            <li><span class="title">Name: </span><span class="text-capitalize">{{ $company->name}}</span></li>
                          
                            <li><span class="title">Address:</span><span class="title-des">{{ $company->address }}</span></li>
                          </ul>

                          <div class="view-profile">
                            <a href="{{ route('merchantDetails', $company->id)}}" class="btn btn-default">View Company Profile</a>
                          </div>
                        </div> <!-- end .agent-single  -->
                      </div> <!-- end grid layout  -->
                      <?php $item=$item+1; ?>
                    @endforeach()
                  </div> <!-- end .row -->
                @endif()
              </div>
            </div>

            <div class="pagination-content clearfix pb20">
               <div class="col-md-3"></div>
               <div class="col-md-9">
                  {{$companies->render()}}
               </div>
            </div>
         </div>
         <!-- end .col -->
      </div>
      <!-- end .row -->      
   </div>
   <!-- end container -->
</div>
<!-- end #page-content -->
@endsection()

@push('styles')
  <style type="text/css">
    .agent-single{
      position:relative;
    }
    .view-profile{
      left: 0;
      right: 0;
      margin-left: auto;
    position: absolute;
    bottom: 15px;
    }

    .pagination-content ul li a{
      padding-bottom:100% ; 
    }
    .row-eq-height {
      display: -webkit-box;
      display: -webkit-flex;
      display: -ms-flexbox;
      display:         flex;
    }
  </style>
@endpush()

@push('scripts')
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
  <script type="text/javascript">
    $(function() {
        $('.agent-single').matchHeight(false);
    });
  </script>
  <!-- ISOTope layouts -->
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script type="text/javascript">
    $.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){
     
        $('#companies').isotope({
          itemSelector : '.item'
        });
  
      
    });
  </script>
@endpush()