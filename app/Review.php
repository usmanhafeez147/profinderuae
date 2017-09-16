<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
class Review extends Model
{
    //protected $table='';
	protected $fillable=['company_id','rating'];
    
    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    /*public function scopeApproved($query)
    {
       	return $query->where('approved', true);
    }*/

    /*public function scopeSpam($query)
    {
       	return $query->where('spam', true);
    }*/

    /*public function scopeNotSpam($query)
    {
       	return $query->where('spam', false);
    }*/

    // Attribute presenters
    public function getTimeagoAttribute()
    {
    	$date = \Carbon\Carbon::createFromTimeStamp(strtotime($this->created_at))->diffForHumans();
    	return $date;
    }

    // this function takes in product ID, comment and the rating and attaches the review to the product by its ID, then the average rating for the product is recalculated
    public function storeReviewForProduct($companyId, $rating)
    {
        $company = Company::find($companyId);

        //$this->user_id = Auth::user()->id;
        //$this->comment = $comment;
        $this->rating = $rating;
        $company->reviews()->save($this);

        // recalculate ratings for the specified product
        $company->recalculateRating($rating);
    }
}
