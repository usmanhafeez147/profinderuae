<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\InvoiceRequest as StoreRequest;
use App\Http\Requests\InvoiceRequest as UpdateRequest;
use App\Models\Invoice;
use App\Models\Package;
use App\Models\Order;
use Carbon\Carbon;
use DB;
class InvoiceCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Invoice');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/invoice');
        $this->crud->setEntityNameStrings('Invoice', 'Invoices');

        $this->crud->denyAccess(['create','update','delete']);
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->addButton('line', 'print','print', "print.printInvoiceButton", 1);
        $this->crud->enableExportButtons();

      //  $this->crud->enableAjaxTable();
        $this->crud->addColumn([
            'label'=>'Invoice Id',
            'name'=>'id',
            'type'=>'invoice_id'
        ]);
        
        $this->crud->addColumn([
            'label'=>'Order Id',
            'name'=>'order_id',
            'type'=>'text']);
        
        $this->crud->addColumn([
            'label'=>'Company Name',
            'name'=>'company_id',
            'type'=>'model_function',
            'function_name' => 'getCompanyName',
            ]);
        $this->crud->addColumn([
            'label'=>'Package Name',
            'name'=>'package_id',
            'type'=>'model_function',
            'function_name' => 'getPackageName',
            ]);
        $this->crud->addColumn([
            'label'=>'Price',
            'name'=>'Price',
            'type'=>'model_function',
            'function_name' => 'getPackagePrice',
            ]);
        
        $this->crud->addColumn([
            'label'=>'invoice date',
            'name'=>'invoice_date',
            'type'=>'text']);


      
    }

       public function getDailyReport(){

        $this->crud->addClause('whereDate','invoice_date', '=', date('Y-m-d'));
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Today's Invoice list");

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        return view($this->crud->getListView(), $this->data);
    }
    
    public function getWeeklyReport(){
        $yesterday = Carbon::now()->subDays(1);
        $one_week_ago = Carbon::now()->subWeeks(1);
       
        $this->crud->addClause('whereBetween',DB::raw('date(invoice_date)'),[$one_week_ago, $yesterday]);
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Today's Order list");

        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        return view($this->crud->getListView(), $this->data);
    }

    public function getMonthlyReport(){
        $yesterday = Carbon::now()->subDays(1);
        $one_month_ago = Carbon::now()->subWeeks(1);
       
        $this->crud->addClause('whereBetween',DB::raw('date(invoice_date)'),[$one_month_ago, $yesterday]);
        $this->crud->hasAccessOrFail('list');

        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst("Today's Order list");

        // get all entries if AJAX is not enabled
        if (! $this->data['crud']->ajaxTable()) {
            $this->data['entries'] = $this->data['crud']->getEntries();
        }

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getListView(), $this->data);
    }

    /*public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }*/
    
    public function printInvoice($id){
        $invoice=Invoice::findOrFail($id)->first();
        
        if(!empty($invoice->id)){
            
            return view('print.printInvoice',['invoice'=>$invoice]);
        }else{

            return redirect('admin/invoice');
        }
    }

    public function details($id)
    {
        $invoice = Invoice::findOrFail($id);
        return view('details.invoiceDetails', ['invoice'=>$invoice]);
    }
}
