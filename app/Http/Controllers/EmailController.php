<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function Email(Request $request){

		$this->validate($request,[
			'name'=>'required',
			'email'=>'required|email',
			'message'=>'required|min:10',
			'subject'=>'required|min:3'
			]);
		

		$data=array(
			'name'=>$request->name,
			'email'=>$request->email,
			'subject'=>$request->subject,
			'bodyMessage'=>$request->message
			);
		Mail::send('emails.mail',$data,function($message) use ($data){
			$message->from($data['email']);
			$message->to('profinderuae@profinderuae.com');
			$message->subject($data['subject']);
		});
		return redirect()->route('contactUs')->with('status','Email sent successfully!');
	} 
}
