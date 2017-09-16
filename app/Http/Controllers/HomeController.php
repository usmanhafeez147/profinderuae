<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Country;
use App\Models\Company;
use App\Models\News;
use App\Models\SliderPhoto;
use App\Models\Consumer;
use App\Models\Audio;
use App\Models\Image;
use App\Models\Video;
use App\Models\Product;
use App\Models\CustomField;
use App\Models\Package;
use Backpack\NewsCRUD\app\Models\Category;
use Mail;
use App\Review;
use Backpack\NewsCRUD\app\Models\Category as Offer;
use BD;
class homeController extends Controller
{
	public $field;
	public $cities;
	public $categories;
	public function __construct(){
		$this->field=CustomField::all();
	}

	public function index(){
		$this->cities=City::all();//correct query
		$this->categories=Category::all();//correct query
		
		$sliderPhotos=SliderPhoto::all();//correct query

		$topOffers=Category::take(10)->get();//getting top categories

		$packages=Package::orderBy('id')->get();//getting All packages

		$companies=Company::has('category')->has('city')->where('featured','=',1)->inRandomOrder()->paginate(8);

		return view('home',['sliderPhotos'=>$sliderPhotos,'topOffers'=>$topOffers,'cities'=>$this->cities,'packages'=>$packages,'offers'=>$this->categories,'fields'=>$this->field,'companies'=>$companies]);
	}

	public function about(){
		return view('pages.about',['fields'=>$this->field,'cities'=>$this->cities]);
	}

	public function termOfServices(){
		return view('pages.termOfServices',['fields'=>$this->field]);
	}
	
	/*List of All companies method*/
	public function merchants(){
		$topCompanies=Company::take(10)->get();
		$companies=Company::has('city')->has('category')->inRandomOrder()->paginate(12);
		
		return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
	}//this is also ok but which merchant dont have city and category. that will not show

	public function merchantDetails($companyId){
		$topCompanies=Company::take(10)->get();
		$company=Company::findOrFail($companyId);//Find or fails if record not found

		$reviews = $company->reviews()->orderBy('created_at','desc')->paginate(100);
		$products=$company->products;
		$noOfProduct=$company->products->count();
		
		return view('pages.merchantDetails',['company'=>$company,'noOfProduct'=>$noOfProduct,'products'=>$products,'fields'=>$this->field,'cities'=>$this->cities,'reviews'=>$reviews]);
	}

	public function merchantsByCategory($id){

		$topCompanies=Company::take(10)->get();

		$companies=Company::where('category_id','=',$id)->has('category')->inRandomOrder()->paginate(12);

		return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
	}

	/*public function merchantsByCity($id){
		$topCompanies=Company::take(10)->get();
		$companies=Company::all()->where('city_id','=',$id);
		return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
	}*/
	//I will use it later

	public function packages(){
		$packages=Package::orderBy('id')->get();
		return view('pages.packages',['packages'=>$packages,'fields'=>$this->field,'cities'=>$this->cities]);
	}


	public function directories(){

		return view('pages.directoryCities',['fields'=>$this->field]);
	}

	public function directoriesByAlphabet($alphabet,$city){
		//echo str_replace('-', ' ', $city);
		//die();
		$directories=Consumer::where('name','like',"$alphabet%")->where('address','like',"%" . str_replace('-', ' ', $city) . "%")->get();
		$categories=Consumer::groupBy('industry')->get(['industry']);
		
		return view('pages.directories',['fields'=>$this->field,'directories'=>$directories,'categories'=>$categories,'city'=>$city]);
	}
	public function directoryDetails($id){
		$directory=Consumer::findOrFail($id);
		
		return view('pages.directoryDetails',['fields'=>$this->field,'directory'=>$directory]);
	}

	public function offers(){
		$topCats=Category::take(10)->get();
		$categories=Category::paginate(8);
		return view('pages.offers',['offers'=>$categories,'fields'=>$this->field,'cities'=>$this->cities,'topCats'=>$topCats]);
	}
	public function categories($alphabet){
		$topCats=Category::take(10)->get();
		$categories=Category::where('name','like',"$alphabet%")->paginate(8);
		return view('pages.offers',['offers'=>$categories,'fields'=>$this->field,'cities'=>$this->cities,'topCats'=>$topCats]);
	}

	public function services(){
		$topNewses=News::take(10)->get();
		$news=News::paginate(8);
		
		return view('pages.services',['newses'=>$news,'topNewses'=>$topNewses,'fields'=>$this->field,'cities'=>$this->cities]);
	}

	public function detailedNews($id){

		$news=News::findOrFail($id);

		return view('pages.detailedNews',['news'=>$news,'fields'=>$this->field,'cities'=>$this->cities]);
	}
	public function contactUs(){
		return view('pages.contactUs',['fields'=>$this->field,'cities'=>$this->cities]);
	}
	
	public function newsDetails($id){
			$news=News::findOrFail($id);
		
			return view('pages.template',['news'=>$news,'fields'=>$this->field,'cities'=>$this->cities]);
	}

