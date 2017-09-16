@extends('layouts.app')
@section('content')
	<!-- process content -->
      <div class="process-content">
        <div class="container">

          <!-- SIgn Up -->
          <div class="moti-sign">
            <h3>Sign Up</h3>
            <div class="form-sec">
              <div class="process-num">
                 @if ($errors->any())
                  <div class="">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-warning">{{ $error }}</p>
                    @endforeach

                  </div>
                @endif
                @if(Session::has('error'))
                <div>
                     <p class="alert alert-info">{{ Session::get('error') }}</p>
                </div>
                @endif
              </div>

              <!-- Sign Up Form -->
              <?php
                if(isset($packageId) and !empty($packageId) and $packageId!=null)
                {
                  //echo registeration with packageId
                  $package=App\Models\Package::findOrFail($packageId);
                }else{
                  //echo "Registeration directly from regiter route";
                  $package=App\Models\Package::where('title','like','%Free%')->firstOrFail();
                  //dd($package);
                } 
                
              ?>
              <form action="{{ route('postRegisterForm')}}" method="post">
                
                {{ csrf_field()}}
                <input type="hidden" name="packageId" value="{{ $package->id}}">
                
                <ul class="row">
                  
                  <li class="col-md-12">
                    <input type="text" required="required" placeholder="Company Name" name="name" class="form-control" >
                  </li>
                  
                  <li class="col-md-12">
                    <input type="email" required="required" placeholder="Email" name="email" class="form-control" required>
                  </li>
                  
                  <li class="col-md-6">
                    <input type="password" required="required" placeholder="Password" name="password" class="form-control" required >
                  </li>
                  
                  <li class="col-md-6">
                    <input type="password" required="required" placeholder="Confirm Password" name="cPassword" class="form-control" required >
                  </li>

                  <li class="col-md-12">
                    <select required="required" name="city">
                      <option>Select City</option>
                      @foreach(\App\Models\City::all() as $city)
                      <option value="{{ $city->id}}">{{ $city->name}}</option>
                      @endforeach()
                    </select>
                  </li>
                  
                  <li class="col-md-12">
                    <select name="category" >
                      <option>Select Category</option>
                      @foreach(\Backpack\NewsCRUD\app\Models\Category::all() as $category)
                      <option value="{{ $category->id}}">{{ $category->name}}</option>
                      @endforeach()
                    </select>
                  </li>

                  <li class="col-md-12">
                    <input type="text" required="required" placeholder="Telephone" name="phone" class="form-control" >
                  </li>
                  
                  <li class="col-md-12">
                    <input type="checkbox" required="required" name="agreeTermConditions" > I read and agreed the company's <a href="{{ route('termOfServices')}}">Term of Services</a> 
                  </li>
                  
                  <li class="col-md-6">
                    <p>Already a member? <a href="{{ route('viewLoginForm')}}">Sign In</a></p>
                  </li>
                  
                  <li class="col-md-6"> <input type="submit" name="submit" value="Sign Up" class="btn-new"> </li>
                
                </ul>
              </form>

            </div>
          </div>
        </div>
      </div>
@endsection()