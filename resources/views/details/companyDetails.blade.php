@extends('backpack::layout')

@section('content')
<div class="detailrow">
	<div class="tab">
	  <button id="tab1" onClick="JavaScript:selectTab(1);">Information</button>
	  <button id="tab2" onClick="JavaScript:selectTab(2);">Package</button>
	</div>
<div class='employee-details' id="tab1Content">
    <ul>
        <li><label>Company Name:</label>{{ $data->name  }}</li>
        <li><label>City:</label>{{ $data->city->name  }}</li>
        <li><label>Contact Name:</label>
        	@if($data->contact_name==null  and $data->contact_name=='' )
		    	No Contact
			@else
		    	{{  $data->contact_name  }}
		    @endif
		</li>
        <li><label>GSM:</label>
        	@if($data->gsm==null and $data->gsm=='')
		    		No GSM
		    @else
		    	{{  $data->gsm  }}
		    @endif
		</li>
		<li><label>Description:</label><?php  echo $data->description;  ?></li>
    </ul>
</div>
</div>
<div id="tab2Content">
	<h1>Yes</h1>
</div>

@endsection
@section('after_styles')
<style type="text/css">
.detailrow{
  width: 75%;
  margin-left: 20%;
}
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
    width: 70%;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}
.employee-details ul
{
    list-style:none;
    font-style:italic;
    margin: 15px;
    padding: 0;
}
.employee-details ul li
{
    margin: 0;
    line-height: 1.7em;
}

.employee-details label
{
    display:inline-block;
    width:150px;
    padding-right: 10px;
    text-align: right;
    font-style:normal;
    font-weight:bold;
}
</style>
@endsection
@section('after_scripts')
<script type="text/javascript">
  document.getElementById('tab2Content').style.display="none";
function selectTab(tabIndex) {
  //Hide All Tabs
  document.getElementById('tab1Content').style.display="none";
  document.getElementById('tab2Content').style.display="none";
  
  //Show the Selected Tab
  document.getElementById('tab' + tabIndex + 'Content').style.display="block";  
}
</script>
@endsection