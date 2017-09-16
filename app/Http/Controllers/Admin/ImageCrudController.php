<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Intervention\Image\ImageManagerStatic as Image;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ImageRequest as StoreRequest;
use App\Http\Requests\ImageRequest as UpdateRequest;

class ImageCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Image');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/image');
        $this->crud->setEntityNameStrings('Image', 'Images');

        $this->crud->addColumn(['name'=>'image_path',
            'label'=>'Image',
            'type'=>'media_image',
            ]);

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
    }

    public function store(StoreRequest $request)
    {
        $imageFilename = $request->input('image_path');
        if ($imageFilename !== ''){ 
             $size1=Image::make($request->input('image'))->save(public_path('uploads/images/') .$imageFilename)->filesize();
        }
        return parent::storeCrud();
    }

    public function update(UpdateRequest $request)
    {
        $imageFilename = $request->input('image_path');
        
        if ($imageFilename !== ''){ 
             $size1=Image::make($request->input('image'))->save(public_path('uploads/images/') .$imageFilename)->filesize();
        }
        return parent::updateCrud();
    }
}
