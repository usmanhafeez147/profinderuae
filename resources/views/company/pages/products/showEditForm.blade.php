@extends('company.layouts.app')
@section('content')
<div class="right_col" role="main" style="min-height: 1704px;">
    <div class="">
        <div class="row top_tiles">
        	<div class="row">
			  <div class="col-md-12 col-sm-12 col-xs-12">
				<div class="x_panel">
				  <div class="x_title">
					<h2>Add Product <small></small></h2>
					
					<div class="clearfix"></div>
				  </div>
				  <div class="x_content">
					
					<form id="demo-form2" method="post" enctype="multipart/form-data" class="form-horizontal form-label-left" action="{{ route('updateProducts',$product->id)}}">
					{{ csrf_field() }}

						<!-- product Name -->
					@if(!empty($product->name))
					<div class="form-group {{ $errors->has('name')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="name" required="required" value="{{ $product->name }}" class="form-control col-md-7 col-xs-12" name="name">
						</div>
						@if($errors->has('name'))
						<div class="alert">{{ $errors->first('name')}}</div>
						@endif()

					</div>
					@else
					<div class="form-group {{ $errors->has('name')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Product Name <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text" id="name" required="required" class="form-control col-md-7 col-xs-12" name="name">
						</div>
						@if($errors->has('name'))
						<div class="alert">{{ $errors->first('name')}}</div>
						@endif()

					</div>
					@endif()

					<!-- Categories for For Product -->
					@if(!empty($product->category_id))
					<div class="form-group {{ $errors->has('category')? 'item bad' : ''}}">
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >Product Category <span class="required">*</span></label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <select class="select2_single form-control" name="category" id="category" required="required" >
                            
                            <option></option>
                            @foreach($categories as $category)
                            	@if($category->id==$product->category_id)
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
						<label for="category" class="control-label col-md-3 col-sm-3 col-xs-12" >Product Category <span class="required">*</span></label>
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
					
					@if(!empty($product->price))
					<div class="form-group {{ $errors->has('price')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Product Price <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="number" id="price" required="required" value="{{ $product->price }}" class="form-control col-md-7 col-xs-12" name="price">
						</div>
						@if($errors->has('name'))
						<div class="alert">{{ $errors->first('name')}}</div>
						@endif()
					</div>
					@else
					<div class="form-group {{ $errors->has('price')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="price">Product Price <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="number" id="price" required="required" class="form-control col-md-7 col-xs-12" name="price">
						</div>
						@if($errors->has('name'))
						<div class="alert">{{ $errors->first('name')}}</div>
						@endif()
					</div>
					@endif()

					<!-- Product Short Description -->
					@if(!empty($product->short_desc))
					<div class="form-group {{ $errors->has('short_desc')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="short_desc">Short Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text"  id="short_desc" name="short_desc" value="{{ $product->short_desc }}" required="required" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('short_desc'))
						<div class="alert">{{ $errors->first('short_desc')}}</div>
						@endif()
					</div>
					@else
					<div class="form-group {{ $errors->has('short_desc')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="short_desc">Short Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <input type="text"  id="short_desc" name="short_desc"  required="required" class="form-control col-md-7 col-xs-12">
						</div>
						@if($errors->has('short_desc'))
						<div class="alert">{{ $errors->first('short_desc')}}</div>
						@endif()
					</div>
					@endif()

					<!-- Product Full Description -->
					@if(!empty($product->description))
					<div class="form-group {{ $errors->has('description')? 'item bad' : ''}}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Full Description <span class="required">*</span>
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
						  <textarea  id="description" name="description" required="required" class="form-control col-md-7 col-xs-12">{{ $product->description }}</textarea>
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

					@if(!empty($product->photo))
					<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image
						</label>
						<div class="col-md-6 col-sm-6 col-xs-12">
							<img src="{{$product->photo}}" height="100" width="100">
							<input type="file" value="{{ $product->photo}}" id="image" name="image" class="form-control col-md-7 col-xs-12" accept="image/*" />
						</div>
						@if($errors->has('image'))
							<div class="alert">{{ $errors->first('image')}}</div>
						@endif()
					</div>
					@else
					<div class="form-group {{ $errors->has('image')? 'item bad' : ''}}">
						<label for="image" class="control-label col-md-3 col-sm-3 col-xs-12">Product Image
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
