@extends('company.layouts.app')
@section('content')
  <div class="right_col" role="main" style="min-height: 1164px;">
    <div class="">
        <!-- <section class="content-header">
            <h1>
                Dashboard <small> Welcome to Company Dashboard</small>
            </h1> 
        </section > -->
        <section>
            <div class="row">
                <div class="col-sm-5">
                  <h3>Keyword Lists</h3>
                </div>
                <div class="col-sm-5">
                    <span class="badge badge-lg bg-red">{{ $package->title}}</span> Package
                </div>
                <div class="col-sm-2 ">
                    You can only add <span class="badge badge-lg bg-red">{{ $package->keywords}}</span> Keywords
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="row">
                <div class="col-sm-3">
                    @if($package->keywords>=0 and $noOfKeywords<=$package->keywords)
                    <a href="{{ route('createKeywords')}}" class="btn btn-default">Add Keyword</a>
                    @endif()
                </div>
                <div class="col-sm-9"></div>
            </div>
        </section>
        <hr>
      <div class="clearfix"></div>

      <div class="row content-body">
        <div class="col-md-12 col-sm-12 col-xs-12">

          <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            @if($keywords->isNotEmpty())
            <tbody>
                @foreach($keywords as $keyword)
                <tr>
                   
                    @if(!empty($keyword->id))                    
                        <td>{{ $keyword->id}}</td> 
                    @endif()
                   
                    @if(!empty($keyword->name))                    
                        <td>{{ $keyword->name}}</td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($keyword->category_id))                    
                        <td>{{ $keyword->category_id}}</td>
                    @else
                        <td></td>
                    @endif()
                    
                    @if($keyword->id)
                    <td><a href="{{ route('editKeywords',$keyword->id)}}">Edit</a></td>
                    <td><a href="{{ route('deletekeywords',$keyword->id)}}">Delete</a></td>
                   @endif()
                </tr>
                @endforeach()
            </tbody>
           
            @endif()
        </table>
        
        </div>
      </div>
    </div>
  </div>
@endsection()
@push('styles')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">
@endpush()
@push('scripts')
<script type="text/javascript">
  $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<script type="text/javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
@endpush()