	public function productsByCategory(Request $request){
		
		$products=Product::all()->where('category_id','=',$request->categoryId);
		$merchants=Company::all();
		$offers=Category::all();
		return view('pages.products',['offers'=>$offers,'merchants'=>$merchants,'products'=>$products,'fields'=>$this->field,'cities'=>$this->cities]);
	}
	public function productDetails($id){
			$product=Product::findOrFail($id);
			return view('pages.productTemplate',['product'=>$product,'fields'=>$this->field,'cities'=>$this->cities]);
	}

	public function searchResult(Request $request){

		//Checking location and category comes from inputs
		// echo "Checking location and category comes from inputs </br>";
		// echo "lacation1= " . $request->location1 . "<br>";
		// echo "lacation2= " . $request->location2 . "<br>";
		// echo "category1= " . $request->category1 . "<br>";
		// echo "category1= " . $request->category2 . "<br>";
		// echo "keyword= " . $request->keyword . "<br>";

		//echo "</br></br>";
		//die();

		//Selecting Top Categories
		$topCompanies=Company::take(10)->get();
		//echo "Initializing location, category and name <br>";
		//Initializing $location, $category and $name
		$location=0;
		$category=0;
		$name=$request->keyword;


		// echo "location= " . $location . "</br>" . "Category= " . $category . "</br>" . "name= " . $name;

		// echo "</br></br>";
		
		// echo "Selecting correct location and category from inputs </br>";
		if($request->location1!=0 and $request->location2==0){
			$location=$request->location1;
		}else if($request->location2!=0 and $request->location1==0){
			$location=$request->location2;
		}else if($request->location1!=0 and $request->location2!=0){
			$location=$request->location1;
		}else if($request->location1==0 and $request->location2==0){
			$location=0;
		}
		
		 // echo "location= " . $location;
		 // echo "<br>";
		if($request->category1!=0 and $request->category2==0){
			$category=$request->category1;
		}else if($request->category2!=0 and $request->category1==0){
			$category=$request->category2;
		}else if($request->category1!=0 and $request->category2!=0){
			$category=$request->category1;
		}else if($request->category1==0 and $request->category2==0){
			$category=0;
		}
		// echo "Category= " . $category;
		// echo "<br><br>";
		// echo "checking proper condition and executing query <br>";
		
		if($name!=null and $location!=0 and $category!=0){
			// echo "condition 1 <br>";
			// echo "location= " . $location . "</br>" . "Category= " . $category . "</br>" . "name= " . $name . "</br>";
			// echo "select data from specific input specific location and specific name";
			$companies=Company::has('city')->has('category')->where('city_id','=',$location)->Where('category_id','=',$category)->Where('name', 'LIKE', "%$name%")->paginate(12);

			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		elseif($name!=null and $location!=0 and $category==0){
			// echo "condition 2 <br>";
			// echo "location= " . $location . "</br>" . "Category= " . $category . "</br>" . "name= " . $name . "</br>";
			// echo "select data with specific location and name but no fix category";
			$companies=Company::has('city')->has('category')->where('city_id','=',$location)->Where('name', 'LIKE', "%$name%")->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		
		elseif($name!=null and $location==0 and $category!=0){
			// echo "condition 3";
			$companies=Company::has('city')->has('category')->where('category_id','=',$category)->Where('name', 'LIKE', "%$name%")->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		elseif($name!=null and $location==0 and $category==0){
			 // echo "condition 4";
			 // echo "hello";
			$companies=Company::has('city')->has('category')->where('name', 'LIKE', "%$name%")->paginate(12);
		
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		
		elseif($name==null and $location!=0 and $category!=0){
			// echo "condition 5";
			$companies=Company::has('city')->has('category')->where('city_id','=',$location)->Where('category_id','=',$category)->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		elseif($name==null and $location!=0 and $category==0){
			//echo "condition 6";
			$companies=Company::has('city')->has('category')->where('city_id','=',$location)->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		elseif($name==null and $location==0 and $category!=0){
			echo "condition 7";
			$companies=Company::has('city')->has('category')->where('category_id','=',$category)->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}
		elseif($name==null and $location==0 and $category==0){
			/*echo "condition 8";
			echo "<br>";
			echo "no input is selected";*/
			$companies=Company::has('city')->has('category')->paginate(12);
			
			return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'cities'=>$this->cities,'topCompanies'=>$topCompanies]);
		}

	}

	public function rating(Request $request,$id)
	{

		//echo $request->rating;
		
		$input = array(
			'rating'  => $request->rating
			);
		
		$this->validate($request,[
			'rating'  => 'required:|min:1'
			]);
		
		// instantiate Rating model
		$review = new Review;

		$review->storeReviewForProduct($id, $input['rating']);
			
		return Redirect()->to('/companies/details/' . $id )->with('review_posted',true);
		
	}

	public function searchbyName(Request $request){
		$topCompanies=Company::take(10)->get();
		$name=$request->name;
		$companies=Company::has('city')->has('category')->where('name','LIKE',"%$name%")->paginate(8);
		return view('pages.companies',['companies'=>$companies,'fields'=>$this->field,'topCompanies'=>$topCompanies,'cities'=>$this->cities]);
	}
}
