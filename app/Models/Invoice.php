<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Order;
use App\Models\Company;
class Invoice extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'invoices';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['order_id','invoice_date'];
    // protected $hidden = [];
    // protected $dates = [];

   
    public function order(){
        return $this->belongsTo('App\Models\Order','order_id');
    }


    //companyNameColumn
    public function getCompanyName() {
        $order=Order::findOrFail($this->attributes['order_id']);
        echo $order->company->name;
        //echo $package->price;
    }

    //PackageNameColumn
    public function getPackageName(){
        $order=Order::all()->where('id','=',$this->attributes['order_id'])->first();
        echo $order->package->title;
    }

    //priceColumn
    public function getPackagePrice(){
        $order=Order::all()->where('id','=',$this->attributes['order_id'])->first();
        echo $order->getPrice();
    }
}
