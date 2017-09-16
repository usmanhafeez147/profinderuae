<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CustomField;
use App\Models\Company;
use App\Models\City;
use App\Models\Image;
use App\Models\Order;
use App\Models\Package;
use Backpack\NewsCRUD\app\Models\Category;
use View;
use DB;

class ImagesController extends Controller
{
    public $field;
    public $package;
    public $order;

	public function __construct(){	

		$this->field=CustomField::all();
	    // Sharing is caring
	    View::share('fields', $this->field);
		
	}

	public function initialize(){
        $id=auth()->guard('company')->id();
        
        if(!empty($id)){
            //
             $order=Order::all()->where('consumer_id','=',$id)->first();
             
             if(!empty($order)){
                if(isset($order->id)){
                    
                    $this->order=$order;
                    //View::share('order', $this->order);

                    $package=Package::all()->where('id','=',$this->order->product_id)->first();
                    if(!empty($package)){
                        
                        $this->package=$package;
                        //View::share('package', $this->package);
                    }else{
                        echo "package not selected while creating order " . $this->order->id;
                    }
                }else{
                    echo "order Id not found";
                }
             }
             else{
                echo "Company Order Not found";
             }
        
        }else{
            //echo "Redirect to logout";
            return redirect()->route('getLogout');
        }
    }

	public function index(){
		$this->initialize();
		$images=Image::paginate(10)->where('company_id','=',auth()->guard('company')->id());
		$noOfImages=Image::all()->count();
		return view('company.pages.images.list',['images'=>$images,'order'=>$this->order,'package'=>$this->package,'noOfImages'=>$noOfImages]);
	}

    public function showForm(){
        $this->initialize();
        $categories=Category::all();
        return view('company.pages.images.showForm',['categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }
    public function showEditForm($id){
         $this->initialize();
         $categories=Category::all();
         $image=Image::all()->where('id','=',$id)->first();
        return view('company.pages.images.showEditForm',['image'=>$image,'categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }
    
     public function create(Request $request){
        $id=auth()->guard('company')->id();
        
        //dd($id);

        if($id){
            $this->validate($request,[
                'description'=>'required',
                'category'=>'required',
                'image'=>'required|mimes:jpeg,jpg,png,gif'
                ]);
            
            $path = $request->image;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            $image=Image::create([
                'company_id'=>$id,
                'category_id'=>$request->category,
                'image'=>$base64,
                'description'=>$request->description,
                ]);

            if(!empty($image)){
                return redirect()->route('getImages')->with('status','Keyword is successfully Added');
            }else{
                return redirect()->route('getImages')->with('error','There is Some fault');
            }

        }else{
            return redirect()->route('getLogout');
        }
    }

    public function update($id,Request $request){
        $companyId=auth()->guard('company')->id();
        if(!empty($companyId)){

            if(!empty($id)){
                $this->validate($request,[
                    'description'=>'required',
                    'category'=>'required',
                    ]);

                if(!empty($request->image)){
                    $path = $request->image;
                    $type = pathinfo($path, PATHINFO_EXTENSION);
                    $data = file_get_contents($path);
                    $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

                   Image::where('id','=',$id)->update([
                    'category_id'=>$request->category,
                    'image'=>$base64,
                    'description'=>$request->description,
                    ]);
                return redirect()->route('getImages')->with('success','Image has been successfully Updated');
               
                  
                }else{
                    Image::where('id','=',$id)->update([
                    'category_id'=>$request->category,
                    'description'=>$request->description,
                    ]);

                    return redirect()->route('getImages')->with('success','Image has been successfully Updated');
                }

            }else{
                return redirect()->route('getImages')->with('error','There is Some fault');
            }

        }else{
            return redirect()->route('getLogout');
        }
    }
    public function deleteImages($id){
         $companyId=auth()->guard('company')->id();
        if(!empty($companyId)){
            $image=Image::where('id','=',$id)->where('company_id','=',$companyId)->delete();
            if($image){
                 return redirect()->route('getImage')->with('success','Image has been successfully Deleted');
            }
            else{
                 return redirect()->route('getImages')->with('error','Couldn`t Delete Image');
            }
        }else{
             return redirect()->route('getLogout');
        }
    }
}
