<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CustomField;
use App\Models\Company;
use App\Models\City;
use App\Models\Keyword;
use App\Models\Order;
use App\Models\Package;
use Backpack\NewsCRUD\app\Models\Category;
use View;
use DB;

class KeywordsController extends Controller
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
		$keywords=Keyword::paginate(10)->where('company_id','=',auth()->guard('company')->id());
		$noOfKeywords=Keyword::all()->count();
		
		return view('company.pages.keywords.list',['keywords'=>$keywords,'order'=>$this->order,'package'=>$this->package,'noOfKeywords'=>$noOfKeywords]);
	}

     public function showForm(){
        $this->initialize();
         $categories=Category::all();
        return view('company.pages.keywords.showForm',['categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }

    public function showEditForm($id){
        $this->initialize();
        $categories=Category::all();
        $keyword=Keyword::all()->where('id','=',$id)->first();

        return view('company.pages.keywords.showEditForm',['keyword'=>$keyword,'categories'=>$categories,'order'=>$this->order,'package'=>$this->package]);
    }
    
    public function create(Request $request){
        $id=auth()->guard('company')->id();
        if($id){
            $this->validate($request,[
                'name'=>'required',
                'category'=>'required',
                ]);
            $Keyword=Keyword::create([
                'name'=>$request->name,
                'company_id'=>$id,
                'category_id'=>$request->category,
                ]);

            if(!empty($keyword)){
                return redirect()->route('getKeywords')->with('status','Keyword is successfully Added');
            }else{
                return redirect()->route('getKeywords')->with('error','There is Some fault');
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
                    'name'=>'required',
                    'category'=>'required',
                    ]);
                $keyword=Keyword::where('id','=',$id)->update([
                    'name'=>$request->name,
                    'category_id'=>$request->category
                    ]);
                return redirect()->route('getKeywords')->with('status','Keyword is successfully Added');
            }else{
                return redirect()->route('getKeywords')->with('error','There is Some fault');
            }

        }else{
            return redirect()->route('getLogout');
        }
    }
    public function deletekeywords($id){
         $companyId=auth()->guard('company')->id();
        if(!empty($companyId)){
            $keyword=Keyword::where('id','=',$id)->where('company_id','=',$companyId)->delete();
            if($keyword){
                 return redirect()->route('getKeywords')->with('success','Product has been successfully Deleted');
            }
            else{
                 return redirect()->route('getKeywords')->with('error','Couldn`t Delete product');
            }
        }else{
             return redirect()->route('getLogout');
        }
    }
}
