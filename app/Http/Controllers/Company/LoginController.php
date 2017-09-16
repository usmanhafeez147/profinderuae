<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CustomField;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
	use AuthenticatesUsers;


   public $field;
	/*public $cities;
	public $categories;*/
	
    public function __construct(){

		$this->middleware(['guest'], ['except' => 'logout']);
        
		$this->field=CustomField::all();
		
	}
    
    public function viewLoginForm(){
      
    	return view('console.login',['fields'=>$this->field]);
    }
    
    public function postLoginForm(Request $request){
        //die("heres to change code");
    	$this->validate($request,[
    		'email'=>'email|required',
            'password'=>'required'
    		]);
    	$email = $request->input('email');
        $password = $request->input('password');

        //dd(auth()->guard('company'));
        if (auth()->guard('company')->attempt(['email' => $email, 'password' => $password ])) 
        {
          
          $request->session()->regenerate();
          
            return redirect()->route('companyDashboard');
        }
        else
        {
        	
           return redirect()->route('viewLoginForm')->with('error', 'Invalid Login Credentials !');
        }
    }

    public function getLogout() 
    {
        auth()->guard('company')->logout();
       return redirect()->route('viewLoginForm');
    }
}
