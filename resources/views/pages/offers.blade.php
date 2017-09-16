@extends('layouts.app')
@section('content')
  	<div class="header-page-title job-registration clearfix">
      <div class="title-overlay"></div>
      <div class="container">
        <h1>Categories</h1>

        <ol class="breadcrumb">
          <li><a href="{{ route('home')}}">Home</a></li>
          <li class="active">Categories</li>
        </ol>

      </div> <!-- end .container -->

    </div> <!-- end .header-page-title -->


  <div id="page-content" class="page-content pt60">
    <div class="container">
      <div class="row">
          <h5 class="widget-title text-center">Filter By Alphabet</h5>
        </div>

        <div class="row">
          <div class="pagination-content">
            <nav >
              <ul class="list-inline">
                <li class="{{ Request::is('categories')? 'active':''}}"><a class="number" href="{{ route('offers')}}">all</a></li>
                <li class="{{ Request::is('categories/alphabet/a')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','a')}}">a</a></li>

                <li class="{{ Request::is('categories/alphabet/b')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','b')}}">b</a></li>
                <li class="{{ Request::is('categories/alphabet/c')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','c')}}">c</a></li>
                <li class="{{ Request::is('categories/alphabet/d')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','d')}}">d</a></li>
                <li class="{{ Request::is('categories/alphabet/e')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','e')}}">e</a></li>
                <li class="{{ Request::is('categories/alphabet/f')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','f')}}">f</a></li>
                <li class="{{ Request::is('categories/alphabet/g')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','g')}}">g</a></li>
                <li class="{{ Request::is('categories/alphabet/h')? 'active':''}}">
                  <a class="number" href="{{ route('offersByAlphabet','h')}}">h</a>
                </li>
                <li class="{{ Request::is('categories/alphabet/i')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','i')}}">i</a></li>
                <li class="{{ Request::is('categories/alphabet/j')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','j')}}">j</a></li>
                <li class="{{ Request::is('categories/alphabet/k')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','k')}}">k</a></li>
                <li class="{{ Request::is('categories/alphabet/l')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','l')}}">l</a></li>
                <li class="{{ Request::is('categories/alphabet/m')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','m')}}">m</a></li>
                <li class="{{ Request::is('categories/alphabet/n')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','n')}}">n</a></li>
                <li class="{{ Request::is('categories/alphabet/o')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','o')}}">o</a></li>
                <li class="{{ Request::is('categories/alphabet/p')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','p')}}">p</a></li>
                <li class="{{ Request::is('categories/alphabet/q')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','q')}}">q</a></li>
                <li class="{{ Request::is('categories/alphabet/r')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','r')}}">r</a></li>
                <li class="{{ Request::is('categories/alphabet/s')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','s')}}">s</a></li>
                <li class="{{ Request::is('categories/alphabet/t')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','t')}}">t</a></li>
                <li class="{{ Request::is('categories/alphabet/u')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','u')}}">u</a></li>
                <li class="{{ Request::is('categories/alphabet/v')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','v')}}">v</a></li>
                <li class="{{ Request::is('categories/alphabet/w')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','w')}}">w</a></li>
                <li class="{{ Request::is('categories/alphabet/x')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','x')}}">x</a></li>
                <li class="{{ Request::is('categories/alphabet/y')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','y')}}">y</a></li>
                <li class="{{ Request::is('categories/alphabet/z')? 'active':''}}"><a class="number" href="{{ route('offersByAlphabet','z')}}">z</a></li>
              </ul>
            </nav>
              </div>
        </div>
        <hr>
      <div class="row">
        <div class="col-md-3 page-sidebar">
          <aside>
            <div class="white-container mb0">
              
              <div class="widget sidebar-widget jobs-filter-widget">
                <h5 class="widget-title">Filter Results</h5>

                <div class="widget-content">
                  <h6>Top Categories</h6>
                  <div>
                    <ul class="filter-list">
                     @foreach($topCats as $offer)
                      <li><a href="{{ route('merchantsByCategory',$offer->id)}}">{{ $offer->name}}</a></li>
                      @endforeach()
                    </ul>

                    <a href="#" class="toggle"></a>
                  </div>
                </div>
              </div>
            </div>
          </aside>
        </div><!-- end .page-sidebar-->

        <div class="col-sm-9 page-content" id="content">
          
          @if($offers->isEmpty())
          <center ><h1>No record Found</h1></center>
           @else
          <?php $item=1; ?>

            <div class="row" id="directories">
              @foreach($offers->where('parent_id',0) as $offer)
              <div id="{{$item}}" class="col-sm-4 col-xs-6 item">
                      
                <ul class="list-group" >
                    <a href="{{ route('merchantsByCategory', $offer->id)}}" class="list-group-item active">{{$offer->name}}</a>
                    @foreach($offers->where('parent_id',$offer->id) as $offer1)
                    <li class="list-group-item">
                      <a href="{{ route('merchantsByCategory', $offer1->id)}}">{{ $offer1->name }}</a>
                   </li>
                   @endforeach()
                </ul>
                <div class="clearfix"></div>   
              </div>
              @endforeach()
            </div>
          @endif()
        </div> <!-- end .page-content -->
      </div>
      <div class="row">
        <div class="col-sm-3">
          
        </div>
        <div class="col-sm-9">
          <div class="pagination-content clearfix pb20">
            {{$offers->render()}}
          </div>
        </div>
      </div>
    </div> <!-- end .container -->
  </div> <!-- end #page-content -->
@endsection()

@push('styles')
  <style type="text/css">
    .pagination-content ul li a{
      padding-bottom:100% ; 
    }
  </style>
@endpush()

@push('scripts')
    
@endpush()