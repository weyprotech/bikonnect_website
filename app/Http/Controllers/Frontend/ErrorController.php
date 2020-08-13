<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\ProductModel;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
Use App\SolutionModel;


class ErrorController extends Controller 
{
    public function index() 
    {
        $this->set_locale(); 
        //產品列表
        $productList = ProductModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();
        //解決方案列表
        $solutionList = SolutionModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();
        $data = array(
            'productList' => $productList,
            'solutionList' => $solutionList
        );
        return view('frontend.error',$data);
    }
}
