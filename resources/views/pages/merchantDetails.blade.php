@extends('layouts.app')
@section('content')
<div class="header-page-title our-agents-header">
 <div class="title-overlay">
 </div>
 <div class="container">
    <div class="title-breadcrumb clearfix">
       <h1>Company profile</h1>
       <ol class="breadcrumb">
          <li><a href="{{ route('home')}}">Home</a></li>
          <li class="active">Merchant profile</li>
       </ol>
    </div>
    <!-- end .title-breadcrumb -->
 </div>
 <!-- end .container -->
</div>
<!-- end .header-nav-bar -->
<div id="page-content" class="agent-profile">
   <div class="container">
      <div class="page-content mt60">
         <div class="row">
            <div class="col-md-3">
               <div class="motijob-sidebar">
                  <div class="candidate-profile-picture">
                     <img src="{{ $company->image}}" alt="">
                     <a href="{{ route('merchantDetails', $company->id)}}">{{ $company->name}}</a>
                  </div>
                  <!-- end .agent-profile-picture -->
                  <div class="agent-details">
                     <div class="title clearfix">
                        <h6>Merchant Detail</h6>
                     </div>
                     <!-- end .title -->
                     <div class="agent-address">
                        <!-- <p><i class="fa fa-map-marker"></i>{{ $company->city->name}}</p> -->
                      
                        <!-- <p><i class="fa fa-phone"></i>{!! $company->phone !!}</p> -->
                        <!-- <br>
                        <p><i class="fa fa-envelope"></i><a href="mailto:{!! $company->email !!}">{{ $company->email}}</a></p>
                        <br> -->
                        <!-- <p><i class="fa fa-link"></i><a href="{!! $company->weblink!!}">{!! $company->weblink !!}</a></p>
                        <br> -->
                       <!--  <p><i class="fa fa-map-marker"></i>{!! $company->address !!}</p> -->
                     
                     </div>
                     <!-- end agent-address -->
                  </div>
                  <!-- end agent-details -->
                  
                  <!-- <div class="agent-assigned-jobs">
                     <div class="title">
                        <h6>Products</h6>
                        <p>This Merchant has <strong>{{ $noOfProduct}}</strong> products</p>
                     </div>
                  </div> -->
               </div>
            </div>
            <!-- end 3rd grid .page-sidebar layout -->
            <div class="col-md-9">
               <div class="candidate-description">
                  <div class="candidate-details">
                     <div class="candidate-title">
                        <h5>Company Description</h5>
                        <p><?php echo $company->description; ?></p>

                        <hr>
                        <div class="row">
                          @if(Session::has('review_posted'))
                            <div class="alert alert-success">
                              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <h5>Your review has been posted!</h5>
                            </div>
                          @endif()
                          <form action="{{ route('rateCompany', $company->id)}}" method="post">
                            {{ csrf_field() }}
                            <div class="col-sm-12">
                               <input id="input-1" name="rating" class="rating rating-loading" data-min="0" data-max="5" data-step="1">
                               <input type="submit" name="submit" value="submit Review" class="btn btn-default pull-right">
                            </div>
                           
                          </form>
                        </div>
                     </div>
                     
                    
                     <div id="exTab2">
                        <ul class="nav nav-tabs">
                          <!--  <li >
                              <a  href="#1" data-toggle="tab">Contact</a>
                           </li>-->
                          
                           <li class="active">
                              <a href="#3" data-toggle="tab">Map</a>
                           </li>
                           <li>
                              <a href="#4" data-toggle="tab">Review</a>
                           </li>
                        </ul>
                        <div class="tab-content ">
                      <!-- <div class="tab-pane active" id="1">
                              <div class="agent-details">
                                 <div class="agent-address">
                                    <p><i class="fa fa-map-marker"></i>{{ $company->city->name}}</p>
                                   <!--  <p><i class="fa fa-phone"></i>{!! $company->phone !!}</p> 
                                    <p><i class="fa fa-envelope"></i><a href="mailto:{!! $company->email !!}">{!! $company->email !!}</a></p>
                                    <p><i class="fa fa-link"></i><a href="{!! $company->weblink !!}">{!! $company->weblink !!}</a></p>
                                    <p id="address">{!! $company->address !!}</p>
                                 </div>
                                 <!-- end agent-address 
                              </div>
                           </div>-->
                          
                          <!--  <div class="tab-pane" id="2">
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
                                          <h4><a href="{{ route('merchantDetails', $product->company_id)}}">{{ $company->name }}</a></h4>
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
                           </div> -->
                           
                           <div class="tab-pane active" id="3">
                              <!-- <div style="width:600px; height:300px;" id="map_canvas">
                              </div> -->
                           </div>
                           <div class="tab-pane" id="4">
                              @foreach($reviews as $review)
                                <hr>
                                  <div class="row">
                                    <div class="col-md-12">
                                      @for ($i=1; $i <= 5 ; $i++)
                                        <span class="glyphicon glyphicon-star{{ ($i <= $review->rating) ? '' : '-empty'}}"></span>
                                      @endfor

                                      {{ $review->user ? $review->user->name : 'Anonymous'}} <span class="pull-right">{{$review->timeago}}</span> 
                                      
                                      <p>{{{$review->comment}}}</p>
                                    </div>
                                  </div>
                                @endforeach()
                               
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- end .candidate-details -->
               </div>
               <!-- end .candidate-description -->
               <ul class="list-inline job-preview-social-link mt20">
                  <li class="share">Share:</li>
                  <li class="facebook-color"><a href="https://www.facebook.com/sharer.php?u={{ Request::fullUrl()}}"><i class="fa fa-facebook"></i></a></li>
                  <li class="twitt-color"><a href="http://www.twitter.com/share?url={{ Request::fullUrl()}}"><i class="fa fa-twitter"></i></a></li>
                  <li class="pinterest-color"><a href="https://plus.google.com/share?url={{ Request::fullUrl()}}"><i class="fa fa-google-plus"></i></a></li>
               </ul>
            </div>
            <!-- end .9col grid layout -->
         </div>
         <!-- end .row -->
      </div>
      <!-- end container -->
   </div>
   <!-- end .page-content -->
