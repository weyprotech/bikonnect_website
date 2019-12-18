<?php

namespace App\Http\Controllers\backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use App\HomepageContent1Model;
use App\HomepageContent1LangModel;


class Content1Controller extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id,Request $request)
    {
        $content = HomepageContent1Model::with('content1lang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = HomepageContent1LangModel::where('cId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->cId = $Id;                    
                    $lang->title = $langValue['title'];  
                    $lang->content = $langValue['content'];
                    $lang->save();
                }
                return redirect(action('Backend\Homepage\Content1Controller@edit',[$Id]));                  
            }
        }

        //讀出語系資料
        foreach ($content->content1lang as $content1Key => $content1Value) {
            foreach ($web_langList as $langKey => $langValue) {
                if($content1Value->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $content1Value;
                }
            }
        }
        
        $data = array(
            'content' => $content,
            'langdata' => $langdata
        );
        return $this->set_view('backend.homepage.content1.edit',$data);
    }
}
