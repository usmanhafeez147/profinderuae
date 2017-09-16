<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\AudioRequest as StoreRequest;
use App\Http\Requests\AudioRequest as UpdateRequest;

class AudioCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Audio');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/audio');
        $this->crud->setEntityNameStrings('Audio', 'Audios');


        $this->crud->addColumn(['name'=>'file_name',
            'label'=>'Audio',
            'type'=>'browse',
            ]);

        $this->crud->addField(
            [   // Browse
            'name' => 'file_name',
            'label' => 'Add Audio',
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
