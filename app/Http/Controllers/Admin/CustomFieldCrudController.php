<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CustomFieldRequest as StoreRequest;
use App\Http\Requests\CustomFieldRequest as UpdateRequest;

class CustomFieldCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\CustomField');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/customfield');
        $this->crud->setEntityNameStrings('Custom Field', 'Custom Fields');
        $this->crud->setDefaultPageLength(10);
        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

    //    $this->crud->setFromDb();
        $this->crud->addColumn([
                                'name' => 'title',
                                'label' => 'Meta Title',
                                'type'=>'text'
                            ]);
        $this->crud->addColumn([
                                'name' => 'key',
                                'label' => 'Meta Keywords',
                                'type'=>'text'
                            ]);
        $this->crud->addColumn([
                                'name' => 'value',
                                'label' => 'Meta Title',
                                'type'=>'text'
                            ]);
        $this->crud->addColumn([
                                'name' => 'description',
                                'label' => 'Meta Description',
                                'type'=>'textarea'
                            ]);
       /* $this->crud->addColumn([
                                'name' => 'image',
                                'label' => 'Meta Image',
                                'type'=>'browse'
                            ]);*/
        $this->crud->addColumn([
                                'name' => 'img_title',
                                'label' => 'Image Title',
                                'type'=>'browse'
                            ]);
        $this->crud->addColumn([
                                'name' => 'img_alt',
                                'label' => 'Image Alt',
                                'type'=>'browse'
                            ]);

         $this->crud->addField([
                                'name' => 'title',
                                'label' => 'Meta Title',
                                'type'  => 'text',
                            ]);

         $this->crud->addField([
                                'name' => 'key',
                                'label' => 'Meta keywords',
                                'type'  => 'text',
                            ]);

         $this->crud->addField([
                                'name' => 'value',
                                'label' => 'Meta Value',
                                'type'  => 'text',
                            ]);

         $this->crud->addField([
                                'name' => 'description',
                                'label' => 'Meta Description',
                                'type'  => 'text',
                            ]);

        /* $this->crud->addField([
                                'name' => 'image',
                                'label' => 'Meta Image',
                                'type'  => 'browse',
                            ]);*/
         $this->crud->addField(
            [   // Browse
            'name' => 'image',
            'label' => 'Image',
            'filename' => "image_path",
            'type' => 'base64_image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 0,
            'disk' => 'uploads',
        ]); 
         
         $this->crud->addField([
                                'name' => 'img_title',
                                'label' => 'Image Title',
                                'type'  => 'text',
                            ]);

         $this->crud->addField([
                                'name' => 'img_alt',
                                'label' => 'Image Alt',
                                'type'  => 'text',
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
}
