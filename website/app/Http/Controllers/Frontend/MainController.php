<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\AboutPartnerModel;
use App\WebsiteLangModel;
use App\AboutContentModel;
use App\AboutHistoryModel;
use App\AboutTeamModel;
use App\SolutionVideoModel;
use App\SolutionContentModel;
use App\SolutionAspectModel;
use App\ProductModel;

class MainController extends Controller 
{
    public function index() 
    {
        $partnerList = AboutPartnerModel::where('is_enable',1)->with(['lang' => function ($query) {
            $query->where('langId', '=', $this->langList[0]->langId);
        }])->get();
        
        //產品列表
        $productList = ProductModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        // print_r($partnerList->toArray());exit;
        $data = array(
            'partnerList' => $partnerList,
            'productList' => $productList
        );
        return view('frontend.index',$data);
    }

    public function about() 
    {
        //圖文列表
        $contentList = AboutContentModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();
        
        //夥伴列表
        $partnerList = AboutPartnerModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        //沿革列表
        $historyList = AboutHistoryModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        //團隊列表
        $teamList = AboutTeamModel::where('is_enable',1)->orderby('order','asc')->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        //產品列表
        $productList = ProductModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        $data = array(
            'contentList' => $contentList,
            'partnerList' => $partnerList,
            'historyList' => $historyList,
            'productList' => $productList,            
            'teamList' => $teamList
        );
        return view('frontend.about',$data);
    }

    public function solution() 
    {
        //影片列表
        $videoList = SolutionVideoModel::with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        //圖文列表
        $contentList = SolutionContentModel::with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        //特點列表
        $aspectList = SolutionAspectModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();
        // print_r($aspectList->toArray());exit;

        //產品列表
        $productList = ProductModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        $data = array(
            'videoList' => $videoList,
            'contentList' => $contentList,
            'aspectList' => $aspectList,
            'productList' => $productList
        );
        return view('frontend.solution',$data);
    }

    public function product($productId){
        //產品列表
        $productList = ProductModel::where('is_enable',1)->with(['lang' => function($query){
            $query->where('langId','=',$this->langList[0]->langId);
        }])->get();

        $product = ProductModel::find($productId);
        
        $data = array(
            'productList' => $productList,
            'product' => $product,
            'productId' => $productId
        );
        return view('frontend.product',$data);
    }

    public function privacy() 
    {
        return view('frontend.privacy');
    }
}
