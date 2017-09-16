<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\Models\CustomField;
use View;

class ResetPasswordController extends Controller
{
     protected $redirectTo = '/company/dashboard';
     public $field;
    //trait for handling reset Password
    use ResetsPasswords;
    public function __construct(){
        $this->field=CustomField::all();
        // Sharing is caring
        View::share('fields', $this->field);
    }
    //Show form to seller where they can reset password
    public function showResetForm(Request $request, $token = null)
    {
        return view('console.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }

     //returns Password broker of company
     public function broker()
     {
         return Password::broker('companies');
     }

     //returns authentication guard of seller
     protected function guard()
     {
         return Auth::guard('company');
     }
}
