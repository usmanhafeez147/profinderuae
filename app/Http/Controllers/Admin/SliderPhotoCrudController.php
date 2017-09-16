<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SliderPhotoRequest as StoreRequest;
use App\Http\Requests\SliderPhotoRequest as UpdateRequest;

class SliderPhotoCrudController extends CrudController
{

    public function setUp()
    {

        /*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
        

        $this->crud->setModel("App\Models\SliderPhoto");
        $this->crud->setRoute("admin/sliderphoto");
        $this->crud->setEntityNameStrings('Slider Photo', 'Slider Photos');
        $this->crud->setDefaultPageLength(10);
        
        $this->crud->addColumn(['name'=>'title',
            'label'=>'Title',
            'type'=>'text',
            ]);

        $this->crud->addColumn([
            'name'=>'description',
            'label'=>'Description',
            'type'=>'text']);

        
        $this->crud->addColumn([
            'name'=>'image_path',
            'label'=>'Image',
            'type'=>'slider_image']);

        $this->crud->addField([    
                                'name' => 'title',
                                'label' => 'Enter Title',
                                'type' => 'text',
                                'placeholder' => 'Enter Title Here',
                            ]);

        $this->crud->addField([    
                                'name' => 'description',
                                'label' => 'Enter Description',
                                'type' => 'text',
                               
                            ]);
        $this->crud->addField(
            [   // Browse
            'name' => 'image_path',
            'label' => 'Slider Image',
            'filename' => "image_filename",
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
		// your additional operations before save here
        $redirect_location = parent::updateCrud();
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
	}
}
