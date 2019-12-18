<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use App\PrivacyModel;
use App\PrivacyLangModel;
use App\PrivacyTermModel;
use App\PrivacyTermLangModel;


class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param Request $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $content = PrivacyModel::with('privacylang')->find(1);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = PrivacyLangModel::where('pId',1)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];                    
                    $lang->title = $langValue['title'];  
                    $lang->content = $langValue['content'];
                    $lang->save();
                }
                return redirect(action('Backend\PrivacyController@index'));                  
            }
        }

        //讀出語系資料
        foreach ($content->privacylang as $content1Key => $content1Value) {
            foreach ($web_langList as $langKey => $langValue) {
                if($content1Value->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $content1Value;
                }
            }
        }
        
        $data = array(
            'content' => $content,
            'langdata' => $langdata,
            'web_langList' => $web_langList
        );

        return $this->set_view('backend.privacy.index',$data);
    }

    
    /**
     * 條款
     * 
     */
    public function term(){
        $contentList = PrivacyTermModel::where('is_enable',1)->orderby('order','asc')->with('privacyTermlang')->get();
        $data = array(
            'contentList' => $contentList
        );
        return $this->set_view('backend.privacy.term.index',$data);
    }

    public function add_term(Request $request){
        if($request->isMethod('post')){
            $Id = Str::uuid();
            $uuid = Str::uuid(); 
            $oldprivacy = PrivacyTermModel::orderby('order','desc')->first();
            $privacy = new PrivacyTermModel();
            $privacy->is_enable = 1;
            $privacy->order = isset($oldprivacy->order) ? $oldprivacy->order+1 : 1;
            $privacy->Id = $Id;
            $privacy->uuid = $uuid;
            $privacy->save();

            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new PrivacyTermLangModel();
                $lang->langId = $langValue['langId'];
                $lang->tId = $Id;
                $lang->title = $langValue['title'];  
                $lang->content = html_entity_decode($langValue['content']);
                $lang->save();
            }
            return redirect(action('Backend\PrivacyController@edit_term',[$Id]));
        }
        return $this->set_view('backend.privacy.term.add');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_term($Id,Request $request)
    {
        $content = PrivacyTermModel::with('privacyTermlang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = PrivacyTermLangModel::where('tId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->tId = $Id;
                    $lang->title = $langValue['title'];  
                    $lang->content = html_entity_decode($langValue['content']);
                    $lang->save();
                }
                return redirect(action('Backend\PrivacyController@edit_term',[$Id]));                  
            }
        }

        //讀出語系資料
        foreach ($content->privacyTermlang as $contentKey => $contentValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contentValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contentValue;
                }
            }
        }
        $data = array(
            'content' => $content,
            'langdata' => $langdata
        );

        return $this->set_view('backend.privacy.term.edit',$data);
    }

    /**
     * order
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function order_save_term(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = PrivacyTermModel::find($orderValue['Id']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect(action('Backend\PrivacyController@term'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Id
     * @return \Illuminate\Http\Response
     */
    public function delete_term($Id)
    {
        $row = PrivacyTermModel::find($Id);
        $row->is_enable = 0;
        $row->save();
        return redirect(action('Backend\PrivacyController@term'));
    }
}
