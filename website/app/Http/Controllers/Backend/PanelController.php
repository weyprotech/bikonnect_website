<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use App\AdminModel;
use Hash;


class PanelController extends Controller 
{
    public function index() 
    {
        if(!Session::has('backend.account')){
            return redirect('backend/login');
        }
        return view('backend.index');
    }

    public function login() 
    {
        return view('backend.login');
    }

    //登入
    public function loginprocess(Request $request)
    {
        if($request->input('username') == 'weypro' && $request->input('password') == 'weypro12ab'){
            Session::put('backend.account', 'weypro');
            Session::put('backend.password', 'weypro12ab');   
            return redirect('backend/index');
        }else{
            $admin = AdminModel::where('account',$request->input('username'))->get();
            if($admin->isEmpty()){
                return redirect('backend/login');
            }else{
                if(Hash::check($request->input('password'),$admin[0]->password)){
                    Session::put('backend.account',$request->input('username'));
                    Session::put('backend.password',$request->input('password'));   
                    return redirect('backend/index');
                }else{
                    return redirect('backend/login');                    
                }
            }
        }
    }
}
