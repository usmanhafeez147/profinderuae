<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Mail;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CompanyRequest as StoreRequest;
use App\Http\Requests\CompanyRequest as UpdateRequest;
use App\Models\Order;
use App\Models\Company;
class CompanyCrudController extends CrudController
{
   

    public function setUp()
    {
       
        $this->crud->setModel('App\Models\Company');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/company');
        $this->crud->setEntityNameStrings('Company', 'Companies');
       
        $this->crud->enableAjaxTable();
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess(['details_row']);

        $this->crud->setDefaultPageLength(10);
        
        $this->crud->addFilter([ // add a "simple" filter called Draft 
                              'type' => 'dropdown',
                              'name' => 'city_id',
                              'label'=> 'Cities'
                                ],
                                function() {
                                        $results= \App\Models\City::all(['id','name']);
                                        $values;
                                        foreach($results as $result){
                                            $values[$result->id]=$result->name;
                                        }
                                        return $values;
                                    }, 
                                function($value) { // if the filter is active (the GET parameter "draft" exits)
                                    $this->crud->addClause('where', 'city_id', $value);    
                                });

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'category_id',
                      'label'=> 'Categories'
                    ],
                    function() {
                            $results= \Backpack\NewsCRUD\app\Models\Category::all(['id','name']);
                            $values;
                            foreach($results as $result){
                                $values[$result->id]=$result->name;
                            }

                            return $values;
                           
                        }, 
                    function($value) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'category_id', $value);    
                    });
                    
        $this->crud->addColumn(
            [
            'label'=>'Company Id',
            'type'=>'company_id',
            'name'=>'id'
            ]);

        $this->crud->addColumn(['name'=>'name',
            'label'=>'Company Name',
            'type'=>'text',
            ]);
        
        /*$this->crud->addColumn(
            [
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
             ]);*/
        
        /*
        $this->crud->addColumn(
            [
            'label' => "Package",
            'type' => 'select',
            'name' => 'package_id',
            'entity' => 'package',
            'attribute' => 'title',
            'model' => "App\Models\Package"
             ]);*/
        
        $this->crud->addColumn(
            [
            'label' => "City",
            'type' => 'select',
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => 'name',
            'model' => "App\Models\City"
             ]);
        
       /* $this->crud->addColumn(['name'=>'contact_name',
            'label'=>'Contact Name',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'gsm',
            'label'=>'GSM',
            'type'=>'text',
            ]);*/
       /* $this->crud->addColumn(
            [
            'label' => "Description",
            'type' => 'textarea',
            'name' => htmlspecialchars ('description'),
             ]);*/

        $this->crud->addColumn(['name'=>'email',
            'label'=>'Company Email',
            'type'=>'email',
            ]);


        $this->crud->addColumn(['name'=>'phone',
            'label'=>'Telephone 1',
            'type'=>'text',
            ]);
        $this->crud->addColumn(['name'=>'phone2',
            'label'=>'Telephone 2',
            'type'=>'text',
            ]);
        
        /*$this->crud->addColumn(['name'=>'address',
            'label'=>'Address',
            'type'=>'address',
            ]);*/
        $this->crud->addColumn(['name'=>'billing_address',
            'label'=>'Billing Address',
            'type'=>'address',
            ]);

        $this->crud->addColumn(['name'=>'zipcode',
            'label'=>'Post-Code',
            'type'=>'text']);

        $this->crud->addColumn(['name'=>'featured',
            'label'=>'is Featured',
            'type'=>'check'
            ]);

        $this->crud->addColumn(['name'=>'image',
            'label'=>'Company Image',
            'type'=>'merchant_image',
            ]);

        $this->crud->addColumn(['name'=>'weblink',
            'label'=>'Web Link',
            'type'=>'url']);

    


        // fields
        
        /* $this->crud->addField(['name'=>'business_id',
            'label'=>'Business Id',
            'type'=>'text',
            ]);*/

        $this->crud->addField(
            [
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
             ]);
        
        $this->crud->addField(
            [
            'label' => "Package",
            'type' => 'select',
            'name' => 'package_id',
            'entity' => 'package',
            'attribute' => 'title',
            'model' => "App\Models\Package"
             ]);

        $this->crud->addField(['name'=>'name',
            'label'=>'Company Name',
            'type'=>'text',
            ]);
        $this->crud->addField(['name'=>'contact_name',
            'label'=>'Contact Name',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'gsm',
            'label'=>'GSM',
            'type'=>'text',
            ]);
    
        $this->crud->addField(
            [
            'label' => "Description",
            'type' => 'ckeditor',
            'name' => 'description',
             ]);

        $this->crud->addField(['name'=>'email',
            'label'=>'Company Email',
            'type'=>'email',
            ]);

        /* $this->crud->addField(['name'=>'password',
            'label'=>'Merchant password',
            'type'=>'password',
            ]);*/

        $this->crud->addField(['name'=>'phone',
            'label'=>'Telephone 1',
            'type'=>'text',
            ]);
        $this->crud->addField(['name'=>'phone2',
            'label'=>'Telephone 2',
            'type'=>'text',
            ]);

        $this->crud->addField(
            [
            'label' => "City",
            'type' => 'select',
            'name' => 'city_id',
            'entity' => 'city',
            'attribute' => 'name',
            'model' => "App\Models\City"
             ]);

        $this->crud->addField(['name'=>'address',
            'label'=>'Address',
            'type'=>'address',
            ]);
        $this->crud->addField(['name'=>'billing_address',
            'label'=>'Billing Address',
            'type'=>'address',
            ]);
        $this->crud->addField(['name'=>'zipcode',
            'label'=>'Post-Code',
            'type'=>'text']);

        $this->crud->addField(
            ['name'=>'featured',
            'label'=>'is Featured',
            'type'=>'checkbox'
            ]);

        $this->crud->addField([ // base64_image
            'label' => "Company Image",
            'name' => "image",
            'filename' => "image_filename", // set to null if not needed
            'type' => 'base64_image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true, // set to true to allow cropping, false to disable
        ]);

        $this->crud->addField(['name'=>'weblink',
            'label'=>'Weblink',
            'type'=>'url']);
        
    }


    public function store(StoreRequest $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'city_id'=>'required',
            'package_id'=>'required',
            'name'=>'required|unique:companies',
            'contact_name'=>'required',
            'address'=>'required',
            'zipcode'=>'required',
            'phone'=>'required',
            'billing_address'=>'required',
            'email'=>'required|email|unique:companies',
            /* 'image'=>'required',*/
        ]);
        
        if ($request->input('password')) {
            // If Password Field was Not Empty
            $item = $this->crud->create(\Request::except(['redirect_after_save']));
            
            // Password Encryption
            $item->password = bcrypt($request->input('password'));
            
            // Save Item to database
            $item->save();

            // Fetch the id_key for last insertion
            $companyId=$item->id;
           
            // Create An order with invoice
            Order::CreateOrder($companyId,$request->package_id,1);
            
            //Send Email and SMS for Reset Password to company Email 

            // Flashing the session and returning to companies crud
            \Alert::success(trans('backpack::crud.insert_success'))->flash();
            return redirect('admin/company');  
        
        } else {
            //if Password Field is blank

            //Create a Company row
            $item = $this->crud->create(\Request::except(['redirect_after_save', 'password']));
            
            // Fetch the id_key for last insertion
            $companyId=$item->id;
           
            // Create An order with invoice
            $orderInvoice=Order::CreateOrder($companyId,$request->package_id,1);
            
            //Send Email and SMS for Reset Password to company Email 

            // Flashing the session and returning to companies crud
            \Alert::success(trans('backpack::crud.insert_success'))->flash();
            return redirect('admin/company');

        }
  
    // End of create function
    }

    public function update(UpdateRequest $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'city_id'=>'required',
            'package_id'=>'required',
            'name'=>'required',
            'contact_name'=>'required',
            'address'=>'required',
            'zipcode'=>'required',
            'phone'=>'required',
            'billing_address'=>'required',
            'email'=>'required|email',
            /*'image'=>'required',*/
        ]);

       
        $company=Company::find($request->id)->first();

        if($company->package_id==$request->package_id) {
            // if company package is same like before then no need to create new order and invoices
           
            if ($request->input('password')) {               

                $item = $this->crud->update($request->get($this->crud->model->getKeyName()), $request->except('redirect_after_save', '_token'));
      
                $item->password = bcrypt($request->input('password'));
                $item->update();

                //Send Email and SMS for Reset Password to company Email 

                // Flashing the session and returning to companies crud
                \Alert::success(trans('backpack::crud.update_success'))->flash();
                return redirect('admin/company');

            } else {   
                
                $item = $this->crud->update($request->get($this->crud->model->getKeyName()),\Request::except(['redirect_after_save', 'password'])); 

                //Send Email and SMS for Reset Password to company Email 

                // Flashing the session and returning to companies crud
                 \Alert::success(trans('backpack::crud.update_success'))->flash();
                return redirect('admin/company');
            }//Password Condition is closed

        }else{
            // if company package has been changed then create new order
            echo "package is changed";
            if ($request->input('password')) {
               

                $item = $this->crud->update($request->get($this->crud->model->getKeyName()), $request->except('redirect_after_save', '_token'));
      
                $item->password = bcrypt($request->input('password'));
                $item->update();
                $companyId=$request->id;
                $orderInvoice=Order::CreateOrder($companyId,$request->package_id,1);
                 \Alert::success(trans('backpack::crud.update_success'))->flash();
                return redirect('admin/company');

            } else {   
                
                $item = $this->crud->update($request->get($this->crud->model->getKeyName()),\Request::except(['redirect_after_save', 'password'])); 
                 $companyId=$request->id;
                $orderInvoice=Order::CreateOrder($companyId,$request->package_id,1);
                 \Alert::success(trans('backpack::crud.update_success'))->flash();
                return redirect('admin/company');
            }
           
        }     
      
    }


     public function showDetailsRow($id)
    {
        $this->crud->hasAccessOrFail('details_row');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view('detailedRows.companyDetails', ['data'=>$this->data]);
    }

    public function details($id)
    {
        $company=Company::findOrFail($id);

        return view('details.companyDetails', ['data'=>$company]);
    }

}
