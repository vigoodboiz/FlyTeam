<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    //login
    public function login() {
        return view('account.login');
    }
    public function check_login() {
        
    }
    //register
    public function register() {
        return view('account.register');
    }
    public function check_register(Request $request) {
        $request->validate([
            'use_code' => 'required|min:6|max:10|unique:customers',
            'name' => 'required|min:6|max:50',
            'email' => 'required|email|min:10|max:50|unique:customers',
            'password' => 'required|min:6|confirmed',
            'confirm_password' => 'required|same:password|confirmed',
            'gender' => 'required',
            'phone' => 'required|max:10',
            'address' => 'required|min:10|max:100',
        ], [
            'user_code.required' => 'Max nguoi dung khong duoc de trong',
            'user_code.min' => 'Ma nguoi dung toi thieu 6 ki tu',
            'user_code.max' => 'Ma nguoi dung toi da 10 ki tu',
            'user_code.unique' => 'Ma nguoi dung da co nguoi su dung',
            'name.required' => 'Ho ten khong duoc de trong',
            'name.min' => 'Ten toi thieu 6 ki tu',
            'name.max' => 'Ten toi da 50 ki tu',
            'email.required' => 'Email  khong duoc de trong',
            'email.min' => 'Email toi thieu 10 ki tu',
            'email.max' => 'Email toi da 50 ki tu',
            'email.email' => 'Email phai dung dinh dang',
            'email.unique' => 'Email da co nguoi su dung',
            'password.required' => 'Mat kahu khong duoc de trong',
            'password.min' => 'Mat khau toi thieu 6 ki tu',
            'confirm_password.required' => 'Mat khau khong duoc de trong',
            'confirm_password.same' => 'Mat khau khong trung khop',
            'gender.required' => 'Gioi tinh khong duoc de trong',
            'phone.required' => 'So dien thoia khong duoc de trong',
            'phone.max' => 'So dien thoai toi da 10 ki tu',
            'address.required' => 'Dia chi khong duoc de trong',
            'address.min' => 'Dia chi toi thieu 10 ki tu',
            'address.max' => 'Dia chi toi da 100 ki tu',
        ]);

       $data = $request->only('user_code', 'name', 'email', 'gender', 'phone', 'address');

       $data['password'] = bcrypt($request->password);
      if($acc = Customer::create($data)){
        Mail::to($acc->email)->send(new VerifyAccount($acc));
        dd('ok');
      }
    }
    //change-password
    public function change_password() {
        return view('account.change_password');
    }
    public function check_change_password() {
        
    }
    //forgot password
    public function forgot_password() {
        return view('account.forgot_password');
    }
    public function check_forgot_password() {
        
    }
    //reset password
    public function reset_password() {
        return view('account.reset_password');
    }
    public function check_reset_password() {
        
    }
    //profile
    public function profile() {
        return view('account.profile');
    }
    public function check_profile() {
        
    }
}