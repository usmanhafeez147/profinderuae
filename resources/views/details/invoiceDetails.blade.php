@extends('backpack::layout')

@section('content')
<div class="detailrow">
<div class='employee-details'>
    <ul>
        <li><label>Company Name:</label>{{ $invoice->order->company->name }}</li>
        <li><label>City:</label>{{ $invoice->order->company->city->name }}</li>
        <li><label>Contact Name:</label>
 @if($invoice->order->company->contact_name==null  and $invoice->order->company->contact_name=='' )
                No Contact
            @else
                {{ $invoice->order->company->contact_name }}
            @endif
        </li>
        <li><label>Address:</label>{{ $invoice->order->company->address}}</li>
        <li><label>Email Address:</label>{{ $invoice->order->company->email }}</li>
        <li><label>Phone number:</label>{{ $invoice->order->company->phone }}</li>
        <li><label>Order #:</label>{{ $invoice->order->id }}</li>
        <li><label>Invoice #:</label>{{ $invoice->id }}</li>
        <li><label>Order Created:</label>{{ $invoice->order->order_date }}</li>
        <li><label>Invoice Created:</label>{{ $invoice->invoice_date }}</li>
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