<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Product extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'products';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['id','company_id','category_id','name','price','quantity','commission','description','photo'];
    // protected $hidden = [];
    // protected $dates = [];

    public function category()
    {
        return $this->belongsTo('Backpack\NewsCRUD\app\Models\Category');
    }
    
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
}
