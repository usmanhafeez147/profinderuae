<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\VideoRequest as StoreRequest;
use App\Http\Requests\VideoRequest as UpdateRequest;

class VideoCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Video');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/video');
        $this->crud->setEntityNameStrings('Video', 'Videos');


            $this->crud->addColumn(['name'=>'file_name',
            'label'=>'Video',
            'type'=>'text',
            ]);

            $this->crud->addField(
            [   // Browse
            'name' => 'file_name',
            'label' => 'Add Video',
            'type'  => 'browse'
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
