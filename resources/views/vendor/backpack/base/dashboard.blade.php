@extends('backpack::layout')

@section('header')
    <section class="content-header">
      <h1>
        {{ trans('backpack::base.dashboard') }}<small>{{ trans('backpack::base.first_page_you_see') }}</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url(config('backpack.base.route_prefix', 'admin')) }}">{{ config('backpack.base.project_name') }}</a></li>
        <li class="active">{{ trans('backpack::base.dashboard') }}</li>
      </ol>
    </section>
@endsection


@section('content')
  <div class="row">
    <div class="col-md-8">
    <div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title">Visitors Report</h3>

    <div class="box-tools pull-right">
    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
    </button>
    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <div class="row">
      <div class="col-md-9 col-sm-8">
        <div class="pad">
        <!-- Map will be created here -->
        <div id="world-map-markers" style="height: 325px;">
        <div class="jvectormap-container" style="width: 100%; height: 100%; position: relative; overflow: hidden; background-color: transparent;">
        <svg width="510" height="325">
        <g transform="scale(0.5666666666666667) translate(0, 66.41155051028642)">
        <path d="M652.71,228.85l-0.04,1.38l-0.46,-0.21l-0.42,0.3l0.05,0.65l-0.17,-1.37l-0.48,-1.26l-1.08,-1.6l-0.23,-0.13l-2.31,-0.11l-0.31,0.36l0.21,0.98l-0.6,1.11l-0.8,-0.4l-0.37,0.09l-0.23,0.3l-0.54,-0.21l-0.78,-0.19l-0.38,-2.04l-0.83,-1.89l0.4,-1.5l-0.16,-0.35l-1.24,-0.57l0.36,-0.62l1.5,-0.95l0.02,-0.49l-1.62,-1.26l0.64,-1.31l1.7,1.0l0.12,0.04l0.96,0.11l0.19,1.62l0.25,0.26l2.38,0.37l2.32,-0.04l1.06,0.33l-0.92,1.79l-0.97,0.13l-0.23,0.16l-0.77,1.51l0.05,0.35l1.37,1.37l0.5,-0.14l0.35,-1.46l0.24,-0.0l1.24,3.92Z" data-code="BD" fill="rgba(210, 214, 222, 1)" fill-opacity="1" stroke="none" stroke-width="0" stroke-opacity="1" fill-rule="evenodd" class="jvectormap-region jvectormap-element">
        </path>
        
        </g></svg><div class="jvectormap-zoomin">+</div><div class="jvectormap-zoomout">−</div></div></div>
        </div>
      </div>
      <!-- /.col -->
          <div class="col-md-3 col-sm-4">
            <div class="pad box-pane-right bg-green" style="min-height: 280px">
              
              <div class="description-block margin-bottom">
                <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                <h5 class="description-header">8390</h5>
                <span class="description-text">Visits</span>
              </div>
              <!-- /.description-block -->
              
              <div class="description-block margin-bottom">
                <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                <h5 class="description-header">30%</h5>
                <span class="description-text">Referrals</span>
              </div>
              <!-- /.description-block -->

              <div class="description-block">
                <div class="sparkbar pad" data-color="#fff"><canvas width="34" height="30" style="display: inline-block; width: 34px; height: 30px; vertical-align: top;"></canvas></div>
                <h5 class="description-header">70%</h5>
                <span class="description-text">Organic</span>
              </div>
             <!-- /.description-block -->
           </div>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
    </div>
  </div>
  <div class="col-md-4">
  <!-- Info Boxes Style 2 -->
  <div class="info-box bg-yellow">
  <span class="info-box-icon"><i class="fa fa-check-square"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Offers</span>
    <span class="info-box-number">{{ $categories }}</span>

    <div class="progress">
    <div class="progress-bar" style="width: 50%"></div>
    </div>
      <span class="progress-description">
      50% Increase in 30 Days
      </span>
  </div>
  <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
  <div class="info-box bg-green">
  <span class="info-box-icon"><i class="fa fa-user-circle"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Merchants</span>
    <span class="info-box-number">{{ $merchants }}</span>

    <div class="progress">
    <div class="progress-bar" style="width: 20%"></div>
    </div>
      <span class="progress-description">
      20% Increase in 30 Days
      </span>
  </div>
  <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
  <div class="info-box bg-red">
  <span class="info-box-icon"><i class="fa fa-location-arrow"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Cities</span>
    <span class="info-box-number">{{ $cities}}</span>

    <div class="progress">
    <div class="progress-bar" style="width: 70%"></div>
    </div>
  </div>
  <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
  <div class="info-box bg-aqua">
  <span class="info-box-icon"><i class="fa fa-map-marker"></i></span>

  <div class="info-box-content">
    <span class="info-box-text">Countries</span>
    <span class="info-box-number">{{ $countries}}</span>

    <div class="progress">
    <div class="progress-bar" style="width: 40%"></div>
    </div>
      <span class="progress-description">
      40% Increase in 30 Days
      </span>
  </div>
  <!-- /.info-box-content -->
  </div>
  <!-- /.info-box -->
    </div>

</div>
@endsection
