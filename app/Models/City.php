<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class City extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'cities';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['id','name','description'];
    // protected $hidden = [];
    // protected $dates = [];

     public function Companies(){
        return $this->hasMany('App\Models\Company');
     }

     public function Consumers(){
        return $this->hasMany('App\Models\Consumer');
     }
}
