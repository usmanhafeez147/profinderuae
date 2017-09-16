<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
//use Spatie\Permission\Traits\HasRoles;
class Country extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */
   // protected $guard_name = 'web';
    protected $table = 'countries';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','description'];
    // protected $hidden = [];
    // protected $dates = [];

}
