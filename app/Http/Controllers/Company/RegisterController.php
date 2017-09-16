<?php

namespace App\Http\Controllers\Company;
use Mail;
use App\Http\Controllers\Controller;
use App\Models\CustomField;
use App\Models\Company;
use App\Models\Package;
use App\Models\Order;

//New Added
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use App\Jobs\SendVerificationEmail;

class RegisterController extends Controller
{
    public $field;
	
	public function __construct(){

		$this->field=CustomField::all();
		$this->middleware('guest');
	}
    public function viewRegisterForm(){
    	return view('console.register',['fields'=>$this->field]);
    }

    public function postRegisterForm(Request $request){
        
    	$this->validate($request,[
                'name'=>'required',
                'packageId'=>'required',
                'city'=>'required|numeric|min:1',
                'category'=>'required|numeric|min:1',
                'email'=>'required|email|unique:companies',
                'password'=>'required|min:6',
                'cPassword' => 'required|min:6|same:password',
                'phone'=>'required',
                'agreeTermConditions'=>'required'
            ]);
       //die("here to register");
       
        $package=Package::findOrFail($request->packageId);
        //dd($package->id);
        
        $input = $request->all();
        
        $company = Company::RegisterCompany($input,$package->id); 
        
        if($company->id){

            $orderInvoice=Order::CreateOrder($company->id,$package->id,1);
            
            $data=array(
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'subject'=>"Subsciption Successfully",
                    'bodyMessage'=>"Hi! you successfully Subscribed as Company Name \'" . $request->name . "\'. Thank you!"
                    );
            

            Mail::send('emails.registerMail',$data,function($message) use ($data,$request){
                            $message->from('profinderuae@profinderuae.com');
                            $message->to($request->email);
                            $message->subject($data['subject']);
                        });

            /*event(new Registered($user = $this->create($request->all())));*/

            //Verification Email for Company Registeration
            dispatch(new SendVerificationEmail($company));

            return view('verification',['fields'=>$this->field])->with('status', 'User register successfully');

            // return redirect()->route('viewLoginForm')->with('status', 'User register successfully');
            
        }else{
           
            return redirect('register')->with('error', 'User not register. Please try again');
        }
    }

    public function verify($token)
    {
        $user = Company::where('email_token',$token)->first();
        $user->verified = 1;
        if($user->save()){
            return view('emailconfirm',['user'=>$user]);
            }
    }
}
