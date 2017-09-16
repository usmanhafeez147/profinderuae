@extends('backpack::layout')

@section('content')
<div class="detailrow">
<div class='employee-details'>
    <ul>
        <li><label>Company Name:</label>{{ $order->company->name }}</li>
        <li><label>City:</label>{{ $order->company->city->name}}</li>
        <li><label>Contact Name:</label>
            @if($order->company->contact_name==null  and $order->company->contact_name=='' )
                No Contact
            @else
                {{$order->company->contact_name}}
            @endif
        </li>
        <li><label>Address</label>{{ $order->company->address}}</li>
        <li><label>Email Address</label>{{ $order->company->email}}</li>
        <li><label>Order #</label>{{ $order->id}}</li>
        <li><label>Created</label>{{ $order->order_date}}</li>
    </ul>
</div>
</div>
@endsection
@section('after_styles')
<style type="text/css">
.detailrow{
  margin-left: 10%;
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