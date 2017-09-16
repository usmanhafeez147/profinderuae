<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class Subscription extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'subscriptions';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['order_no','booking_date','subscriber','price','paid'];
    // protected $hidden = [];
    // protected $dates = [];

    public function order()
    {
        return $this->belongsTo('App\Models\Order', 'order_no');
    }
}
