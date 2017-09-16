<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductRequest as StoreRequest;
use App\Http\Requests\ProductRequest as UpdateRequest;

class ProductCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Product');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product');
        $this->crud->setEntityNameStrings('Product', 'Products');
        $this->crud->setDefaultPageLength(10);
        $this->crud->enableAjaxTable();
        $this->crud->enableDetailsRow();
        $this->crud->allowAccess('details_row');
        // $this->crud->setDetailsRowView('your-view');


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
                    function($value) { 
                        $this->crud->addClause('where', 'category_id', $value); 
                        
                    });
        

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'company_id',
                      'label'=> 'Comapnies'
                    ],
                    function() {
                            $results= \App\Models\Company::all(['id','name']);
                            $values;
                            foreach($results as $result){
                                $values[$result->id]=$result->name;
                            }

                            return $values;
                          
                        }, 
                    function($value) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'company_id', $value); 
                       
                    });
       
        
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
            'label' => "Category Name",
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
             ]);

        $this->crud->addColumn(['name'=>'name',
            'label'=>'Product Name',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'price',
            'label'=>'Product Price',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'quantity',
            'label'=>'Product Quantity',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'commission',
            'label'=>'Product Commission',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'short_desc',
            'label'=>'Short Description',
            'type'=>'textarea',
            ]);

        $this->crud->addColumn(['name'=>'description',
            'label'=>'Product Description',
            'type'=>'ckeditor',
            ]);
        
        $this->crud->addColumn(['name'=>'photo',
            'label'=>'Product Image',
            'type'=>'product_image',
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
            'label' => "Category",
            'type' => 'select',
            'name' => 'category_id',
            'entity' => 'category',
            'attribute' => 'name',
            'model' => "Backpack\NewsCRUD\app\Models\Category"
        ]);

         $this->crud->addField(['name'=>'name',
            'label'=>'Product Name',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'price',
            'label'=>'Product Price',
            'type'=>'number',
            ]);

        $this->crud->addField(['name'=>'quantity',
            'label'=>'Product Quantity',
            'type'=>'number',
            ]);

        $this->crud->addField(['name'=>'commission',
            'label'=>'Product Commission',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'short_desc',
            'label'=>'Short Description',
            'type'=>'textarea',
            ]);

        $this->crud->addField(['name'=>'description',
            'label'=>'Product Description',
            'type'=>'ckeditor',
            ]);
        
        $this->crud->addField([ // base64_image
            'label' => "Product Image",
            'name' => "photo",
            'filename' => "image_filename", // set to null if not needed
            'type' => 'base64_image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true, // set to true to allow cropping, false to disable
        ]);
        
    }

    public function store(StoreRequest $request)
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
    }
    public function showDetailsRow($id){
       $this->crud->hasAccessOrFail('details_row');

        $this->data['entry'] = $this->crud->getEntry($id);
        $this->data['crud'] = $this->crud;

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getDetailsRowView(), $this->data);
    }
}
