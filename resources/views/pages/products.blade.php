@extends('layouts.app')
@section('content')
  	<div class="header-page-title our-agents-header">
  	    <div class="title-overlay">
  	    	
  	    </div>
  	    <div class="container">
  	      <div class="title-breadcrumb clearfix">
  	        <h1>Products</h1>

  	        <ol class="breadcrumb">
  	          <li><a href="#">Home</a></li>
  	          <li class="active">Products</li>
  	        </ol>
  	      </div> <!-- end .title-breadcrumb -->

  	    </div> <!-- end .container -->
  	</div> <!-- end .header-nav-bar -->

  	<div id="page-content" class="agent-profile">
      <div class="container">
        <div class="page-content mt60">
          <div class="row">
            <div class="col-md-3 page-sidebar">
              <aside>
                <div class="white-container mb0">
                  <div class="widget sidebar-widget jobs-search-widget">
                    <h5 class="widget-title">Filter</h5>

                    <div class="widget-content">
                      <span class="search-tex">I'm looking for a ...</span>

                      <form method="get" action="{{ route('productsByCategory')}}">
                        <select class="form-control mt10 mb10" name="categoryId">
                          @foreach($offers as $offer)
                          <option value="{{ $offer->id}}">{{ $offer->name}}</option>
                          @endforeach()
                        </select>
                         <input type="submit" class="btn btn-default" value="Search">
                      </form>

                     

                    </div>
                  </div>

                  <div class="widget sidebar-widget jobs-filter-widget">
                    <h5 class="widget-title">Filter Results</h5>

                    <div class="widget-content">
                      <h6>By Merchants</h6>

                      <div>
                        <ul class="filter-list">
                          @foreach($merchants as $merchant)
                          <li><a href="{{ route('merchantDetails', $merchant->id)}}">{{ $merchant->name}} </a></li>
                          @endforeach()
                        </ul>

                        <a href="#" class="toggle"></a>
                      </div>
                    </div>
                  </div>
                </div>
              </aside>
            </div>
            <div class="col-md-9 page-content">
              <div class="main-content" id="add-client">
                <div class="table-responsive-small">
                  <div class="clients-list">
                    <table id="example" class="display" cellspacing="0" width="100%">
                      <thead>
                          <tr>
                              <th>Product Image</th>
                              <th>Product Name</th>
                              <th>Product Company</th>
                              <th>Quantity</th>
                          </tr>
                      </thead>
                      <tfoot>
                          <tr>
                              <th>Product Image</th>
                              <th>Product Name</th>
                              <th>Product Company</th>
                              <th>Position</th>
                              
                          </tr>
                      </tfoot>
                      <tbody>
                        @foreach($products as $product)
                        <tr >
                            <td class="company-logo-area css-table-cell">
                              <img src="{{ $product->photo}}" alt="" height="100" width="100"> 
                            </td>

                            <td class="job-description">
                              <a href="#">{{ $product->name}}</a>
                            </td>

                            <td class="company-name">

                              <h4><a href="{{ route('merchantDetails', $product->company_id)}}">{{ $product->company_id }}</a></h4>

                                
                            </td>
                            <td class="days-left css-table-cell">
                                <div class="days-left css-table-cell">
                                  <h4>{{ $product->quantity}}</h4>
                                </div>
                            </td> 
                        </tr>
                        @endforeach()
                      </tbody>
                    </table>
                    <div>
                      {{ $products->render()}}
                    </div>  
                  </div> <!-- end .assigned-job-list -->
                </div>
              </div> <!-- end .main-content -->
            </div> <!-- end 9th grid layout -->
          </div> <!-- end .row -->
        </div> <!-- end container -->
      </div> <!-- end .page-content -->
    </div> <!-- end #page-content -->
@endsection()

@push('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush()
@push('scripts')
 <script type="text/javascript">
      $(document).ready(function() {
      $('#example').DataTable( {
          "pagingType": "full_numbers"
      } );
  } );

  </script>
  <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
 
  
@endpush()