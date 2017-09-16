<nav class="navbar navbar-default">
  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html"><img height="60" width="80" src="{{ URL::asset('Dubai.png')}}" alt=""></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? 'active':''}}"><a href="{{ route('home')}}">Home</a></li>
        <li class="{{ Request::is('about') ? 'active':''}}"><a class="nav-link" href="{{ route('about')}}">Who We Are</a></li>
       
        <li class=" {{ Request::is('companies') ? 'active':''}}" >
          <a href="{{ route('merchants')}}">Companies
            </a>
         
        </li>
        <li class="{{ Request::is('packages/list') ? 'active':''}}"><a href="{{ route('packages')}}">Packages</a></li>
        <li class="{{ Request::is('categories') ? 'active':''}}"><a href="{{ route('offers')}}">Categories</a></li>
        <li class="{{ Request::is('term-of-services') ? 'active' : '' }}"><a href="{{route('termOfServices')}}">Term Of Services</a></li>
        <li class="{{ Request::is('news') ? 'active':''}}"><a href="{{ route('services')}}">News</a></li>
         <!-- <li class="{{ Request::is('directories/city')? 'active':''}}"><a href="{{ route('directories')}}">Profinder Directories</a></li> -->
        
        <li class="{{ Request::is('contact-us') ? 'active':''}}"><a href="{{ route('contactUs')}}">Contact Us</a></li>
      </ul>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container -->
</nav>