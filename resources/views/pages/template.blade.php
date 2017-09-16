@extends('layouts.app')
@section('content')
	<!-- /.header-wrapper -->
         <div class="main-wrapper">
            <div class="main">
               <div class="main-inner">
                  <div class="content">
                     
                     <div class="content-title">
                        <div class="container">
                           <h1>News Details page</h1>
                           <ul class="breadcrumb">
                              <li><a href="{{ route('home')}}">Home</a> <i class="md-icon">keyboard_arrow_right</i></li>
                              <li class="active">News Details</li>
                           </ul>
                           <!-- /.breadcrumb -->
                        </div>
                        <!-- /.container -->
                     </div>
                     
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12 col-lg-12">
                              <div class="push-top-bottom">
                                 <div class="listing-detail">
                                    <div class="">
                                       <div class="gallery-item" style="background-image: url('{{$news->image}}');">
                                          <div class="gallery-item-description">
                                             {{$news->title}}
                                          </div>
                                          <!-- /.gallery-item-description -->
                                       </div>
                                                       
                                    </div>
                                    <!-- /.gallery -->
                                    <h2>{{ $news->title}}</h2>
                                    <p>
                                       {{ $news->description}}
                                    </p>                  
                                 </div>
                                 <!-- /.listing-detail -->
                              </div>
                              <!-- /.push-top-bottom -->
                           </div>
                          
                        </div>
                        <!-- /.row -->
                     </div>
                     <!-- /.container-->

                     
                  </div>
                  <!-- /.content -->
               </div>
               <!-- /.main-inner -->
            </div>
            <!-- /.main -->
         </div>
@endsection()