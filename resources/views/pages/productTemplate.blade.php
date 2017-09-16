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
                     <!-- /.content-title -->
                
                     <!-- /.listing-navigation -->
                     <div class="container">
                        <div class="row">
                           <div class="col-md-12 col-lg-12">
                              <div class="push-top-bottom">
                                 <div class="listing-detail">
                                    <div class="">
                                       <div class="gallery-item" style="background-image: url('{{$product->photo}}');">
                                          <div class="gallery-item-description">
                                             {{$product->name}}
                                          </div>
                                          <!-- /.gallery-item-description -->
                                       </div>
                                                       
                                    </div>
                                    <!-- /.gallery -->
                                    <table class="table table-bordered">
                                       <tr>
                                          <th>Product Name</th>
                                          <td>{{$product->name}}</td>
                                       </tr>
                                       <tr>
                                          <th>Product Price</th>
                                          <td>{{$product->price}}</td>
                                       </tr>
                                    </table>
                                    
                                    <p>
                                      {{ $product->description}}
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