</div>
<!-- end #page-content -->
</div>
@endsection()

@push('styles')
  

  <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  <link href="{{ URL::asset('rating/css/star-rating.css')}}" media="all" rel="stylesheet" type="text/css" />

  <!-- optionally if you need to use a theme, then include the theme CSS file as mentioned below -->
  <link href="{{ URL::asset('rating/themes/krajee-svg/theme.css') }}" media="all" rel="stylesheet" type="text/css" />

  <!-- important mandatory libraries -->


  <!-- optionally if you need translation for your language then include locale file as mentioned below -->
  <!-- <script src="{{ URL::asset('rating/js/locales/<lang>.js') }}"></script> -->

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
<!-- 
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script> -->
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBYoz0vvR1UyyVjKREkttQL6dZp89ccmE8&callback=initialize"
  type="text/javascript"></script>
@endpush()
@push('scripts')
 <script type="text/javascript">
      $(document).ready(function() {
      $('#example').DataTable( {
          "pagingType": "full_numbers"
      } );
  } );

  </script>
  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
   <script src="{{ URL::asset('rating/js/star-rating.js')}}" type="text/javascript"></script>

  <!-- optionally if you need to use a theme, then include the theme JS file as mentioned below -->
  <script src="{{ URL::asset('rating/themes/krajee-svg/theme.js') }}"></script>

  <script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
  jQuery(document).ready(function () {
            $("#input-21f").rating({
                starCaptions: function (val) {
                    if (val < 3) {
                        return val;
                    } else {
                        return 'high';
                    }
                },
                starCaptionClasses: function (val) {
                    if (val < 3) {
                        return 'label label-danger';
                    } else {
                        return 'label label-success';
                    }
                },
                hoverOnClear: false
            });
            var $inp = $('#rating-input');

            $inp.rating({
                min: 0,
                max: 5,
                step: 1,
                size: 'lg',
                showClear: false
            });

            $('#btn-rating-input').on('click', function () {
                $inp.rating('refresh', {
                    showClear: true,
                    disabled: !$inp.attr('disabled')
                });
            });


            $('.btn-danger').on('click', function () {
                $("#kartik").rating('destroy');
            });

            $('.btn-success').on('click', function () {
                $("#kartik").rating('create');
            });

            $inp.on('rating.change', function () {
                alert($('#rating-input').val());
            });


            $('.rb-rating').rating({
                'showCaption': true,
                'stars': '3',
                'min': '0',
                'max': '3',
                'step': '1',
                'size': 'xs',
                'starCaptions': {0: 'status:nix', 1: 'status:wackelt', 2: 'status:geht', 3: 'status:laeuft'}
            });
            $("#input-21c").rating({
                min: 0, max: 8, step: 0.5, size: "xl", stars: "8"
            });
        });
    </script>
  <script type="text/javascript">
    var address=document.getElementById('address').innerHTML;
    console.log(address);
    var geocoder;
    var map;
 
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(-34.397, 150.644);
      var myOptions = {
        zoom: 8,
        center: latlng,
      mapTypeControl: true,
      mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
      navigationControl: true,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      };
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
      if (geocoder) {
        geocoder.geocode( { 'address': address}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
            map.setCenter(results[0].geometry.location);

              var infowindow = new google.maps.InfoWindow(
                  { content: '<b>'+address+'</b>',
                    size: new google.maps.Size(150,50)
                  });

              var marker = new google.maps.Marker({
                  position: results[0].geometry.location,
                  map: map, 
                  title:address
              }); 
              google.maps.event.addListener(marker, 'click', function() {
                  infowindow.open(map,marker);
              });

            } else {
              alert("No results found");
            }
          } else {
            alert("Geocode was not successful for the following reason: " + status);
          }
        });
      }
    }
  </script>
@endpush()