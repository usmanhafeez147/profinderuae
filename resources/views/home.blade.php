@extends('layouts.app')
@section('content')
  <!-- Page Content -->
  <div id="page-content">
    <div class="index-page-search-content">
      <div id="owl-demo" class="owl-carousel owl-theme">
        @foreach($sliderPhotos as $Image)
          <div class="item"
            style="background: url('{{ $Image->image_path }}') center center no-repeat; background-size: 100% 100%;">
          </div>
        @endforeach()
      </div>     
      <div class="container">
        <div class="search-holder">
          
          <h1>WELCOME TO</h1>
          <h2>UAE Business Directory</h2>

          <div id="header-search">
            <div class="header-search-bar">
              <div class="">
                <form action="{{ route('searchRes')}}" class="form form-horizontal" method="post">
                  {{ csrf_field() }}
                  <div class="basic-form clearfix">
                    <a href="#" class="toggle"><span></span></a>
                    
                    <div class="hsb-input-1">
                      <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                    </div>

                    <div class="hsb-text-1">in</div>
    
                    <div class="hsb-container"> 
                      <div class="hsb-select">
                        <select class="form-control" name="location1" placeholder="Select Location">
                          <option value="0">Select Location</option>
                          <option value="0">Select All</option>
                          @foreach($cities as $city)
                              <option value="{{ $city->id }}">{{ $city->name }}</option>
                          @endforeach()
                        </select>
                      </div>

                      <div class="hsb-select">
                        <select class="form-control" name="category1" placeholder="Select Category">
                          <option value="0">Select Category</option>
                          <option value="0">Select All</option>
                            @foreach($offers as $offer)
                                <option value="{{ $offer->id }}">{{ $offer->name}}</option>
                            @endforeach()
                        </select>
                      </div>
                    </div>

                    <div class="hsb-submit">
                      <button type="submit" class="btn btn-default btn-block"><i class="fa fa-search"></i><span>Search</span></button>
                    </div>        
                  </div>
                  
                  <div class="advanced-form">
                    <div class="row">
                      <label class="col-md-3">Location</label>
                      <div class="col-md-9">
                        <select class="form-control" name="location2" placeholder="Select Location">
                          <option value="0">Select Location</option>
                          <option value="0">Select All</option>
                          @foreach($cities as $city)
                              <option value="{{ $city->id }}">{{ $city->name }}</option>
                          @endforeach()
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <label class="col-md-3">Category</label>
                      <div class="col-md-9">
                        <select class="form-control" name="category2" placeholder="Select Category">
                          <option value="0">Select Category</option>
                          <option value="0">Select All</option>
                            @foreach($offers as $offer)
                                <option value="{{ $offer->id }}">{{ $offer->name}}</option>
                            @endforeach()
                        </select>
                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end .container -->
  </div>
  
  <div id="page-content" style="background-color:#262626;padding-top:20px; padding-bottom: 20px;">
    <div class="container">
      <div class="row">
        <div class="tag-list" style="background-color:#262626;">
          @foreach($topOffers as $offer)
            <a href="{{ route('merchantsByCategory',$offer->id)}}" class="btn btn-default" role="button"><b>{{ ucfirst($offer->name) }}</b> <small></small></a>
          @endforeach()
          <a href="{{ route('offers')}}" class="btn btn-default" role="button"><b>More</b> <small></small></a>
        </div>
      </div>
    </div>
  </div>

  <!-- Page Content-->
  <div id="page-content">

    <!-- nav End -->
    <div class="container">
      <div class="page-content">
        <div class="agent-title">
          <h1><b>Featured Companies </b><span class="fa fa-user" aria-hidden="true"></span></h1>
        </div> <!-- end .agent-title  -->
        
        <div class="row" id="content">
          <?php $item=1; ?>
          @foreach($companies as $company)
            <div id="{{$item}}" class="item col-sm-3">
              <div class="agent-single">
                <img src="{{$company->image}}" style="height: 225px;" alt="{{ $company->name}}">

                <ul>
                  <li><span class="title">Name: </span><span class="text-capitalize">{{ $company->name}}</span></li>
                  <!-- <li><span class="title">Tel:</span><span class="title-des">{{$company->phone}}</span></li>
                  <li><span class="title">Email:</span><span class="title-des">{{ $company->email}}</span></li>
                  <li><span class="title">City:</span><span class="title-des">{{ $company->city->name}}</span></li> -->
                  <li><span class="title">Category:</span><span class="title-des">{{ $company->category->name }}</span></li>
                </ul>

                <div class="view-profile">
                  <a href="{{ route('merchantDetails', $company->id)}}" class="btn btn-default">View Company Profile</a>
                </div>
              </div> <!-- end .agent-single  -->
            </div> <!-- end grid layout  -->
            <?php $item=$item+1; ?>
          @endforeach()
        </div> <!-- end .row -->
        <div class="pagination-content clearfix pb20">
          {{$companies->render()}}
        </div>
      </div> <!-- end container -->
    </div> <!-- end .page-content -->

  </div> <!-- end #page-content -->

  <div id="page-content" style="background-color:#262626; color:white; ">
    <div class="container">
      <div class="row" style="">
        <div class="container home_promote">
           <div role="main" class="main">
              <div class="container">
                 <div class="row pt-lg">
                    <div class="col-md-8 appear-animation fadeInLeft appear-animation-visible" data-appear-animation="fadeInLeft">

                      <div class="agent-title">
                        <h1><span class="fa fa-bullhorn" aria-hidden="true"></span> <b>Promote Your <a >Business</a> in <strong><a >UAE  </a></strong></b></h1>
                      </div>
                       <div class="row">

                          <div class="col-sm-6">
                             <div class="feature-box">
                                <div class="feature-box-info">
                                   <h4 class="heading-primary mb-none">Featured Lisitng <span class="fa fa-list" aria-hidden="true"></span></h4>
                                   <p class="tall">Get a Featured Lisiting in the Directory</p>
                                </div>
                             </div>
                             <div class="feature-box">
                              
                                <div class="feature-box-info">
                                   <h4 class="heading-primary mb-none">Banner Advertising <span class="fa fa-picture-o" aria-hidden="true"></span></h4>
                                   <p class="tall">Reach Your target audience in <a>Dubai</a></p>
                                </div>
                             </div>
                             <div class="feature-box">
                                <div class="feature-box-info">
                                   <h4 class="heading-primary mb-none">Newsletter Advertising <span class="fa fa-newspaper-o" aria-hidden="true"></span></h4>
                                   <p class="tall">Reach over 1.5 Registered Users</p>
                                </div>
                             </div>
                             <div class="feature-box">
                               
                                <div class="feature-box-info">
                                   <h4 class="heading-primary mb-none">Facebook Marketing <span class="fa fa-facebook" aria-hidden="true"></span></h4>
                                   <p class="tall">Reach 40,000+ Facebook Followers</p>
                                </div>
                             </div>
                          </div>
                          <div class="col-sm-6">
                             <div class="feature-box">
                                <div class="feature-box-info">
                                   <h4 class="heading-primary mb-none">Company Profile <span class="fa fa-cog" aria-hidden="true"></span></h4>
                                   <p class="tall">Editorial + Product pictures</p>
                                </div>
                             </div>

                          </div>
                       </div>
                    </div>
                    <div class="col-md-4 appear-animation fadeInRight appear-animation-visible" data-appear-animation="fadeInRight">
                       <h2>and more...</h2>
                       <div class="panel-group" id="accordion" >
                          <div class="panel panel-primary" style="background-color:#262626; color:white; ">
                             <div class="panel-heading">
                                <h4 class="panel-title">
                                   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                   <i class="fa fa-usd"></i>
                                   Membership Plan
                                   </a>
                                </h4>
                             </div>
                             <div id="collapseOne" class="accordion-body collapse in">
                                <div class="panel-body">
                                   Promote your products/services in the <a href="#">Dubai</a> markets. Choose one of our Membership Plans.<br>
                                   <a class="btn btn-default mb-xl radius4 top10" href="{{ route('viewLoginForm')}}"><i class="fa fa-user"></i> Membership Plans</a>
                                </div>
                             </div>
                          </div>
                          <div class="panel panel-primary" style="background-color:#262626; color:white; ">
                             <div class="panel-heading">
                                <h4 class="panel-title">
                                   <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                   <i class="fa fa-film"></i>
                                   Banner Advertisement
                                   </a>
                                </h4>
                             </div>
                             <div id="collapseThree" class="accordion-body collapse">
                                <div class="panel-body">
                                   Advertise on <a href="#">Dubai Business Pages</a>. Buy online banners and reach your target audience in <a href="#">Dubai</a>.<br>
                                   <a class="btn btn-default mb-xl radius4 top10" href=""><i class="fa fa-bullhorn"></i> Advertise</a>
                                </div>
                             </div>
                          </div>
                       </div>
                    </div>
                 </div>
              </div>
           </div>
        </div>
      </div>
    </div>
  </div>

  <div id="page-content" style="background-color:#D9D9D9;">

    <!-- nav End -->
    <div class="container">
      <div class="page-content">
        <div class="agent-title">
          <h1><b>Our Packages </b><span class="fa fa-square-o" aria-hidden="true"></span></h1>
        </div> <!-- end .agent-title  -->
        @if($packages->isEmpty())
          <center ><h1>No record Found</h1></center>
        @else
          <div class="container">
            <div class="row ">
                <!-- <div class="col-sm-4 my_planHeader my_plan1">
                    <div class="my_planTitle">
                      Service Name
                    </div>
                </div> -->

                <div class="col-xs-12  col-sm-12">
                    <div class="row">
                      <div class="col-xs-4 hidden-xs my_planHeader my_plan1">
                        <div class="my_planDuration"> </div>
                        <div class="my_planDuration"> </div>
                        <div class="my_planTitle">Service Name</div>
                        <div class="my_planDuration"> </div>
                        <div class="my_planDuration"> </div>
                      </div>
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-2 my_planHeader my_plan1">
                            <div class="my_planDuration"> </div>
                            <div class="my_planDuration"> </div>
                            @if($package->title=="Free")
                            <div class="my_planTitle">Profinder {{ $package->title}}</div>
                            @else
                            <div class="my_planTitle">{{ $package->title}}</div>
                            @endif()
                            <div class="my_planDuration"> </div>
                            <div class="my_planDuration"> </div>
                            <!-- <a type="button" class="btn btn-default">Sign Up</a> -->
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Company Name <i class="fa fa-building" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1 text-center">
                            @if($package->company_name==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
              <div class="col-xs-12 col-sm-4 my_feature">
                  Address <i class="fa fa-map-marker" aria-hidden="true"></i>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="row">
                      @foreach($packages as $package)
                      <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                          @if($package->address==0)
                          <i class="fa fa-times"></i>
                          @else
                           <i class="fa fa-check my_check"></i>
                          @endif()
                      </div>
                      @endforeach()
                  </div>
              </div>
            </div>

            <div class="row my_featureRow">
              <div class="col-xs-12 col-sm-4 my_feature">
                  Company Logo <i class="fa fa-picture-o" aria-hidden="true"></i>
              </div>
              <div class="col-xs-12 col-sm-8">
                  <div class="row">
                      @foreach($packages as $package)
                      <div class="col-xs-3 col-sm-3 my_planFeature my_plan1 text-center">
                          @if($package->logo==0)
                          <i class="fa fa-times"></i>
                          @else
                           <i class="fa fa-check my_check"></i>
                          @endif()
                      </div>
                      @endforeach()
                  </div>
              </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Telephone/Landline <i class="fa fa-phone-square" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->telephone==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Fax <i class="fa fa-fax" aria-hidden="true"></i> 
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->fax==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    GSM/Mobile <i class="fa fa-mobile" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->gsm==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>


            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Service Number <i class="fa fa-server" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->service_no==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Line of Business <i class="fa fa-briefcase" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->line_of_business==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Photos <i class="fa fa-file-image-o" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->photos==0 or empty($package->photos))
                            <i class="fa fa-times"></i>
                            @else
                             {{ $package->photos}}
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Videos <i class="fa fa-video-camera" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->videos==0 or empty($package->videos))
                            <i class="fa fa-times"></i>
                            @else
                             {{ $package->videos}}
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>


            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Keywords <i class="fa fa-key" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->keywords==0 or empty($package->keywords))
                            <i class="fa fa-times"></i>
                            @else
                             {{ $package->keywords}}
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Webpage Link <i class="fa fa-link" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->web_page_link==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Email Link <i class="fa fa-envelope" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->email_link==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Business Hours <i class="fa fa-clock-o" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->business_hours==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Google Map Link <i class="fa fa-globe" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->google_map_link==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                    Social Media Links <i class="fa fa-share-square" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            @if($package->social_media_links==0)
                            <i class="fa fa-times"></i>
                            @else
                             <i class="fa fa-check my_check"></i>
                            @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  Website <i class="fa fa-sitemap" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                      @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                           @if($package->title=="Free")
                             <i class="fa fa-times"></i>
                           @else
                              <p class="textd text-center">On demand</p>
                          @endif()
                        </div>
                      @endforeach()
                    </div>
                </div>
            </div>
            
            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  Application <i class="fa fa-check-circle" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                  <div class="row">
                    @foreach($packages as $package)
                      <div class="col-xs-3 col-sm-3  my_planFeature my_plan1 ">
                        @if($package->title=="Free")
                          <i class="fa fa-times"></i>
                        @else
                          <p class="textd text-center">On demand</p>
                          
                        @endif()
                      </div>
                    @endforeach()
                  </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  Presentation of Your Products and Services <i class="fa fa-eye" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                  <div class="row">
                    @foreach($packages as $package)
                      <div class="col-xs-3 col-sm-3  my_planFeature my_plan1">
                        @if($package->title=="Profinder Basic")
                          <i class="fa fa-times"></i>
                        @elseif($package->title=="Free")
                          <i class="fa fa-times"></i>
                        @elseif($package->title=="Profinder Premium")
                          <i class="fa fa-check my_check"></i>
                        @elseif($package->title=="Profinder Ultimate")
                          <i class="fa fa-check my_check"></i>
                        @endif()
                      </div>
                    @endforeach()
                  </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  3 Additional lines of business <i class="fa fa-bars" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3  my_planFeature my_plan1">
                          @if($package->title=="Profinder Basic")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Free")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Profinder Premium")
                            <i class="fa fa-check my_check"></i>
                          @elseif($package->title=="Profinder Ultimate")
                            <i class="fa fa-check my_check"></i>
                          @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  driving directions <i class="fa fa-compass" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3  my_planFeature my_plan1">
                          @if($package->title=="Profinder Basic")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Free")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Profinder Premium")
                            <i class="fa fa-check my_check"></i>
                          @elseif($package->title=="Profinder Ultimate")
                            <i class="fa fa-check my_check"></i>
                          @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  Contact Details <i class="fa fa-info-circle" aria-hidden="true"></i>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3  my_planFeature my_plan1">
                          @if($package->title=="Profinder Basic")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Free")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Profinder Premium")
                            <i class="fa fa-check my_check"></i>
                          @elseif($package->title=="Profinder Ultimate")
                            <i class="fa fa-check my_check"></i>
                          @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>


            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                The Ultimate package ensures Your company's high visibility and top ranking in search results, as well as allowing customers directly contact You via the contact form
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3  my_planFeature my_plan1">
                          @if($package->title=="Profinder Basic")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Free")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Profinder Premium")
                            <i class="fa fa-times"></i>
                          @elseif($package->title=="Profinder Ultimate")
                          <i class="fa fa-check my_check"></i>
                          @endif()
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>

            <div class="row my_featureRow">
                <div class="col-xs-12 col-sm-4 my_feature">
                  
                </div>
                <div class="col-xs-12 col-sm-8">
                    <div class="row">
                        @foreach($packages as $package)
                        <div class="col-xs-3 col-sm-3 my_planFeature my_plan1">
                            <a href="{{ route('viewRegisterForm')}}" class="btn btn-default">Sign Up</a>
                        </div>
                        @endforeach()
                    </div>
                </div>
            </div>
          </div>
        @endif()
      </div> <!-- end container -->
    </div> <!-- end .page-content -->
  </div> <!-- end #page-content -->
