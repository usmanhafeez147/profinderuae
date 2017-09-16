@extends('layouts.app')
@section('content')
	<div class="header-page-title job-registration clearfix">
      <div class="title-overlay"></div>
      <div class="container">
        <h1>Directory Details</h1>
        <ol class="breadcrumb">
          <li><a href="{{ route('home')}}">Home</a></li>
          <li class="active">Directory Details</li>
        </ol>
      </div> <!-- end .container -->
  	</div>

  	<div id="page-content" class="pt50">
		<div class="container ">
			<div class="row">
				<div class="col-sm-3">
					<a class="btn btn-default btn-block" href="{{ URL::previous() }}">Back</a>
				</div>
				<div class="col-sm-6">
					<h5 class="widget-title text-center">Directory Details</h5>
				</div>
	          
	        </div>
        	<div class="row">
        			<div class="col-sm-3"></div>
		          <div class="col-sm-6 white-container">
		          	<table>
		          		<tr>
		          			<th>Directory Name: </th>
		          			<td>{{ $directory->name}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory Category: </th>
		          			<td>{{ $directory->industry}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory Sub Category: </th>
		          			<td>{{ $directory->company}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory Phone: </th>
		          			<td>{{ $directory->phone}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory Email: </th>
		          			<td>{{ $directory->email}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory Fax: </th>
		          			<td>{{ $directory->fax}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory P.O.Box: </th>
		          			<td>{{ $directory->p_o_box}}</td>
		          		</tr>
		          		<tr>
		          			<th>Directory address: </th>
		          			<td>{{ $directory->address}}</td>
		          		</tr>
		          	</table>
		          </div>
		          <div class="col-sm-3"></div>
            </div>
        </div>
    </div>
    <br> <br>
@endsection()