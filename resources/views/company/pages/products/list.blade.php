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
                  <h3>Product Lists</h3>
                </div>
                <div class="col-sm-5">
                    <span class="badge badge-lg bg-red">{{ $package->title}}</span> Package
                </div>
                <div class="col-sm-2 ">
                    You can only add <span class="badge badge-lg bg-red">{{ $package->products}}</span> Products
                </div>
            </div>
        </section>
        <hr>
        <section>
            <div class="row">
                <div class="col-sm-3">
                     @if($package->products>=0 and $noOfProducts<=$package->products)
                        <a href="{{ route('createProducts')}}" class="btn btn-default">Add Image</a>
                    @endif()
                </div>
                <div class="col-sm-9">
                    
                </div>
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
                    <th>Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Category Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </tfoot>
            @if($products->isNotEmpty())
            <tbody>
                @foreach($products as $product)
                <tr>
                   
                    @if(!empty($product->id))                    
                        <td>{{ $product->id}}</td> 
                    @endif()
                   
                    @if(!empty($product->name))                    
                        <td>{{ $product->name}}</td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($product->category_id))                    
                        <td>{{ $product->category_id}}</td>
                    @else
                        <td></td>
                    @endif()
                    
                    @if(!empty($product->price))                    
                        <td>{{ $product->price}}</td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($product->short_desc))                    
                        <td>{{ $product->short_desc}}</td>
                    @else
                        <td></td>
                    @endif()

                    @if(!empty($product->photo))
                        <td><img height="100px" width="100px" src="{{ $product->photo}}" alt="{{ $product->name }}"></td>
                    @else
                        <td></td>
                    @endif()

                    @if($product->id)
                    <td><a href="{{ route('editProducts',$product->id) }}">Edit</a></td>
                    <td><a href="{{ route('deleteProducts',$product->id)}}">Delete</a></td>
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