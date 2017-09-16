@if (Auth::check())
    <!-- Left side column. contains the sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="http://placehold.it/160x160/00a65a/ffffff/&text={{ Auth::user()->name[0] }}" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{ Auth::user()->name }}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">{{ trans('backpack::base.administration') }}</li>
          <!-- ================================================ -->
          <!-- ==== Recommended place for admin menu items ==== -->
          <!-- ================================================ -->
          <li><a href="{{ url(config('backpack.base.route_prefix').'/dashboard') }}"><i class="fa fa-dashboard"></i> <span>{{ trans('backpack::base.dashboard') }}</span></a></li>
          
          @if(Auth::user()->hasRole('admin'))

          <li><a href="{{ url('admin/news') }}"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/category') }}"><i class="fa fa-check-square"></i> <span>Categories</span></a>
          </li>
          <li><a href="{{ url('admin/city')}}"><i class="fa fa-map"></i> <span>Cities</span></a></li>
          <li><a href="{{ url('admin/company') }}"><i class="fa fa-user-circle"></i> <span>Companies</span></a></li>
          <li><a href="{{ url('admin/package') }}"><i class="fa fa-square"></i><span>Packages</span></a></li>
          <!-- Merchant Console will login with admin console with limitted access -->
          
         <!--  <li><a href=""><i class="fa fa-square"></i><span>Calling Agent Report</span></li></a> -->

          <li class="treeview">
              <a href="#">
                <i class="fa fa-mobile"></i> 
                <span>Directories</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/consumer') }}"><i class="fa fa-user-o"></i> <span>Call Center List</span></a></li>
                <li><a href="{{ url('admin/consumers/import') }}"><i class="fa fa-user-o"></i> <span>Import Call Center</span></a></li> 
              </ul>
          </li>
          
          <li><a href="{{ url('admin/product') }}"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>
          
          <li class="treeview">
            <a href="#">
              <i class="fa fa-first-order">
              </i> 
              <span>Orders</span> 
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
               <li><a href="{{ url('admin/order') }}"><i class="fa fa-first-order"></i> <span>All Order</span></a></li>
               <li><a href="{{ url('admin/orders/daily-report') }}"><i class="fa fa-first-order"></i> <span>Today's Order</span></a></li>
               <li><a href="{{ url('admin/orders/weekly-report') }}"><i class="fa fa-first-order"></i> <span>Weekly Orders</span></a></li>
               <li><a href="{{ url('admin/orders/monthly-report') }}"><i class="fa fa-first-order"></i> <span>Monthly Order</span></a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-cc-amex">
              </i> 
              <span>Invoices</span> 
              <i class="fa fa-angle-left pull-right"></i>
            </a>
            <ul class="treeview-menu">
              <li><a href="{{ url('admin/invoice') }}"><i class="fa fa-cc-amex"></i> <span>All Invoices</span></a></li>
              <li><a href="{{ url('admin/invoices/daily-report') }}"><i class="fa fa-cc-amex"></i> <span>Today Invoices</span></a></li>
              <li><a href="{{ url('admin/invoices/weekly-report') }}"><i class="fa fa-cc-amex"></i> <span>Weekly Invoices</span></a></li>
              <li><a href="{{ url('admin/invoices/monthly-report') }}"><i class="fa fa-cc-amex"></i> <span>Monthly Invoices</span></a></li>
            </ul>
          </li>
         
          <!-- <li class="treeview">
              <a href="#"><i class="fa fa-mobile">
                
              </i> <span>Media</span> <i class="fa fa-angle-left pull-right"></i></a>
              
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/image') }}"><i class=""></i> <span>Images</span></a></li>
                <li><a href="{{ url('admin/audio') }}"><i class=""></i> <span>Audios</span></a></li>
                <li><a href="{{ url('admin/video') }}"><i class=""></i> <span>Videos</span></a>
                </li>
                
              </ul>
          </li> -->

          <li><a href="{{ url('admin/sliderphoto') }}"><i class="fa fa-file-image-o"></i> <span>Slider Photos</span></a></li>

      
          <li class="treeview">

            <a href="#"><i class="fa fa-group"></i> <span>Users, Roles</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
            
              <li><a href="{{ url(config('backpack.base.route_prefix').'/user') }}"><i class="fa fa-user"></i> <span>Users</span></a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix').'/role') }}"><i class="fa fa-group"></i> <span>Roles</span></a></li>
              
            </ul>
          </li>
          
          <li class="treeview">
              <a href="#"><i class="fa fa-cogs"></i> <span>Advanced</span> <i class="fa fa-angle-left pull-right"></i></a>
              
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/customfield') }}"><i class="fa fa-tag"></i> <span>SEO</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix').'/elfinder') }}"><i class="fa fa-files-o"></i> <span>File manager</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix').'/backup') }}"><i class="fa fa-hdd-o"></i> <span>Backups</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix').'/log') }}"><i class="fa fa-terminal"></i> <span>Logs</span></a></li>
                <li><a href="{{ url(config('backpack.base.route_prefix').'/setting') }}"><i class="fa fa-cog"></i> <span>Settings</span></a></li>
              </ul>
          </li>
          <li class="treeview">
            <a href="#"><i class="fa fa-globe"></i> <span>Translations</span> <i class="fa fa-angle-left pull-right"></i></a>
            <ul class="treeview-menu">
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language') }}"><i class="fa fa-flag-checkered"></i> Languages</a></li>
              <li><a href="{{ url(config('backpack.base.route_prefix', 'admin').'/language/texts') }}"><i class="fa fa-language"></i> Site texts</a></li>
            </ul>
          </li>
          <!-- ======================================= -->
          
          
          @elseif(Auth::user()->hasRole('writer'))
            <li><a href="{{ url('admin/news') }}"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/category') }}"><i class="fa fa-check-square"></i> <span>Categories</span></a>
          </li>
          <li><a href="{{ url('admin/city')}}"><i class="fa fa-map"></i> <span>Cities</span></a></li>
          <li><a href="{{ url('admin/company') }}"><i class="fa fa-user-circle"></i> <span>Companies</span></a></li>
          <li><a href="{{ url('admin/package') }}"><i class="fa fa-square"></i><span>Packages</span></a></li>
          <!-- Merchant Console will login with admin console with limitted access -->
          <li class="treeview">
              <a href="#">
                <i class="fa fa-mobile"></i> 
                <span>Directories</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/consumer') }}"><i class="fa fa-user-o"></i> <span>Call Center List</span></a></li>
                <li><a href="{{ url('admin/consumers/import') }}"><i class="fa fa-user-o"></i> <span>Import Call Center</span></a></li>
                
              </ul>
          </li>
          
          <li><a href="{{ url('admin/product') }}"><i class="fa fa-product-hunt"></i> <span>Products</span></a></li>


          <li class="treeview">
              <a href="#"><i class="fa fa-mobile">
                
              </i> <span>Media</span> <i class="fa fa-angle-left pull-right"></i></a>
              
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/image') }}"><i class=""></i> <span>Images</span></a></li>
                <li><a href="{{ url('admin/audio') }}"><i class=""></i> <span>Audios</span></a></li>
                <li><a href="{{ url('admin/video') }}"><i class=""></i> <span>Videos</span></a>
                </li>
                
              </ul>
          </li>

          <li><a href="{{ url('admin/sliderphoto') }}"><i class="fa fa-file-image-o"></i> <span>Slider Photos</span></a></li>
         
          <!-- ======================================= -->
         
          @elseif(Auth::user()->hasRole('Calling Agent'))
            <li class="treeview">
              <a href="#">
                <i class="fa fa-mobile"></i> 
                <span>Directories</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/consumer') }}"><i class="fa fa-user-o"></i> <span>Call Center List</span></a></li>
                <li><a href="{{ url('admin/consumers/import') }}"><i class="fa fa-user-o"></i> <span>Import Call Center</span></a></li>
                
              </ul>
            </li>
          @else
            <li class="treeview">
              <a href="#">
                <i class="fa fa-mobile"></i> 
                <span>Directories</span> 
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('admin/consumer') }}"><i class="fa fa-user-o"></i> <span>Call Center List</span></a></li>
                <li><a href="{{ url('admin/consumers/import') }}"><i class="fa fa-user-o"></i> <span>Import Call Center</span></a></li>
                
              </ul>
            </li>
          @endif()

          <li class="header">{{ trans('backpack::base.user') }}</li>
          <li><a href="{{ url(config('backpack.base.route_prefix').'/logout') }}"><i class="fa fa-sign-out"></i> <span>{{ trans('backpack::base.logout') }}</span></a></li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
@endif