@endsection()

@push('styles')
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
  <style type="text/css">
    
    .agent-single{
      position:relative;
    }
    .view-profile{
      left: 0;
      right: 0;
      margin-left: auto;
    position: absolute;
    bottom: 25px;
    }

    .pagination-content ul li a{
      padding-bottom:100% ; 
    }
    
    .pkgDesc li{
      border-top: 1px solid gray;
      padding-top: 5px;
      padding-bottom: 5px;
    }
    .tag-list .btn{
      margin:2px;
      border-radius: 10px;
    }

    @media only screen and (min-width:801px)  {
    .search-holder{
    margin-top: 100px;
   } 
    .advanced-form{
      visibility: hidden;
    }
    .toggle{
      visibility: hidden;
    }
   }
  @media only screen and (min-width:1025px) { 
    .search-holder{
    margin-top: 100px;
   }
    .advanced-form{
      visibility: hidden;
    }
    .toggle{
      visibility: hidden;
    }
   }
  @media only screen and (min-width:1281px) {
    .advanced-form{
      visibility: hidden;
    }
    .toggle{
      visibility: hidden;
    }
  }
 
   /* --- Plans ---------------------------- */

    .my_planHeader {
        text-align: center;
        color: white;
        padding-top:0.2em;
        padding-bottom:0.2em;
    }
    .my_planTitle {
        
        font-weight: bold;
    }
    .my_planPrice {
        font-size:1.4em;
        font-weight: bold;    
    }
    .my_planDuration {
        margin-top: -0.6em;
    }

    @media (max-width: 768px) {
        .my_planTitle {
            font-size:small;
        }    
    }

    /* --- Features ------------------------- */

    .my_feature {
        line-height:3.0em;
        font-weight: bold;  
    }

    @media (max-width: 768px) {
        .my_feature {
            text-align: center
        }
     }

    .my_featureRow {
        margin-top: 0.2em;
        margin-bottom: 0.2em;
        border: 0.1em solid rgb(163, 163, 163);
    }    

    /* --- Plan 1 --------------------------- */
    .my_plan1 {
        background: rgb(224,234,242);
    }

    .my_planHeader.my_plan1 a {
        background: rgb(72, 109, 139);
        color:white;
    }

    .my_planHeader.my_plan1 {
        background: rgb(105, 153, 193);
        border-bottom: thick solid rgb(72, 109, 139);
    }
    .fa{
      font-size:1em;
      font-weight: none;
    }
    /* --- Plan 2 --------------------------- */
    .my_plan2 {
        background: rgb(230,235,218);
    }

    .my_planHeader.my_plan2 a {
        background: rgb(108, 131, 62);
        color:white;
    }

    .my_planHeader.my_plan2 {
        background: rgb(134, 162, 77);
        border-bottom: thick solid rgb(108, 131, 62);
    }

    /* --- Plan 3 --------------------------- */
    .my_plan3 {
        background: rgb(254,235,212);
    }

    .my_planHeader.my_plan3 a {
        background: rgb(199, 127, 40);
        color:white;
    }

    .my_planHeader.my_plan3 {
        background: rgb(253, 161, 49);
        border-bottom: thick solid rgb(199, 127, 40);
    }




    .my_planFeature {
        text-align: center;
        font-size: 2em;
    }

    .my_planFeature i.my_check {
        color: green;
    }
    .textd{
          font-size: 18px;
        }
  </style>
@endpush()


@push('scripts')
  <!-- Height Equalizer -->
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.0/jquery.matchHeight-min.js"></script>
  <script type="text/javascript">
    $(function() {
        $('.agent-single').matchHeight(false);
    });
  </script>

  <!-- isotope scripts -->
  <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
  <script type="text/javascript">
    $.getScript('//cdn.jsdelivr.net/isotope/1.5.25/jquery.isotope.min.js',function(){
      
      $('#content').isotope({
        itemSelector : '.item'
      });

       $('#package').isotope({
        itemSelector : '.page'
      });
    });
  </script>
@endpush()
