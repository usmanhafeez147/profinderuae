@if ($crud->hasAccess('update'))
	@if (!$crud->model->translationEnabled())

	<!-- Single edit button -->
	<a target="_blank" href="{{ url('admin/order'.'/'.$entry->getKey().'/print') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i>Print Order</a>

	@else

	<!-- Edit button group -->
	<!-- <div class="btn-group">
	  <a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}" class="btn btn-xs btn-default"><i class="fa fa-edit"></i> {{ trans('backpack::crud.edit') }}</a>
	  <button type="button" class="btn btn-xs btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	    <span class="caret"></span>
	    <span class="sr-only">Toggle Dropdown</span>
	  </button>
	  <ul class="dropdown-menu">
  	    <li class="dropdown-header">EDIT TRANSLATION:</li>
	  	@foreach ($crud->model->getAvailableLocales() as $key => $locale)
		  	<li><a href="{{ url($crud->route.'/'.$entry->getKey().'/edit') }}?locale={{ $key }}">{{ $locale }}</a></li>
	  	@endforeach
	  </ul>
	</div> -->

	@endif
@endif