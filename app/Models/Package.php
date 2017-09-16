<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Package extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'packages';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = [ 'title' , 'rent' , 'products' ,
                             'photos' , 'videos' , 'keywords' ,
                             'company_name' , 'logo' , 'address' ,
                             'telephone', 'fax' , 'gsm' , 'service_no' ,
                             'web_page_link', 'email_link' ,
                             'google_map_link' , 'line_of_business' ,
                             'business_hours' , 'social_media_links' , 'image'
                            ];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */
   
    public function Companies(){
        $this->belongsTo('App\Model\Company');
     }
    public function order(){
         $this->hasMany('App\Models\Order', 'product_id', 'id');
    }
    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
