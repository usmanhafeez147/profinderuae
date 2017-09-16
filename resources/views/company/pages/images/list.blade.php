@extends('company.layouts.app')
@section('content')
  <div class="right_col" role="main" style="min-height: 1164px;">
    <!-- <section class="content-header">
            <h1>
                Dashboard <small> Welcome to Company Dashboard</small>
            </h1> 
        </section > -->
        <section>
            <div class="row">
                <div class="col-sm-5">
                  <h3>Images Lists</h3>
                </div>
                <div class="col-sm-5">
                    <span class="badge badge-lg bg-red">{{ $package->title}}</span> Package
                </div>
                <div class="col-sm-2 ">
                    You can only add <span class="badge badge-lg bg-red">{{ $package->photos}}</span> Images
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="row">
                <div class="col-sm-3">
                    @if($package->photos>=0 and $noOfImages<=$package->photos)
                        <a href="{{ route('createImages')}}" class="btn btn-default">Add Image</a>
                    @endif()
                </div>
                <div class="col-sm-9"></div>
            </div>
        </section>
        <hr>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <table id="example" class="display" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Category Name</th>
                    <th>Description</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            @if($images->isNotEmpty())
            <tbody>
                 @foreach($images as $image)
                <tr>
                   
                    @if(!empty($image->id))                    
                        <td>{{ $image->id}}</td> 
                    @endif()
                   
                    @if(!empty($image->image))                    
                         <td><img height="100px" width="100px" src="{{ $image->image}}" ></td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($image->category_id))                    
                        <td>{{ $image->category_id}}</td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($image->description))                    
                        <td>{{ $image->description}}</td>
                    @else
                        <td></td>
                    @endif()

                    
                    @if($image->id)
                    <td><a href="{{ route('editImages',$image->id)}}">Edit</a></td>
                    <td><a href="{{ route('deleteImages',$image->id)}}">Delete</a></td>
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