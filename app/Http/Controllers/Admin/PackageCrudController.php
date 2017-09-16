<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\PackageRequest as StoreRequest;
use App\Http\Requests\PackageRequest as UpdateRequest;

class PackageCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Package');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/package');
        $this->crud->setEntityNameStrings('package', 'packages');

        $this->crud->enableAjaxTable();
        
        // Database Column
        $this->crud->addColumn([
            'name'=>'id',
            'label'=>'Id',
            'type'=>'text'
            ]);
        
        $this->crud->addColumn([
            'name'=>'title',
            'label'=>'Title',
            'type'=>'text'
            ]);

        $this->crud->addColumn([
            'name'=>'rent',
            'label'=>'Monthly Rent',
            'type'=>'text'
            ]);
        
        $this->crud->addColumn([
            'name'=>'products',
            'label'=>'Products',
            'type'=>'number'
            ]);
        
        $this->crud->addColumn([
            'name'=>'photos',
            'label'=>'Photos',
            'type'=>'number'
            ]);

        $this->crud->addColumn([
            'name'=>'videos',
            'label'=>'Videos',
            'type'=>'number'
            ]);

        $this->crud->addColumn([
            'name'=>'keywords',
            'label'=>'Keywords',
            'type'=>'number'
            ]);
        
        
        $this->crud->addColumn([
            'name'=>'company_name',
            'label'=>'Company Name',
            'type'=>'check']);
        
        $this->crud->addColumn([
            'name'=>'logo',
            'label'=>'Logo',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'address',
            'label'=>'Address',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'telephone',
            'label'=>'Telephone',
            'type'=>'check']);
        
        $this->crud->addColumn([
            'name'=>'fax',
            'label'=>'fax',
            'type'=>'check']);
        
        $this->crud->addColumn([
            'name'=>'gsm',
            'label'=>'GSM',
            'type'=>'check']);

        
        $this->crud->addColumn([
            'name'=>'service_no',
            'label'=>'Service Number',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'line_of_business',
            'label'=>'Line Of Business',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'web_page_link',
            'label'=>'Web Page Link',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'email_link',
            'label'=>'Email Link',
            'type'=>'check']);

         $this->crud->addColumn([
            'name'=>'business_hours',
            'label'=>'Business Hours',
            'type'=>'check']);

        $this->crud->addColumn([
            'name'=>'google_map_link',
            'label'=>'Google Map Link',
            'type'=>'check']);
        
        $this->crud->addColumn([
            'name'=>'social_media_links',
            'label'=>'Social Media Links',
            'type'=>'check'
            ]);

       /* $this->crud->addColumn(
            [   // Browse
            'name' => 'image',
            'label' => 'Package Image',
            'type' => 'package_image',
            ]);*/
        //AddField
        

        $this->crud->addField([
            'name'=>'title',
            'label'=>'Title',
            'type'=>'text',
            'tab' => 'First Step'
            ]);
       
        $this->crud->addField([
            'name'=>'rent',
            'label'=>'Monthly Rent',
            'type'=>'number',
            'tab' => 'First Step'
            ]);

        $this->crud->addField([
            'name'=>'products',
            'label'=>'Products',
            'type'=>'number',
            'tab' => 'First Step'
            ]);
        
        $this->crud->addField([
            'name'=>'photos',
            'label'=>'Photos',
            'type'=>'number',
            'tab' => 'First Step'
            ]);
        
        $this->crud->addField([
            'name'=>'videos',
            'label'=>'Videos',
            'type'=>'number',
            'tab' => 'First Step'
            ]);

        $this->crud->addField([
            'name'=>'keywords',
            'label'=>'Keywords',
            'type'=>'number',
            'tab' => 'First Step'
            ]);
        
        $this->crud->addField([
            'name'=>'company_name',
            'label'=>'Company Name',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);
        
        $this->crud->addField([
            'name'=>'logo',
            'label'=>'Logo',
            'type'=>'checkbox']);

        $this->crud->addField([
            'name'=>'address',
            'label'=>'Address',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);

        $this->crud->addField([
            'name'=>'telephone',
            'label'=>'Telephone',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);
        
        $this->crud->addField([
            'name'=>'fax',
            'label'=>'fax',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);
        
        $this->crud->addField([
            'name'=>'gsm',
            'label'=>'GSM',
            'type'=>'checkbox',
            'tab'=>'Second Step'
            
            ]);

        $this->crud->addField([
            'name'=>'service_no',
            'label'=>'Service No',
            'type'=>'checkbox',
            'tab' => 'Second Step']);

        $this->crud->addField([
            'name'=>'line_of_business',
            'label'=>'Line Of Business',
            'type'=>'checkbox',
            'tab' => 'Second Step']);

        $this->crud->addField([
            'name'=>'web_page_link',
            'label'=>'Web Page Link',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);

        $this->crud->addField([
            'name'=>'email_link',
            'label'=>'Email Link',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);

         $this->crud->addField([
            'name'=>'business_hours',
            'label'=>'Business Hours',
            'type'=>'checkbox',
            'tab' => 'Second Step']);

        $this->crud->addField([
            'name'=>'google_map_link',
            'label'=>'Google Map Link',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);
        
        $this->crud->addField([
            'name'=>'social_media_links',
            'label'=>'Social Media Links',
            'type'=>'checkbox',
            'tab' => 'Second Step'
            ]);

       /* $this->crud->addField(
            [   // Browse
            'name' => 'image',
            'label' => 'Package Image',
            'filename' => "image_filename",
            'type' => 'base64_image',
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 2,
            'disk' => 'uploads',
            'tab'=>'Image'
        ]);*/
       // $this->crud->setFromDb();

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
