<?php

namespace App\Http\Controllers\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Password;
use App\Models\CustomField;
use View;

class ForgotPasswordController extends Controller
{
     use SendsPasswordResetEmails;

     public function __construct(){
         $this->field=CustomField::all();
        // Sharing is caring
        View::share('fields', $this->field);
     }
    //Shows form to request password reset
    public function showLinkRequestForm()
    {
        return view('console.passwords.email');
    }

    //Password Broker for Seller Model
    public function broker()
    {
         return Password::broker('companies');
    }
}
