<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Entity\Auth;
use App\AdminModel;
use Hash;


class AdminController extends Controller 
{
    public function auth() 
    {
        $adminList = AdminModel::where('is_enable',1)->get();
        
        return view('backend.admin.auth',array('adminList' => $adminList));
    }

    public function addauth(Request $request) 
    {
        if($request->isMethod('post')) {
            $row = new AdminModel();
            $row->is_enable = 1;
            $row->account = $request->account;
            $row->password = Hash::make($request->password);
            $row->name = $request->name;
            $row->created_at = date('Y-m-d H:i:s');
            $row->updated_at = date('Y-m-d H:i:s');
            $row->save();
            return redirect('backend/admin/auth');            
        }else{            
            return view('backend.admin.addauth');
        }    
    }

    public function editauth($authid,Request $request) 
    {
        $row = AdminModel::find($authid);
        
        if($request->isMethod('post')){  
            $row->is_enable = 1;
            $row->account = $request->account;
            $row->password = Hash::make($request->password);
            $row->name = $request->name;
            $row->created_at = date('Y-m-d H:i:s');
            $row->updated_at = date('Y-m-d H:i:s');
            $row->save();
            return redirect('backend/admin/auth');     
        }else{

            $data = array(
                'authid' => $authid,
                'is_enable' => 1,
                'account' => $row->account,
                'name' => $row->name,
                'password' => $row->password            
            );
            return view('backend.admin.editauth',$data);
        }    
    }

    public function deleteauth($authid)
    {
        $row = AdminModel::find($authid);
        $row->is_enable = 0;
        $row->save();
        return redirect('backend/admin/auth');
    }
}
