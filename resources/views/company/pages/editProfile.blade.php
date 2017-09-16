@extends('company.layouts.app')
@section('content')
<div class="right_col" role="main" style="min-height: 1704px;">
    <div class="">
        <div class="row top_tiles">
        	<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Edit Company Profile <small>{{ $company->email}}</small></h2>
					
					<div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					
					
		     	    
					<form id="demo-form2" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('updateCompanyProfile')}}">
					{{ csrf_field() }}

					  <div class="form-group {{ $errors->has('name')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Company Name<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="first-name" required="required" value="{{ $company->name}}" class="form-control col-md-7 col-xs-12" name="name">
						</div>
						@if($errors->has('name'))
						<div class="alert">{{ $errors->first('name')}}</div>
						@endif()
					  </div>

					  @if(empty($company->contact_name))
						<div class="form-group {{ $errors->has('contactName')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactName">Contact Name<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="contactName" name="contactName" required="required" class="form-control col-md-7 col-xs-12">
							</div>
							@if($errors->has('contactName'))
							<div class="alert">{{ $errors->first('contactName')}}</div>
							@endif()
						</div>
					  @else
					  <div class="form-group {{ $errors->has('contactName')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="contactName">Contact Name<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="contactName" name="contactName" required="required" class="form-control col-md-7 col-xs-12" value="{{ $company->contact_name}}">
						</div>
						@if($errors->has('contactName'))
						<div class="alert">{{ $errors->first('contactName')}}</div>
						@endif()
					  </div>
					  @endif()

					  @if(empty($company->gsm))
						<div class="form-group {{ $errors->has('gsm')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm">GSM<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="gsm" name="gsm" required="required" class="form-control col-md-7 col-xs-12">
							</div>
							@if($errors->has('gsm'))
							<div class="alert">{{ $errors->first('gsm')}}</div>
							@endif()
						</div>
					  @else
					  <div class="form-group {{ $errors->has('gsm')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="gsm">GSM<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="text" id="gsm" name="gsm" required="required" class="form-control col-md-7 col-xs-12" value="{{ $company->gsm}}">
						</div>
						@if($errors->has('gsm'))
						<div class="alert">{{ $errors->first('gsm')}}</div>
						@endif()
					  </div>
					  @endif()

					  @if(empty($company->description))
					  <div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12"></textarea>
						</div>
						@if($errors->has('description'))
						<div class="alert">{{ $errors->first('description')}}</div>
						@endif()
					  </div>
					  @else
					  <div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{ $company->description}}</textarea>
						</div>
						@if($errors->has('description'))
						<div class="alert">{{ $errors->first('description')}}</div>
						@endif()
					  </div>
					  @endif()

					  <!-- Categories for company -->
					  @if(empty($company->category_id) or $company->category_id==0)
					  <div class="form-group {{ $errors->has('category')? 'item bad' : ''}}">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >Category<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select class="select2_single form-control" name="category" id="category" required="required">
                            <option ></option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id}}">{{ $category->name}}</option>
                            @endforeach()
                          </select>
						</div>
						@if($errors->has('category'))
						<div class="alert">{{ $errors->first('category')}}</div>
						@endif()
					  </div>
					  @else
					  <div class="form-group {{ $errors->has('category')? 'item bad' : ''}}">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >Category<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select class="select2_single form-control" name="category" id="category" required="required" >
                            
                            <option></option>
                            @foreach($categories as $category)
                            	@if($category->id==$company->category_id)
                            	<option value="{{ $category->id}}" selected>{{ $category->name}}</option>
                            	@else
                            	<option value="{{ $category->id}}">{{ $category->name}}</option>
                            	@endif()
                            @endforeach()

                          </select>
						</div>
						@if($errors->has('category'))
						<div class="alert">{{ $errors->first('category')}}</div>
						@endif()
					  </div>
					 @endif()


					 <!-- Cities for company -->
					  @if(empty($company->city_id) or $company->city_id==0)
					  <div class="form-group {{ $errors->has('city')? 'item bad' : ''}}">
						<label for="city" class="control-label col-md-3 col-sm-3 col-xs-12" >City<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select id="city" class="select2_single form-control" name="city" required="required">
	                        <option ></option>
	                        @foreach($cities as $city)
	                        <option value="{{ $city->id}}">{{ $city->name}}</option>
	                        @endforeach()
	                      </select>
						</div>
						@if($errors->has('city'))
						<div class="alert">{{ $errors->first('city')}}</div>
						@endif()
					  </div>
					  @else
					  <div class="form-group {{ $errors->has('city')? 'item bad' : ''}}">
						<label for="city" class="control-label col-md-3 col-sm-3 col-xs-12" >City<span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select id="city" class="select2_single form-control" name="city" required="required" >
                            
                            <option></option>
                            @foreach($cities as $city)
                            	@if($city->id==$company->city_id)
                            	<option value="{{ $city->id}}" selected>{{ $city->name}}</option>
                            	@else
                            	<option value="{{ $city->id}}">{{ $city->name}}</option>
                            	@endif()
                            @endforeach()
                
                          </select>
						</div>
						@if($errors->has('city'))
						<div class="alert">{{ $errors->first('city')}}</div>
						@endif()
					  </div>
					 @endif()
					 
					@if(empty($company->address))
						<div class="form-group {{ $errors->has('address')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="address" name="address" required="required" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-3 col-sm-3 ">
								<input id="submit" type="button" value="Geocode">
							</div>
							@if($errors->has('address'))
							<div class="alert">{{ $errors->first('address')}}</div>
							@endif()
						</div>
						<div class="row">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Map
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <div id="map" style="height: 500px; width: 100%;"></div>
							</div>
							
						</div>
					@else
						<div class="form-group {{ $errors->has('address')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Address<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="address" name="address" required="required" value="{{ $company->address}}" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-3 col-sm-3 ">
								<input id="submit" type="button" value="Geocode">
							</div>
							@if($errors->has('address'))
							<div class="alert">{{ $errors->first('address')}}</div>
							@endif()
						</div>
						<div class="row">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address">Map
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <div id="map" style="height: 500px; width: 100%;"></div>
							</div>
						</div>
					@endif()


					@if(empty($company->billing_address))
						<div class="form-group {{ $errors->has('billingAddress')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="billingAddress">Billing Address<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="billingAddress" name="billingAddress" required="required" class="form-control col-md-7 col-xs-12">
							</div>
							<div class="col-md-3 col-sm-3 ">
								<input id="submit" type="button" value="Geocode">
							</div>
							@if($errors->has('billingAddress'))
							<div class="alert">{{ $errors->first('billingAddress')}}</div>
							@endif()
						</div>
					@else
						<div class="form-group {{ $errors->has('billingAddress')? 'item bad' : ''}}">
							<label class="control-label col-md-3 col-sm-3 col-xs-12" for="billingAddress">Billing Address <span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 col-xs-12">
							  <input type="text" id="billingAddress" name="billingAddress" required="required" value="{{ $company->billing_address}}" class="form-control col-md-7 col-xs-12">
							</div>
							
							@if($errors->has('billingAddress'))
							<div class="alert">{{ $errors->first('billingAddress')}}</div>
							@endif()
						</div>
					@endif()

					@if(empty($company->zipcode))
					  <div class="form-group {{ $errors->has('zipcode')? 'item bad' : ''}}">
						<label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">Post Code<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="zipcode" required="required" name="zipcode" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('zipcode'))
						<div class="alert">{{ $errors->first('zipcode')}}</div>
						@endif()
					  </div>
					 @else
					 <div class="form-group {{ $errors->has('zipcode')? 'item bad' : ''}}">
						<label for="zipcode" class="control-label col-md-3 col-sm-3 col-xs-12">Post Code<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="zipcode" required="required" name="zipcode" value="{{ $company->zipcode}}" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('zipcode'))
						<div class="alert">{{ $errors->first('zipcode')}}</div>
						@endif()
					 </div>
					 @endif()

					 @if(empty($company->phone))
					  
					  <div class="form-group {{ $errors->has('phone')? 'item bad' : ''}}">
						<label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="phone" required="required" name="phone" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('phone'))
						<div class="alert">{{ $errors->first('phone')}}</div>
						@endif()
					  </div>
					 @else
					 	<div class="form-group {{ $errors->has('phone')? 'item bad' : ''}}">
						<label for="phone" class="control-label col-md-3 col-sm-3 col-xs-12">Phone<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="phone" required="required" name="phone" value="{{ $company->phone}}" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('phone'))
						<div class="alert">{{ $errors->first('phone')}}</div>
						@endif()
					  </div>
					 @endif()

					 @if(empty($company->phone2))
					  
					  <div class="form-group {{ $errors->has('phone2')? 'item bad' : ''}}">
						<label for="phone2" class="control-label col-md-3 col-sm-3 col-xs-12">Phone2<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="phone2" required="required" name="phone2" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('phone2'))
						<div class="alert">{{ $errors->first('phone2')}}</div>
						@endif()
					  </div>
					 @else
					 	<div class="form-group {{ $errors->has('phone2')? 'item bad' : ''}}">
						<label for="phone2" class="control-label col-md-3 col-sm-3 col-xs-12">Phone2<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="phone2" required="required" name="phone2" value="{{ $company->phone}}" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('phone2'))
						<div class="alert">{{ $errors->first('phone2')}}</div>
						@endif()
					  </div>
					 @endif()

					 @if(empty($company->weblink))
					  <div class="form-group {{ $errors->has('weblink')? 'item bad' : ''}}">
						<label for="weblink" class="control-label col-md-3 col-sm-3 col-xs-12">Web Link<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="weblink" required="required" name="weblink" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('weblink'))
						<div class="alert">{{ $errors->first('weblink')}}</div>
						@endif()
					  </div>
					 @else
					 <div class="form-group {{ $errors->has('weblink')? 'item bad' : ''}}">
						<label for="weblink" class="control-label col-md-3 col-sm-3 col-xs-12">Web Link<span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="weblink" required="required" name="weblink" value="{{ $company->weblink}}" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('weblink'))
						<div class="alert">{{ $errors->first('weblink')}}</div>
						@endif()
					 </div>
					 @endif()

					@if(empty($compay->image))
					  <div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">Image
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="file" id="image"  name="image" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('image'))
						<div class="alert">{{ $errors->first('image')}}</div>
						@endif()
					  </div>
					 @else
					 	<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">image
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12" accept="image/*" />
						</div>
						@if($errors->has('image'))
						<div class="alert">{{ $errors->first('image')}}</div>
						@endif()
					  </div>
					 @endif()
					
					  <div class="ln_solid"></div>
					  <div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button type="submit" class="btn btn-success" name="submit">Update</button>
						</div>
					  </div>

					</form>
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
			var address = document.getElementById('address').value;
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