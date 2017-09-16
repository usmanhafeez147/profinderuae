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
use App\Models\Product;
class ProductsController extends Controller
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
		$products=Product::paginate(10)->where('company_id','=',auth()->guard('company')->id());
		$noOfProducts=Product::all()->count();
		return view('company.pages.products.list',['products'=>$products,'order'=>$this->order,'package'=>$this->package,'noOfProducts'=>$noOfProducts]);
	}
   
    public function showForm(){
        $this->initialize();
        $categories=Category::all();
        return view('company.pages.products.showForm',['categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }
    public function showEditForm($id){

         $this->initialize();
         $categories=Category::all();
         $product=Product::all()->where('id','=',$id)->first();
        return view('company.pages.products.showEditForm',['product'=>$product,'categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }
    
    public function create(Request $request){
        $id=auth()->guard('company')->id();
        if(!empty($id)){
            $this->validate($request,[
                    'name'=>'required',
                    'category'=>'required',
                    'price'=>'required|numeric|min:1',
                    'short_desc'=>'required',
                    'description'=>'required',
                    'image'=>'required|mimes:jpeg,jpg,png,gif'
                    ]);
            $path = $request->image;
            $type = pathinfo($path, PATHINFO_EXTENSION);
            $data = file_get_contents($path);
            $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

            $productId=Product::create([
                'name'=>$request->name,
                'company_id'=>$id,
                'category_id'=>$request->category,
                'price'=>$request->price,
                'short_desc'=>$request->short_desc,
                'description'=>$request->description,
                'photo'=>$base64,
                ]);
            if($productId){
                return redirect()->route('getProducts')->with('success','Product has been successfully Added');
            }else{
                return redirect()->route('getProducts')->with('error','Theres Some fault');
            }
        }
        else{
            return redirect()->route('getLogout');
        }
        
    }

    public function update($id,Request $request){
        $companyId=auth()->guard('company')->id();
        if(!empty($companyId)){

            $this->validate($request,[
                    'name'=>'required',
                    'category'=>'required',
                    'price'=>'required|numeric|min:1',
                    'short_desc'=>'required',
                    'description'=>'required'
                    ]);

            if(!empty($request->image)){

                $path = $request->image;
                $type = pathinfo($path, PATHINFO_EXTENSION);
                $data = file_get_contents($path);
                $base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

               Product::where('id','=',$id)->update([
                'name'=>$request->name,
                'category_id'=>$request->category,
                'price'=>$request->price,
                'short_desc'=>$request->short_desc,
                'description'=>$request->description,
                'photo'=>$base64,
                ]);
                
                return redirect()->route('getProducts')->with('success','Product has been successfully Updated');
               
              
            }else{

                Product::where('id','=',$id)->update([
                'name'=>$request->name,
                'company_id'=>$id,
                'category_id'=>$request->category,
                'price'=>$request->price,
                'short_desc'=>$request->short_desc,
                'description'=>$request->description,
                ]);

                return redirect()->route('getProducts')->with('success','Product has been successfully Updated');
            }
              
        }
        else{
            return redirect()->route('getLogout');
        }
    }

    public function deleteProducts($id){
        $companyId=auth()->guard('company')->id();
        if(!empty($companyId)){
            $product=Product::where('id','=',$id)->where('company_id','=',$companyId)->delete();
            if($product){
                 return redirect()->route('getProducts')->with('success','Product has been successfully Deleted');
            }
            else{
                 return redirect()->route('getProducts')->with('error','Couldn`t Delete product');
            }
        }else{
             return redirect()->route('getLogout');
        }
    }

}
