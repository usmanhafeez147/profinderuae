<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\OrderRequest as StoreRequest;
use App\Http\Requests\OrderRequest as UpdateRequest;
use App\Models\Invoice;
use App\Models\Order;
use App\Models\Package;
use Carbon\Carbon;
use Auth;
use DB;
class OrderCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Order');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/order');
        $this->crud->setEntityNameStrings('Order', 'Orders');
        $this->crud->setDefaultPageLength(10);
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->denyAccess(['delete']);
        
        $this->crud->addButton('line', 'print','print', "print.printOrderButton", 2);
        $this->crud->enableExportButtons();
        //$this->crud->addButton($stack,$name,$content,$view,$position);
        
        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'company_id',
                      'label'=> 'Companies'
                    ],

                    function() {
                            $results= \App\Models\Company::all(['id','name']);
                            $values;
                            foreach($results as $result){
                                $values[$result->id]=$result->name;
                            }

                            return $values;
                          
                        }, 
                    function($values) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'company_id', $values); 
                       
                    });

        $this->crud->addFilter([
                 'type' => 'date_range',
                 'name' => 'created_at',
                 'label'=> 'Date Range'
               ],
               false,
               function($value) {
                 $dates = json_decode($value);
                 $this->crud->addClause('where', 'created_at', '>=', $dates->from);
                 $this->crud->addClause('where', 'created_at', '<=', $dates->to);
                });

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'paid',
                      'label'=> 'Payment'
                    ],
                    function() {
                            
                            return [1=>'Paid',0=>'Not Paid'];
                          
                        }, 
                    function($values) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'paid', $values); 
                    });
    

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'creator_id',
                      'label'=> 'Creators'
                    ],
                    function() {
                            $results= \App\User::all(['id','name']);
                            $values;
                            foreach($results as $result){
                                $values[$result->id]=$result->name;
                            }

                            return $values;
                          
                        }, 
                    function($value) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'creator_id', $value); 
                       
                    });

        //columns
        $this->crud->addColumn(['name'=>'id',
            'label'=>'Order Id',
            'type'=>'order_id',
            ]);

        $this->crud->addColumn(
            [
            'label' => "Company Name",
            'type' => 'select',
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => 'name',
            'model' => "App\Models\Company"
             ]);

        $this->crud->addColumn(
            [
            'label' => "Package Name",
            'type' => 'select',
            'name' => 'package_id',
            'entity' => 'package',
            'attribute' => 'title',
            'model' => "App\Models\Package"
             ]);
        $this->crud->addColumn(
            [
            'label' => "Price", // Table column heading
            'name'=>'price',
           'type' => "model_function",
           'function_name' => 'getPrice', // the method in your Model
            ]
            );

        $this->crud->addColumn([
            'name'=>'order_date',
            'label'=>'Order Date',
            'type'=>'date',
            ]);

        $this->crud->addColumn(['name'=>'paid',
            'label'=>'Paid',
            'type'=>'check',
            ]);


       $this->crud->addColumn(
            [
            'label' => "Creator Name",
            'type' => 'select',
            'name' => 'creator_id',
            'entity' => 'creator',
            'attribute' => 'name',
            'model' => "App\User"
             ]);

        $this->crud->addColumn(
            [
            'label' => "Office",
            'type' => 'text',
            'name' => 'office',
             ]);

      

        
        //adding fields
        $this->crud->addField(
             [
            'label' => "Company",
            'type' => 'select',
            'name' => 'company_id',
            'entity' => 'company',
            'attribute' => 'name',
            'model' => "App\Models\Company"
             ]);

        $this->crud->addField(
            [
            'label' => "Package",
            'type' => 'select',
            'name' => 'package_id',
            'entity' => 'package',
            'attribute' => 'title',
            'model' => "App\Models\Package",
             ]);

        $this->crud->addField([   // date_picker
               'name' => 'order_date',
               'type' => 'date_picker',
               'label' => 'Order Date',
               // optional:
               'date_picker_options' => [
                  'todayBtn' => true,
                  'format' => 'dd-mm-yyyy',
                  'language' => 'en'
               ],
            ]);

        

        $this->crud->addField(['name'=>'paid',
            'label'=>'Paid',
            'type'=>'checkbox',
            ]);

       
        $this->crud->addField([
        'name'  => 'creator_id', 
        'type'  => 'hidden', 
        'value' => Auth::user()->id,
        ]); 

        $this->crud->addField(
            [ // select_from_array
            'name' => 'office',
            'label' => "Office",
            'type' => 'select_from_array',
            'options' => ["Dubai Office" => "Dubai Office", "India Office" => "India Office"],
            'allows_null' => false,
            // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
        ]);
        
    }

   
    public function getDailyReport(){

        $this->crud->addClause('whereDate','order_date', '=', date('Y-m-d'));
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Today's Order list");

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }
        return view($this->crud->getListView(), $this->data);
    }
    
    public function getWeeklyReport(){

        $yesterday = Carbon::now()->subDays(1);
        $one_week_ago = Carbon::now()->subWeeks(1);
       
        $this->crud->addClause('whereBetween',DB::raw('date(order_date)'),[$one_week_ago, $yesterday]);
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Weekly Order list");

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        return view($this->crud->getListView(), $this->data);
    }

    public function getMonthlyReport(){
         $yesterday = Carbon::now()->subDays(1);
        $one_month_ago = Carbon::now()->subMonths(1);
       
        $this->crud->addClause('whereBetween',DB::raw('date(order_date)'),[$one_month_ago, $yesterday]);
      
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Monthly Order list");

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        return view($this->crud->getListView(), $this->data);
    }

    public function store(StoreRequest $request)
    {

        $this->validate($request,[
            'package_id'=>'required',
            'creator_id'=>'required',
            'company_id'=>'required',
            'order_date'=>'required'
            ]);


        $redirect_location = parent::storeCrud();
       
        $id= $this->crud->entry->id;
     
        
        if($request->paid==1){
            $invoice=Invoice::create([
                'order_id'=>$id,
                'invoice_date'=>date('Y-m-d'),
                ]);
            if($invoice){
                return $redirect_location;    
            }else{
                echo "Could not create an Order";
            }
        }
        else{
            return $redirect_location;
        }
      
    }
    
    public function update(UpdateRequest $request)
    {
        //echo $request->paid;
        $this->validate($request,[
            'package_id'=>'required',
            'creator_id'=>'required',
            'company_id'=>'required',
            'order_date'=>'required'
            ]);
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        
        $id= $this->crud->entry->id;
       
        if($request->paid==1){
            $invoice =Invoice::where('order_id','=',$id)->first();

            if(empty($invoice->id)){
                $invoice=Invoice::create([
                'order_id'=>$request->id,
                'invoice_date'=>date('Y-m-d'),
                ]);
                if($invoice){
                    return $redirect_location;    
                }else{
                    //unable to add invoice
                    return redirect()->url('admin/order');
                }
            }
            else{
                //invoice already generated
               return $redirect_location;
            }
        
        }
        else{
            //invoice should be unpaid
             return $redirect_location;
        }

    }

    public function printOrder($id){

        $order=Order::findOrFail($id);
        
       // dd($order->merchants->city->name);
        if(!empty($order)){
            return view('print.printOrder',['order'=>$order]);
        }else{

            return redirect('admin/order');
        }
    }

    public function details($id)
    {
        $order = Order::findorFail($id);

        return view('details.orderDatails', ['order' => $order]);
    }
}
