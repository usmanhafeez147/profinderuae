@extends('company.layouts.app')
@section('content')
<div class="right_col" role="main" style="min-height: 1704px;">
    <div class="">
        <div class="row top_tiles">
        	<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Add Image <small></small></h2>
					
					<div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					
					
		     	    
					<form id="demo-form2" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('createImages')}}">
					{{ csrf_field() }}

					
					  <!-- Categories for For Product -->
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
				

					<!-- Product Full Description -->
					<div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12"></textarea>
						</div>
						@if($errors->has('description'))
						<div class="alert">{{ $errors->first('description')}}</div>
						@endif()
					</div>

					<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">Image
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<input type="file" id="image" name="image" class="form-control col-md-7 col-xs-12" accept="image/*" />
						</div>
						@if($errors->has('image'))
							<div class="alert">{{ $errors->first('image')}}</div>
						@endif()
					</div>
					
					  <div class="ln_solid"></div>
					  <div class="form-group">
						<div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
						  <button type="submit" class="btn btn-success" name="submit">Create</button>
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