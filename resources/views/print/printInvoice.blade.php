<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Print Invoice</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body onload="window.print()">
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ URL::asset('Dubai.png')}}" height="100" width="250" >
                            </td>
                            
                            <td>
                                <b>Order #: </b>{{ $invoice->order->id }}<br>
                                <b>Invoice #: </b>{{ $invoice->id }}<br>
                                <b>Customer Name: </b>{{ $invoice->order->company->contact_name }}<br>
                                <b>Order Created: </b>{{ $invoice->order->order_date }}<br>
                                <b>Invoice Created: </b>{{ $invoice->invoice_date }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Address:</b> {{ $invoice->order->company->address}} 
                            </td>
                            
                            <td>
                                <b>Company Name: </b>{{ $invoice->order->company->name }}<br>
                                <b>Email Address: </b>{{ $invoice->order->company->email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="2"><center><b>Thank you for your order and welcome to ProFinder UAE Business Directory</b></center>

                You have done a great decision to choose ProFinder the UAE’s leading Business Directory as a marketing channel for your business. 

                Adding your service and contact information to ProFinder will improve your company's visibility and awareness. With exact search terms and other information, your business stands out from the crowd and it is easier for customers to find you.

                Your contract period lasts 12 months. You can update your business information free of charge throughout the contract period. 

                Below you will find the information about your company to be published after we have received your payment. Please contact our customer service if you want to change the information.
                </td>
            </tr>
            
            <!-- For Products -->
            <!-- <tr class="heading">
                <td>
                    Package
                </td>
                
                <td>
                    Price
                </td>
            </tr>
           
            <tr class="item">
                <td>
                    
                </td>
                
                <td>
                    
                </td>
            </tr> -->

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Customer Information:</b>
                                <br>
                                    Name of the company: {{ $invoice->order->company->name }}<br> 
                                    Tax ID no:<br>
                                    Phone number: {{ $invoice->order->company->phone }}<br>
                                    Address: {{ $invoice->order->company->address }}<br>
                                    Zip Code: {{ $invoice->order->company->zipcode }}<br>
                                    City: {{ $invoice->order->company->city->name }}<br>
                                    Business/Opening hours:<br>
                                    Email: {{ $invoice->order->company->email }}<br>
                                    www: {{ $invoice->order->company->weblink }}<br>
                                    Industry:<br>
                                    Info Text:<br>
                                    Keywords: <br>

                            </td>
                            <td>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="text-center">
                    In order to list your company to the Internet for ProFinder's UAE Business Directory, please check the information provided above, sign the paper and then return it to us via email or post.
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                <b>Date:</b> 
                            </td>
                            
                            <td>
                                <b>Legal signature / Company stamp</b>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>