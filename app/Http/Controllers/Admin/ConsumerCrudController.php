<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;
use Mail;
// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ConsumerRequest as StoreRequest;
use App\Http\Requests\ConsumerRequest as UpdateRequest;
use App\Models\Consumer;
use Excel;
use Illuminate\Http\Request;

use Auth;
class ConsumerCrudController extends CrudController
{

    public function setUp()
    {

        /*
        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Consumer');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/consumer');
        $this->crud->setEntityNameStrings('Consumer', 'Consumers');
        $this->crud->setDefaultPageLength(10);
        
        if(Auth::user()->hasRole('Calling Agent')){
            $this->crud->denyAccess(['delete']);
        }
        
        $this->crud->enableAjaxTable();

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                              'type' => 'dropdown',
                              'name' => 'address',
                              'label'=> 'Address'
                                ],
                                function() {
                                        $results= \App\Models\Consumer::groupBy('address')->get(['address']);
                                        //dd($results);
                                        $values;
                                        foreach($results as $result){
                                            $values[$result->address]=$result->address;
                                        }
                                        return $values;
                                    }, 
                                function($value) { 
                                    $this->crud->addClause('where', 'address', $value);    
                                });

        $this->crud->addFilter([ // add a "simple" filter called Draft 
                              'type' => 'dropdown',
                              'name' => 'industry',
                              'label'=> 'Category'
                                ],
                                function() {
                                        $results= \App\Models\Consumer::groupBy('industry')->get(['industry']);
                                        //dd($results);
                                        $values;
                                        foreach($results as $result){
                                            $values[$result->industry]=$result->industry;
                                        }
                                        return $values;
                                    }, 
                                function($value) { 
                                    $this->crud->addClause('where', 'industry', $value);    
                                });
        
        $this->crud->addFilter([ // add a "simple" filter called Draft 
                      'type' => 'dropdown',
                      'name' => 'is_noted',
                      'label'=> 'Is Note Writen'
                    ],
                    function() {
        
                            return [1=>'Noted',
                           // 0=>'Not Noted',
                            ''=>'Not Noted'];
                          
                        }, 
                    function($values) { // if the filter is active (the GET parameter "draft" exits)
                        $this->crud->addClause('where', 'is_noted', $values); 
                    });
        
        $this->crud->addColumn([
            'label' => "Consumer Id",
            'type' => 'number',
            'name' => 'id',
             ]);
        
        $this->crud->addColumn([
            'label' => "Company Name",
            'type' => 'text',
            'name' => 'name',
             ]);

        /*$this->crud->addColumn(['name'=>'industry',
            'label'=>'Category',
            'type'=>'text',
            ]);

        $this->crud->addColumn(
            [
            'label' => "Sub category",
            'type' => 'text',
            'name' => 'company',
             ]);*/
        
        
        $this->crud->addColumn(['name'=>'email',
            'label'=>'Email',
            'type'=>'email',
            ]);
        
        $this->crud->addColumn(['name'=>'phone',
            'label'=>'Phone No',
            'type'=>'text',
            ]);

        $this->crud->addColumn(['name'=>'address',
            'label'=>'Address',
            'type'=>'address',
            ]);
        
        $this->crud->addColumn(['name'=>'p_o_box',
            'label'=>'P.O.Box',
            'type'=>'text',
            ]);

        /*$this->crud->addColumn(['name'=>'fax',
            'label'=>'Fax',
            'type'=>'text',
            ]);*/
        
        /*$this->crud->addColumn(['name'=>'domain',
            'label'=>'Website',
            'type'=>'url']);*/

        $this->crud->addColumn([
            'name'=>'is_noted',
            'type'=>"check",
            'label'=>'Is Noted'
            ]);

        $this->crud->addColumn([
            'name'=>'note',
            'type'=>"text",
            'label'=>'Note'
            ]);

        $this->crud->addColumn([
            'name'=>'note_date',
            'type'=>"date",
            'label'=>'Note Date'
            ]);
        
        $this->crud->addColumn(['name'=>'is_public',
            'label'=>'Is Public',
            'type'=>'check']);
        
        $this->crud->addColumn(
            [
            'label' => "Creator",
            'type' => 'select',
            'name' => 'creator_id',
            'entity' => 'creator',
            'attribute' => 'name',
            'model' => "app\User"
             ]);



        // fields
      
        $this->crud->addField([
            'label' => "Company Name",
            'type' => 'text',
            'name' => 'name',
             ]);
     
        $this->crud->addField(['name'=>'industry',
            'label'=>'Category',
            'type'=>'text',
            ]);
        $this->crud->addField(
            [
            'label' => "Sub Category",
            'type' => 'text',
            'name' => 'company',
             ]);

        $this->crud->addField(['name'=>'email',
            'label'=>'Email',
            'type'=>'email',
            ]);
        $this->crud->addField(['name'=>'phone',
            'label'=>'Phone No',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'address',
            'label'=>'Address',
            'type'=>'address',
            ]);

        $this->crud->addField(['name'=>'p_o_box',
            'label'=>'P.O.Box',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'fax',
            'label'=>'Fax',
            'type'=>'text',
            ]);

        $this->crud->addField(['name'=>'domain',
            'label'=>'Website',
            'type'=>'url']);
        
        $this->crud->addField(
            [
            'label' => 'Want to Add Note?',
            'name' => 'is_noted',
            'type' => 'toggle',
            'inline' => true,
            'options' => [
                0 => 'No',
                1 => 'Yes'
            ],
            'hide_when' => [
                0 => ['note', 'note_date','creator_id'],
                ],
            'default' => 0
            ]);
        $this->crud->addField([ 
            'label' => "Add Notes", 
            'type' => 'textarea', 
            'name' => 'note', 
            'both'
            ]);
        $this->crud->addField([ 
            'label' => "date", 
            'type' => 'date', 
            'name' => 'note_date', 'both'
            ]);
       $this->crud->addField([
        'name'  => 'creator_id', 
        'type'  => 'hidden', 
        'value' => Auth::user()->id,
        ]); 
        $this->crud->addField([
            'name'=>'is_public',
            'label'=>'Is Public',
            'type'=>'checkbox'
            ]);

    }

