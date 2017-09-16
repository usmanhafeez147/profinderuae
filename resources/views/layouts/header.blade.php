<!-- HEADER -->
	
	<header id="header">
		<div class="header-top-bar">
			<div class="header-notification-bar myHeader" style="display:none;">
			    <div class="register-user">
			      <div class="container">
			        <div class="row">
			          <div class="col-md-3 col-sm-3">
			            <div class="logo-section">
			              <a href="{{ route('home')}}"><img src="{{ URL::asset('Dubai.png')}}" alt=""></a>
			            </div>
			          </div>

			          <div class="col-md-6 col-sm-5">
			           @if(Route::is('merchants') or Route::is('searchRes') or Route::is('searchbyName') or Route::is('merchantsByCategory') or Route::is('merchantsByCity'))
			        		<div class="search-form">
			                  <form action="#">

			                    <input type="search" placeholder="Search..." class="topbar-search-input">
			                    <button class="search-button"><i class="fa fa-search"></i></button>
			                  </form>
			            	</div>
			           @endif()
			          </div>

			          <div class="col-md-3 col-sm-4">
			            <div class="notification-section text-right">
			              <ul class="list-inline">
			                <li><a href="#"><i class="fa fa-envelope-o"></i></a><span class="new-notification">3</span></li>
			                <li><a href="#"><i class="fa fa-bell-o"></i></a><span class="new-notification">3</span></li>
			                <li class="user-profile-pic"><a href="#"><img src="" alt=""></a></li>
			              </ul>
			            </div>
			          </div>

			        </div> <!-- end .row -->
			      </div> <!-- end .container -->
			    </div> <!-- end .register-user -->
			</div> <!-- end. header-notification-bar  -->

		  <!-- HEADER TOP BAR FOR NON REGISTER USER-->
			<div class="header-notification-bar myHeader">
				<div class="non-register-user">
					<div class="container">
						<div class="row">

							<div class="col-md-3 col-sm-3">
								<div class="logo-section">
								  <a href="{{ route('home')}}"><img src="{{ URL::asset('Dubai.png')}}" alt=""></a>
								</div>
							</div>

							<div class="col-md-6 col-sm-5">
								 @if(Route::is('merchants') or Route::is('searchRes') or Route::is('searchbyName') or Route::is('merchantsByCategory') or Route::is('merchantsByCity'))
									<div class="search-form">
								      <form action="{{ route('searchbyName')}}" method="post">
								      	{{ csrf_field()}}
								        <input type="search" name="name" placeholder="Search..." class="topbar-search-input">
								        <button class="search-button"><i class="fa fa-search"></i></button>
								      </form>
									</div>
								@endif()
							</div>

							<div class="col-md-3 col-sm-4">
								<div class="notification-section text-right">
									<ul class="list-inline">
										<li><a href="#">EN<i class="fa fa-caret-down"></i></a>
										  <ul>
										    <li><a href="#">DE</a></li>
										    <li><a href="#">ES</a></li>
										    <li><a href="#">IT</a></li>
										  </ul>

										</li>
										@if(auth()->guard('company')->id())

										<li>Logged in <a href="#">{{ ucfirst(auth()->guard('company')->getUser()->name)}}<i class="fa fa-caret-down"></i></a>
										  <ul>
										     <li><a href="{{ route('getLogout')}}">Logout</a></li>
										  </ul>

										</li>
										@else
										<li><a href="{{ route('viewLoginForm')}}">Login</a></li>
										<li><a href="{{ route('viewRegisterForm')}}">Register</a></li>
										@endif
									</ul>
								</div>
							</div>
						</div> <!-- end .row -->
					</div> <!-- end .container -->
				</div> <!-- end .visitors-top-bar -->
			</div> <!-- end. header-notification-bar  -->
			<!--END HEADER TOP BAR FOR WITHOUT LOGIN USER-->

			<!-- Navigation -->
			<div class="main-navbar">
			@include('layouts.nav')
			</div> <!-- main-navbar -->
			<!-- end .header-top-bar -->
		</div>
	</header>
<!-- end #header -->