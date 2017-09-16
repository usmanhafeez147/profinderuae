@extends('company.layouts.app')
@section('content')
<div class="right_col" role="main" style="min-height: 1704px;">
    <div class="">
        <div class="row top_tiles">
        	<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Update Image <small></small></h2>
					
					<div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					
					
		     	    
					<form id="demo-form2" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('updateImages',$image->id)}}">
					{{ csrf_field() }}

					<!-- Categories for For Images -->
					@if(!empty($image->category_id))
					<div class="form-group {{ $errors->has('category')? 'item bad' : ''}}">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >image Category <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select class="select2_single form-control" name="category" id="category" required="required" >
        
                            <option></option>
                            @foreach($categories as $category)
                            	@if($category->id==$image->category_id)
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
					@else
					<div class="form-group {{ $errors->has('category')? 'item bad' : ''}}">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >Image Category <span class="required">*</span></label>
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
					@endif()

					<!-- image Full Description -->
					@if(!empty($image->description))
					<div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Full Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{ $image->description }}</textarea>
						</div>
						@if($errors->has('description'))
						<div class="alert">{{ $errors->first('description')}}</div>
						@endif()
					</div>
					@else
					<div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Full Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12"></textarea>
						</div>
						@if($errors->has('description'))
						<div class="alert">{{ $errors->first('description')}}</div>
						@endif()
					</div>
					@endif()

					@if(!empty($image->image))
					<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12"> Image
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<img src="{{$image->image}}" height="100" width="100">
							<input type="file" value="{{ $image->image}}" id="image" name="image" class="form-control col-md-7 col-xs-12" accept="image/*" />
						</div>
						@if($errors->has('image'))
							<div class="alert">{{ $errors->first('image')}}</div>
						@endif()
					</div>
					@else
					<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12"> Image
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
@endpush()
