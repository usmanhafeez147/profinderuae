<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\SubscriptionRequest as StoreRequest;
use App\Http\Requests\SubscriptionRequest as UpdateRequest;

class SubscriptionCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Subscription');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/subscription');
        $this->crud->setEntityNameStrings('Subscription', 'Subscriptions');

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION  ['order_no','booking_date','subscriber','price','paid']
        |--------------------------------------------------------------------------
        */

        //$this->crud->setFromDb();

         $this->crud->addColumn(
                        [
                        'label' => "Order No",
                        'type' => 'select',
                        'name' => 'order_no',
                        'entity' => 'order',
                        'attribute' => 'id',
                        'model' => "App\Models\Order"
                         ]);

         $this->crud->addColumn(['name'=>'booking_date',
            'label'=>'Booking Date',
            'type'=>'date',
            ]);

         $this->crud->addColumn(['name'=>'subscriber',
            'label'=>'Subscriber Name',
            'type'=>'text',
            ]);
         
         $this->crud->addColumn(['name'=>'price',
            'label'=>'Price',
            'type'=>'number',
            ]);

         $this->crud->addColumn(['name'=>'paid',
            'label'=>'Paid',
            'type'=>'checkbox',
            ]);

         //

        $this->crud->addField(
                        [
                        'label' => "Order No",
                        'type' => 'select',
                        'name' => 'order_no',
                        'entity' => 'order',
                        'attribute' => 'seller',
                        'model' => "App\Models\Order"
                         ]);

        $this->crud->addField(['name'=>'booking_date',
            'label'=>'Booking Date',
            'type'=>'date',
            ]);

         $this->crud->addField(['name'=>'subscriber',
            'label'=>'Subscriber Name',
            'type'=>'text',
            ]);
         
         $this->crud->addField(['name'=>'price',
            'label'=>'Price',
            'type'=>'number',
            ]);
       
          $this->crud->addField([ // select_from_array
                'name' => 'paid',
                'label' => "Paid",
                'type' => 'select_from_array',
                'options' => [1 => 'Waiting for payment', 2 => 'pending confirmation',3=>'paid',4=>'wrought'],
                'allows_null' => false,
                // 'allows_multiple' => true, // OPTIONAL; needs you to cast this to array in your model;
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
