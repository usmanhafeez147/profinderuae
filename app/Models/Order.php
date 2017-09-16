<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
use App\Models\Package;
use App\Models\Invoice;
class Order extends Model
{
    use CrudTrait;

     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'orders';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['company_id','package_id','creator_id','order_date','paid','office'];
    // protected $hidden = [];
    // protected $dates = [];

   
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package', 'package_id');
    }

    public function invoice(){
        return $this->hasOne('App\Models\Invoice');
    }

    public function creator(){
        return $this->belongsTo('App\User','creator_id');
    }

    public function getPrice() {
        
        $package=Package::findOrFail($this->attributes['package_id']);
        
         return $package->rent;
    }
    
    public static function CreateOrder($companyId,$packageId,$paid) {
        $order= Order::create([
                'company_id' => $companyId,
                'package_id' => $packageId,
                'order_date' => date('Y-m-d'),
                'paid'=> $paid,
                'office'=>'Dubai_Office'
            ]);
            
        if(!empty($order->id)){

            $invoice=Invoice::create([
                'order_id'=>$order->id,
                'invoice_date'=>date('y-m-d')
                ]);
            if(!empty($invoice->id)){
                return [$order,$invoice];
            }else{

            }
        }else{

        }
    }
}
