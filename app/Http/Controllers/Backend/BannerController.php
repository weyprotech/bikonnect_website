<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\BannerModel;
use Illuminate\Support\Str;
use App\BannerLangModel;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bannerList = BannerModel::with('bannerlang')->where('is_enable',1)->get();
        $data = array(
            'bannerList' => $bannerList
        );

        return view('backend.banner.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *@param Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $bannerId = Str::uuid();
            $uuid = Str::uuid(); 
            $bannerList = BannerModel::orderby('order','desc')->first();
            if($request->hasFile('bannerImg')){
                if($request->file('bannerImg')->isValid()){
                    $destinationPath = base_path() . '/public/uploads/banner/'.$bannerId;

                    // getting image extension
                    $extension = $request->file('bannerImg')->getClientOriginalExtension();
                    
                    if (!file_exists($destinationPath)) { //Verify if the directory exists
                        mkdir($destinationPath, 0777, true); //create it if do not exists
                    }
                    
                    // uuid renameing image
                    $fileName = Str::uuid() . '.' .$extension;
    
                    Image::make($request->file('bannerImg'))->resize('1920',null,function($constraint){
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/thumb_'.$fileName);
                    $bannerImg = '/uploads/banner/'.$bannerId.'/thumb_'.$fileName;
                }
            }

            $banner = new BannerModel();            
            $banner->is_enable = 1;
            $banner->is_visible = $request->is_visible;            
            $banner->bannerId = $bannerId;
            $banner->bannerImg = $bannerImg;
            $banner->order = isset($bannerList[0]->order) ? $bannerList[0]->order+1 : 1;
            $banner->uuid = $uuid;
            $banner->save();
            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new BannerLangModel();
                $lang->langId = $langValue['langId'];
                $lang->bId = $bannerId;
                $lang->title = $langValue['title'];  
            
                $lang->save();
            }            
            return redirect(action('Backend\BannerController@edit',[$bannerId]));
        }
        
        return $this->set_view('backend.banner.add',array());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($bannerId,Request $request)
    {
        $banner = BannerModel::with('bannerlang')->find($bannerId);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $banner->uuid){
                if(!empty($banner->bannerImg)){
                    @chmod(base_path() . '/public/'.$banner->bannerImg, 0777);
                    @unlink(base_path() . '/public/'.$banner->bannerImg);
                }

                $banner->uuid = Uuid::uuid1();
                //上傳圖檔
                if ($request->hasFile('bannerImg')) {
                    if($request->file('bannerImg')->isValid()){
                        if(!empty($banner->bannerImg)){
                            @chmod(base_path() . '/public/'.$banner->bannerImg, 0777);
                            @unlink(base_path() . '/public/'.$banner->bannerImg);
                        }
                        
                        $destinationPath = base_path() . '/public/uploads/banner/'.$bannerId;

                        // getting image extension
                        $extension = $request->file('bannerImg')->getClientOriginalExtension();
                        
                        if (!file_exists($destinationPath)) { //Verify if the directory exists
                            mkdir($destinationPath, 0777, true); //create it if do not exists
                        }
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '.' .$extension;
        
                        Image::make($request->file('bannerImg'))->resize('1920',null,function($constraint){
                            $constraint->aspectRatio();
                        })->save($destinationPath.'/thumb_'.$fileName);
                        $banner->bannerImg = '/uploads/banner/'.$bannerId.'/thumb_'.$fileName;                  
                    }
                }
                $banner->is_visible = $request->is_visible;
                $banner->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = BannerLangModel::where('bId',$bannerId)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->bId = $bannerId;
                    $lang->title = $langValue['title'];  
                    $lang->save();
                }
                return redirect(action('Backend\BannerController@edit',[$bannerId]));                  
            }
        }

        //讀出banner的語系資料
        foreach ($banner->bannerlang as $bannerKey => $bannerValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($bannerValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $bannerValue;
                }
            }
        }
        $data = array(
            'banner' => $banner,
            'langdata' => $langdata
        );

        return $this->set_view('backend.banner.edit',$data);
    }

    /**
     * order
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = BannerModel::find($orderValue['bannerId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect(action('Backend\BannerController@index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $bannerId
     * @return \Illuminate\Http\Response
     */
    public function delete($bannerId)
    {
        $row = BannerModel::find($bannerId);
        $row->is_enable = 0;
        $row->save();
        return redirect(action('Backend\BannerController@index'));
    }
}
