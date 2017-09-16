@extends('layouts.app')
@section('content')
  
 <div class="header-page-title our-agents-header">
   <div class="title-overlay">
   </div>
   <div class="container">
      <div class="title-breadcrumb clearfix">
         <h1>Our Packages</h1>
         <ol class="breadcrumb">
            <li><a href="{{ route('home')}}">Home</a></li>
            <li class="active">Packages</li>
         </ol>
      </div>
      <!-- end .title-breadcrumb -->
   </div>
   <!-- end .container -->
</div>
<div id="page-content" class="page-content pt60">
   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="row">
              
              <div class="col-md-12 col-sm-12">
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
              </div>
            </div>
         </div>
         <!-- end .col -->
      </div>
      <!-- end .row -->      
   </div>
   <!-- end container -->
</div>
<!-- end #page-content -->
@endsection()

@push('styles')
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
   <style type="text/css">
    .pagination-content ul li a{
      padding-bottom:100% ; 
    }
    .pkgDesc li{
      border-top: 1px solid gray;
      padding-top: 5px;
      padding-bottom: 5px;
    }
 
            /* Use a wide full screen for small screens like tablets. */
        @media (min-width: 768px) and (max-width:992px) {
            .container {
                width: initial;
                padding-left: 2em;
                padding-right: 2em;        
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
  
@endpush()
