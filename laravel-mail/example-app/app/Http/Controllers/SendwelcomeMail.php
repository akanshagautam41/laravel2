<?php

namespace App\Http\Controllers;
use App\Mail\welcomeEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendwelcomeMail extends Controller
{
    public function sendMail()
    {
      $toEmail = 'dollyray1987@gmail.com';
      $message = "welcome mail...!";
      $subject = "HELLO MAIL...!";

   $response = Mail::to($toEmail)->send(new welcomeEmail($message,$subject));
  

    dd($response);

    }

    public function contactmail(){
      return view('mail-template.contact-form');
    }

    public function contactSendMail(Request $request)
    {
    $this->validate($request,[
      'name'=>'required|min:5|max:10',
      'email'=>'required|email',
      'subject'=>'required|min:5|max:100',
      'message'=>'required|min:5|max:250',
      'attachment'=>'required|mimes:png,pdf,doc,docx,xls,xlsx,csv|max:2048',

     ]);

     if($request->hasFile('attachment'))
     {
      $fileName = time().".".$request->file('attachment')->extension();
      $request->file('attachment')->move('uploads',$fileName);

      $adminEmail = 'dollyray1987@gmail.com';
      Mail::to($adminEmail)->send(new welcomeEmail($request->all(),$fileName));
    }
    }
}
