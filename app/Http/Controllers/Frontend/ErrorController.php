<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\ProductModel;


class ErrorController extends Controller 
{
    public function index() 
    {
        $this->set_locale(); 
        //產品列表
        $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();
        $data = array(
            'productList' => $productList
        );
        return view('frontend.error',$data);
    }
}
