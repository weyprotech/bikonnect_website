<?php

namespace App\Http\Controllers\backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use App\HomepageContent4Model;
use App\HomepageContent4LangModel;
use App\LearnmoreLangModel;
use App\LearnmoreModel;

class LearnmoreController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id,Request $request)
    {
        $content = LearnmoreModel::with('learnmorelang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = LearnmoreLangModel::where('lId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->lId = $Id;
                    $lang->main_title = $langValue['main_title']; 
                    $lang->main_href = $langValue['main_href'];
                    $lang->solution_title = $langValue['solution_title'];
                    $lang->solution_href = $langValue['solution_href'];
                    $lang->vision_title = $langValue['vision_title'];
                    $lang->vision_href = $langValue['vision_href'];                   
                    $lang->save();
                }
                return redirect(action('Backend\Homepage\learnmoreController@edit',[$Id]));                  
            }
        }

        //讀出語系資料
        foreach ($content->learnmorelang as $contentKey => $contentValue) {
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

        return $this->set_view('backend.homepage.learnmore.edit',$data);
    }
}
