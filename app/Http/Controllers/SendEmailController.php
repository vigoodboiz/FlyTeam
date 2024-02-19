<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
use App\Model\User;
  
class SendEmailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'C.O.I Cosmestics - Xác nhận tài khoản',
            'body' => 'Cảm ơn bạn đã đăng kí tài khoản!'
        ];
         
        Mail::to($user->email)->send(new DemoMail($mailData));
           
        return view('auth.login')->with('Đăng kí thành công, vui lòng xác nhận qua email!');
    }
}