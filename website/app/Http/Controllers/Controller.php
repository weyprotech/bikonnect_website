<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\WebsiteLangModel;
use App\MenuModel;
use Session;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public $langList;

    public function __construct(){
        
        $this->langList = WebsiteLangModel::where('locale',app()->getLocale())->get();
        
    }

    public function set_view($view,$data = []){
        if(!Session::has('backend.account')){
            return redirect('backend/login');
        }
        // $menuList = MenuModel::orderBy('order','asc')->get();
        // $menuArray = array();
        // foreach ($menuList as $menuKey => $menuValue) {
        //     if($menuValue->prevId == 0 && $menuValue->lv == 1){                
        //         $menuArray[$menuValue->menuId] = array('menuTitle' => $menuValue->menuTitle,'menuUrl' => $menuValue->menuUrl,'menuIcon' => $menuValue->menuIcon);
        //     }else if($menuValue->lv == 2){                
        //         $menuArray[$menuValue->prevId]['menuList'] = $this->get_menu($menuValue->prevId);
        //     }
        // }
        $data['web_langList'] = WebsiteLangModel::where('is_enable',1)->get();
        // $data['menu'] = $menuArray;
        return view($view,$data);
    }

    private function get_menu($prevId){
        $menuList = MenuModel::get();
        $menuArray = array();
        foreach ($menuList as $key => $value) {
            if($value->prevId == $prevId){
                $menuArray[$value->menuId] = array('menuTitle' => $value->menuTitle,'menuUrl' => $value->menuUrl,'menuIcon' => $value->menuIcon);
                $menuArray[$value->menuId]['menuList'] = $this->get_menu($value->menuId);
            }
        }
        return $menuArray;
    }    
}
