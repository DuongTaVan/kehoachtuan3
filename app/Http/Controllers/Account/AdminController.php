<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
class AdminController extends Controller
{
    public function index(){
        return view('admin.account.login');
    }
    public function postLogin(LoginRequest $request){
        if (\Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) {
                       
            return \redirect()->route('admin.category.index');
            
        }
        else
            return redirect()->route('admin.account.index')->with('info', 'Login is not successful!');
    }
    public function getLogoutAdmin(){
        \Auth::Logout();
        return \redirect()->route('admin.account.index');
    }
}
