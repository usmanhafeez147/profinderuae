<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;
//use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Company extends Authenticatable
{
    use CrudTrait;
    use Notifiable;
    //use HasRoles;
     /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'companies';
    protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
     protected $fillable = ['id','package_id','category_id','city_id'
                            ,'name','contact_name','gsm','image','description'
                            ,'address','zipcode','phone','phone2','billing_address'
                            ,'email','password','featured','weblink','rating_cache'
                            ,'rating_count','email_token','verified'];
    
    // protected $hidden = [];
    // protected $dates = [];

    

    public function category(){
        return $this->belongsTo('Backpack\NewsCRUD\app\Models\Category', 'category_id');
    }
    public function city(){
        return $this->belongsTo('App\Models\City', 'city_id');
    }

    public function orders(){
        return $this->hasMany('App\Models\Order');
    }
    
    public function package(){
        return $this->hasOne('App\Models\Package','id','package_id');
    }   

    public function products(){
        return $this->hasMany('App\Models\Product');
    }

    public static function RegisterCompany($input = array(),$package_id) {
        return Company::create([
                'name' => $input['name'],
                'package_id'=>$package_id,
                'city_id'=>$input['city'],
                'category_id'=>$input['category'],
                'email' => $input['email'],
                'password' => bcrypt($input['password']),
                'phone'=>$input['phone'],
                'email_token' => base64_encode($input['email'])
            ]);
    }

    

    public function reviews()
    {
        return $this->hasMany('App\Review');
    }

    // The way average rating is calculated (and stored) is by getting an average of all ratings, 
    // storing the calculated value in the rating_cache column (so that we don't have to do calculations later)
    // and incrementing the rating_count column by 1

    public function recalculateRating($rating)
    {
        $reviews = $this->reviews();
        $avgRating = $reviews->avg('rating');
        $this->rating_cache = round($avgRating,1);
        $this->rating_count = $reviews->count();
        $this->save();
    }
}
