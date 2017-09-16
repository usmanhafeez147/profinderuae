<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{

    //protected $table = 'products';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['id','company_id','category_id','name'];
    // protected $hidden = [];
    // protected $dates = [];

    public function category()
    {
        return $this->belongsTo('Backpack\NewsCRUD\app\Models\Category', 'category_id');
    }
    
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
}
