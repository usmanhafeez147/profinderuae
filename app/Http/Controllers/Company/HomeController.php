<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomField;
use App\Models\Company;
use App\Models\City;
use App\Models\Order;
use App\Models\Package;
use Backpack\NewsCRUD\app\Models\Category;
use View;
use DB;
class HomeController extends Controller
{
	public $field;
    public $package;
    public $order;

	public function __construct(){	

		$this->field=CustomField::all();
        View::share('fields', $this->field);
        
	}

    public function initialize(){
        $id=auth()->guard('company')->id();
        
        if(!empty($id)){
        
            $package=auth()->guard('company')->getUser()->package;
            
            if(!empty($package)){
                        
                $this->package=$package;
                View::share('package', $this->package);
            }else{
                echo "package not selected while creating order " . $this->order->id;
                        
                        /*if(!empty($package->id)){
                            $order=Order::where('id','=',$order->id)->update([
                                'product_id'=>$package->id,
                                'order_date'=>date('Y-m-d'),
                                'paid'=>1
                                ]);
                            return redirect()->route('companyDashboard');
                        }else{*/
                return redirect()->route('getLogout');
                        /*}*/
            }
        }else{
            //echo "Redirect to logout";
            return redirect()->route('getLogout');
        }
    }
    
    public function index(){
        //company dashboard after login
        //die("hello");
       $this->initialize();
        //dd($this->package);

        //if one order is found for company with package then show the product, images, keywords crud.
        //if order is not available the show to select package for company
        //if order is multiple then .....?????
    	//die("here to find the selected package for company");

        //['order'=>$this->order,'Package'=>$this->package]
        
    	return view('company.index',['order'=>$this->order,'package'=>$this->package]);
    }
    
    public function companyProfile(){
        $this->initialize();
    	return view('company.pages.profile',['order'=>$this->order,'package'=>$this->package]);
    }
    
    public function editCompanyProfile(){
        $this->initialize();
        $company;
        if(!empty(auth()->guard('company')->getUser()->city_id) or auth()->guard('company')->getUser()->city_id!=0){
             $company = Company::has('city')->where('id','=',auth()->guard('company')->id())->first();
        }else{
            //echo "world";
            $company=Company::all()->where('id','=',auth()->guard('company')->id())->first();
        }
       
        $cities=City::all();
        $categories=Category::all();
    	return view('company.pages.editProfile',['company'=>$company,'cities'=>$cities,'categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }

    public function updateCompanyProfile(Request $request){
        /* $image=file_get_contents($request->image);
          $base_image= base64_encode($image);*/
        $this->validate($request,[
            'name'=>'required|min:6',
            'contactName'=>'required',
            'gsm'=>'required',
            'description'=>'required',
            'category'=>'required',
            'city'=>'required',
            'address'=>"required",
            'zipcode'=>'required|numeric',
            'phone'=>'required',
            'phone2'=>'required',
            'billingAddress'=>'required',
            'weblink'=>'required',
            'image'=>'mimes:jpeg,jpg,png,gif'
            ],[
            'name.min'=>'couldn`t less then 6',
            'image'=>"image format only",
            ]);
         $path = $request->image;
		$type = pathinfo($path, PATHINFO_EXTENSION);
		$data = file_get_contents($path);
		$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);
        DB::table('companies')
            ->where('id', auth()->guard('company')->id())
            ->update([
                'name' => $request->name,
                'contact_name'=>$request->contactName,
                'gsm'=>$request->gsm,
                'description' => $request->description,
                'category_id' => $request->category,
                'city_id' => $request->city,
                'address' => $request->address,
                'zipcode' => $request->zipcode,
                'phone' => $request->phone,
                'phone2' => $request->phone2,
                'billing_address'=>$request->billingAddress,
                'weblink' => $request->weblink,
                'image' => $base64,
                ]);
            
            return redirect()->route('companyProfile');
    }
}
