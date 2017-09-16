@extends('company.layouts.app')
@section('content')
  <div class="right_col" role="main" style="min-height: 1704px;">
    <div class="">
        <div class="row top_tiles">
            <section class="content-header">
              <h1>
                Dashboard <small> Welcome to Company Dashboard</small>
              </h1>
           
            </section>
            <section class="content-body">
              <div class="row">
              <div class="col-md-12">
                @if($package->title)
                  @if($package->title=="Free")
                    <h3>You are Registered with <span class="badge badge-lg bg-red">{{ $package->title}}</span> package.</h3>
                  @else
                  <h3>You are Registered with <span class="badge badge-lg bg-green">{{ $package->title}}</span> package.</h3>
                  @endif()
                @endif()
              </div>
              </div>
              <hr>
              <h3 class="text-center">Your Package have</h3>
              <div class="row top_tiles">
                @if(!empty($package->products) and $package->products>0)
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                    <div class="count">{{ $package->products}}</div>
                    <h3>Avail Products</h3>
                  </div>
                </div>
                @endif()

                 @if(!empty($package->photos) and $package->photos>0)
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                    <div class="count">{{ $package->photos}}</div>
                    <h3>Avail Images</h3>
                  </div>
                </div>
                @endif()
                
                @if(!empty($package->keywords) and $package->keywords>0)
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                  <div class="tile-stats">
                    
                    <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
                    <div class="count">{{ $package->keywords}}</div>
                    <h3>Avail Keywords</h3>
                  </div>
                </div>
                @endif()
                
              </div>
              <hr>
              <!-- pricing table -->
              <h1 class="text-center">Subscribe Premium packages</h1>
              <div class="row">

                      <!-- <div class="col-md-12">

                        <!-- price element 
                        <div class="col-md-3 col-sm-6 col-xs-12">
                          <div class="pricing">
                            <div class="title">
                              <h2>Tally Box Design</h2>
                              <h1>$25</h1>
                              <span>Monthly</span>
                            </div>
                            <div class="x_content">
                              <div class="">
                                <div class="pricing_features">
                                  <ul class="list-unstyled text-left">
                                    <li><i class="fa fa-check text-success"></i> 2 years access <strong> to all storage locations</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> storage</li>
                                    <li><i class="fa fa-check text-success"></i> Limited <strong> download quota</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Cash on Delivery</strong></li>
                                    <li><i class="fa fa-check text-success"></i> All time <strong> updates</strong></li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Unlimited</strong> access to all files</li>
                                    <li><i class="fa fa-check text-success"></i> <strong>Allowed</strong> to be exclusing per sale</li>
                                  </ul>
                                </div>
                              </div>
                              <div class="pricing_footer">
                                <a href="javascript:void(0);" class="btn btn-success btn-block" role="button">Download <span> now!</span></a>
                                <p>
                                  <a href="javascript:void(0);">Sign up</a>
                                </p>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- price element 
                      </div> -->
                    </div>
            </section>
        </div>
    </div>
  </div>
@endsection()