<div class="col-md-3 left_col">
   <div class="left_col scroll-view">
      <div class="navbar nav_title" style="border: 0;">
         <a href="{{route('companyProfile')}}" class="site_title"> <span>{{ auth()->guard('company')->getUser()->name}}</span></a>
      </div>
      <div class="clearfix"></div>
      <!-- menu profile quick info -->
      <div class="profile clearfix">
         @if(!empty(auth()->guard('company')->getUser()->image))
         <div class="profile_pic">
            <img src="{{ auth()->guard('company')->getUser()->image}}" alt="..." class="img-circle profile_img">
         </div>
         @endif()
         <div class="profile_info">
            <span>Welcome,</span>
            <h2>{{ auth()->guard('company')->getUser()->contact_name}}</h2>
         </div>
      </div>
      <!-- /menu profile quick info -->
      <br>
      <!-- sidebar menu -->
      <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
         <div class="menu_section active">
            <h3>General</h3>
            <ul class="nav side-menu" style="">
              <li class="{{ Route::is('companyDashboard') ? 'active' : ''}}">
                <a href="{{ route('companyDashboard')}}"><i class="fa fa-home"></i> Home <span class=""></span></a>
              </li>
              @if($package->products>0)
              <li class="{{ Route::is('getProducts') ? 'active' : ''}}">
                <a href="{{ route('getProducts')}}"><i class="fa fa-product-hunt"></i>Products <span class=""></span></a>
              </li>
              @endif()
             
              @if($package->photos>0)
              <li class="{{ Route::is('getImages') ? 'active' : ''}}">
                  <a href="{{ route('getImages')}}"><i class="fa fa-picture-o"></i> Images <span class=""></span></a>
              </li>
              @endif()

              @if($package->keywords>0)
              <li class="{{ Route::is('getKeywords') ? 'active' : ''}}">
                  <a href="{{ route('getKeywords')}}"><i class="fa fa-key"></i> Keywords <span class=""></span></a>
              </li>
              @endif()
            </ul>
         </div>
         <div class="menu_section">
            <h3>Payments</h3>
            <ul class="nav side-menu">
               <li>
                  <a><i class="fa fa-bug"></i> Peyment History <span ></span></a>
               </li>
              
            </ul>
         </div>
      </div>
      <!-- /sidebar menu -->
      <!-- /menu footer buttons -->
      <div class="sidebar-footer hidden-small">
         
         <a data-toggle="tooltip" data-placement="top" title="" href="{{ route('getLogout')}}" data-original-title="Logout">
         <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
         </a>
      </div>
      <!-- /menu footer buttons -->
   </div>
</div>

<div class="top_nav">
    <div class="nav_menu">
      <nav>
        <div class="nav toggle">
          <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>

        <ul class="nav navbar-nav navbar-right">
          <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              @if(!empty(auth()->guard('company')->getUser()->image))
              <img src="{{ auth()->guard('company')->getUser()->image}}" alt="">
              @endif()
              {{ auth()->guard('company')->getUser()->name}}
              <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu pull-right">
              <li><a href="{{ route('companyProfile')}}"> Profile</a></li>
              
             
              <li><a href="{{ route('getLogout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>