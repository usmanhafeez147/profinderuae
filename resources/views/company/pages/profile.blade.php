@extends('company.layouts.app')
@section('content')
  <div class="right_col" role="main" style="min-height: 1164px;">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>User Profile</h3>
        </div>
      </div>
            
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>User Report <small>Activity report</small></h2>
              <ul class="nav navbar-right panel_toolbox">
                
                
              </ul>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                <div class="profile_img">
                  <div id="crop-avatar">
                    <!-- Current avatar -->
                    <img class="img-responsive avatar-view" src="{{auth()->guard('company')->getUser()->image}}" alt="Avatar" title="Change the avatar">
                  </div>
                </div>
                <h2>Company Name: {{ ucfirst(auth()->guard('company')->getUser()->name) }}</h2>
                <h2>Contact Name: {{ ucfirst(auth()->guard('company')->getUser()->contact_name) }}</h2>
                <ul class="list-unstyled user_data">
                  <li>
                    GSM: <i class="fa fa-wifi user-profile-icon"></i> {{auth()->guard('company')->getUser()->gsm}}
                  </li>
                  <li>
                    Phone 1: <i class="fa fa-mobile user-profile-icon"></i> {{auth()->guard('company')->getUser()->phone}}
                  </li>
                  <li>
                    Phone 2: <i class="fa fa-mobile user-profile-icon"></i> {{auth()->guard('company')->getUser()->phone2}}
                  </li>
                  <li>Address: <i class="fa fa-map-marker user-profile-icon"></i> {{auth()->guard('company')->getUser()->address}}
                  </li>
                  <li>Billing Address: <i class="fa fa-map-marker user-profile-icon"></i> {{auth()->guard('company')->getUser()->billing_address}}
                  </li>
                  <li class="m-top-xs">
                    Web Link: <i class="fa fa-external-link user-profile-icon"></i>
                    <a href="{{ auth()->guard('company')->getUser()->weblink}}" target="_blank">{{ auth()->guard('company')->getUser()->weblink }}</a>
                  </li>
                </ul>

                <a class="btn btn-success" href="{{ route('editCompanyProfile')}}"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                <br>

                <!-- start skills -->
                <!-- <h4>My Property</h4>
                <ul class="list-unstyled user_data">
                  <li>
                    <p>Products</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="50" aria-valuenow="49" style="width: 5%;"></div> <span>5</span>
                    </div>
                  </li>
                  <li>
                    <p>images</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 10%;">10</div>
                    </div>
                  </li>
                  <li>
                    <p>Keywords</p>
                    <div class="progress progress_sm">
                      <div class="progress-bar bg-green" role="progressbar" data-transitiongoal="70" aria-valuenow="69" style="width: 10%;">10</div>
                    </div>
                  </li>
                  
                </ul> -->
                <!-- end of skills -->

              </div>
              <div class="col-md-9 col-sm-9 col-xs-12">
                  <div id="map" style="height: 500px; width: 100%;"></div>
              </div>
                <!-- end of user-activity-graph -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection()
@push('scripts')
  <script>
    function initMap() {
      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 8,
        center: {lat: -34.397, lng: 150.644}
      });
      var geocoder = new google.maps.Geocoder();

      document.getElementById('submit').addEventListener('click', function() {
        geocodeAddress(geocoder, map);
      });
      }

      function geocodeAddress(geocoder, resultsMap) {
      var address = {{auth()->guard('company')->getUser()->address}};
      geocoder.geocode({'address': address}, function(results, status) {
        if (status === 'OK') {
        resultsMap.setCenter(results[0].geometry.location);
        var marker = new google.maps.Marker({
          map: resultsMap,
          position: results[0].geometry.location
        });
        } else {
        alert('Geocode was not successful for the following reason: ' + status);
        }
      });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBbOyo62EHt3wGViZDMqLy52x7yWJBT5ck&callback=initMap">
    </script>
@endpush()