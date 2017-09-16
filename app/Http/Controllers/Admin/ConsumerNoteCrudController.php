<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ConsumerNoteRequest as StoreRequest;
use App\Http\Requests\ConsumerNoteRequest as UpdateRequest;

class ConsumerNoteCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ConsumerNote');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/consumernote');
        $this->crud->setEntityNameStrings('Consumer Note', 'Consumer Notes');
        
        $this->crud->setDefaultPageLength(10);
        $this->crud->denyAccess(['delete']);

        //columns

        $this->crud->addColumn([
            'name'=>'id',
            'label'=>'Consumer Note Id',
            'type'=>'text'
            ]);

        $this->crud->addColumn(
            [
            'label' => "Consumer",
            'type' => 'select',
            'name' => 'consumer_id',
            'entity' => 'consumer',
            'attribute' => 'name',
            'model' => "App\Models\Consumer"
             ]);

        $this->crud->addColumn([
            'name'=>'office',
            'label'=>'Office',
            'type'=>'text'
            ]);

        $this->crud->addColumn([
            'name'=>'notes',
            'label'=>'Notes',
            'type'=>'text'
            ]);

        $this->crud->addColumn(
            [
            'label' => "Creator",
            'type' => 'select',
            'name' => 'creator_id',
            'entity' => 'creator',
            'attribute' => 'name',
            'model' => "App\User"
             ]);



        //fields
        $this->crud->addField(
            [
            'label' => "Consumer",
            'type' => 'select',
            'name' => 'consumer_id',
            'entity' => 'consumer',
            'attribute' => 'name',
            'model' => "App\Models\Consumer"
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

         $this->crud->addField([
            'name'=>'notes',
            'label'=>'Notes',
            'type'=>'textarea'
            ]);

        $this->crud->addField(
            [
            'label' => "Creator",
            'type' => 'select',
            'name' => 'creator_id',
            'entity' => 'creator',
            'attribute' => 'name',
            'model' => "App\User"
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
