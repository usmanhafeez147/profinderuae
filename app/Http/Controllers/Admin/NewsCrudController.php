<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\NewsRequest as StoreRequest;
use App\Http\Requests\NewsRequest as UpdateRequest;

class NewsCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\News');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/news');
        $this->crud->setEntityNameStrings('News', 'News');
        $this->crud->setDefaultPageLength(10);
       // ------ CRUD COLUMNS

        $this->crud->addColumn([
                                'name' => 'id',
                                'label' => 'News Id',
                                'type'=>'number'
                            ]);

        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Title',
                                'type'=>'text'
                            ]);

        $this->crud->addColumn([
                                'name' => 'short_desc',
                                'label' => 'Short Description',
                                'type'=>'textarea'
                            ]);
        $this->crud->addColumn([
                                'name' => 'description',
                                'label' => 'News Description',
                                'type'=>'ckeditor'
                            ]); 
       
        $this->crud->addColumn(['name'=>'image',
                                'label'=>'News Image',
                                'type'=>'news_image',
                                ]);



         $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Title',
                                'type'  => 'text',
                            ]);

         $this->crud->addField([
                                'name' => 'short_desc',
                                'label' => 'Short Description',
                                'type'=>'textarea'
                            ]);
          $this->crud->addField([
                                'name' => 'description',
                                'label' => 'News Description',
                                'type'=>'ckeditor'
                            ]);
         $this->crud->addField(
            [   // Browse
            'name' => 'image',
            'label' => 'News Image',
            'filename' => "image_path",
            'type' => 'base64_image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0,
            'disk' => 'uploads',
        ]); 
    }

    public function store(StoreRequest $request)
    {
        
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
     
        return parent::updateCrud();
    }
}
