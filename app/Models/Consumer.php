<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Consumer extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'consumers';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['name','industry','company','phone','address','p_o_box','fax','email','is_noted','domain','note','note_date','is_public','creator_id'];
    // protected $hidden = [];
    // protected $dates = [];


    public function creator(){
        return $this->belongsTo('app\User', 'creator_id');
    }

}
