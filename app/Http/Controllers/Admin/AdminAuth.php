<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuth extends Controller
{
    // admin authentication controller

    // 1- login method (get)
    public function login() {
        return view('admin.login');
    }

    // 1- login method (post)
    public function dologin() {
       $remember = request('remember') == 1 ? true : false;
       if(auth()->guard('admin')->attempt(['email' => request('email'),'password' => request('password')], $remember)) {
            return redirect('admin');
       } else {
           session()->flash('error', trans('admin.incorrect_information_login'));
           return redirect('admin.login');
       }
    }

}