    public function lista(){
        $id=1;
        // echo $id;
        // die();
        
        $this->crud->addClause('where','id','==',$id);
      
       // $this->crud->addClause('where','id',1);
        $this->crud->hasAccessOrFail('list');
        //$this->crud->addClause('where', 'id','==',100);
        $this->data['crud'] = $this->crud;
        $this->data['title'] = ucfirst($this->crud->entity_name_plural);

        // get all entries if AJAX is not enabled
        
            $this->data['entries'] = $this->data['crud']->getEntries();
            //dd($this->data['entries']);
        

        // load the view from /resources/views/vendor/backpack/crud/ if it exists, otherwise load the one in the package
        return view($this->crud->getListView(), $this->data);
    }
    public function store(StoreRequest $request)
    {
        $redirect_location = parent::storeCrud();
          return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        $redirect_location = parent::updateCrud();
        return $redirect_location;  
    }

    public function importExport(){
        return view('importExport');
    }


    public function importExcel(Request $request)
    {

        //echo $request->file('import_file');
        if($request->hasFile('import_file')){
            $path = $request->file('import_file')->getRealPath();

            Excel::filter('chunk')->load($path)->chunk(1500, function($results)
            {
                foreach($results as $rows)
                {
                    foreach($rows as $row){

                        Consumer::create([
                            'name' => $row['companyname'],
                            'address' => $row['location'],
                        
                            'phone'=>$row['phone'],
                            'fax'=>$row['fax'],
                            'email' => $row['email'],
                            'domain' => $row['website'] 
                            ]
                        );
                    }
                }
                    
            });
            return back()->with('success','Insert Record successfully.');
        }else{
            echo "file is not imported";
        }

    }
}
