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


class Content4Controller extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id,Request $request)
    {
        $content = HomepageContent4Model::with('content4lang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                //上傳圖檔
                if ($request->hasFile('Img')) {                                        
                    if($request->file('Img')->isValid()){
                        if(!empty($content->Img)){
                            @chmod(base_path() . '/public/'.$content->Img, 0777);
                            @unlink(base_path() . '/public/'.$content->Img);
                        }
                        
                        $destinationPath = base_path() . '/public/uploads/homepage/content4/'.$Id;

                        // getting image extension
                        $extension = $request->file('Img')->getClientOriginalExtension();
                        
                        if (!file_exists($destinationPath)) { //Verify if the directory exists
                            mkdir($destinationPath, 0777, true); //create it if do not exists
                        }
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '.' .$extension;
        
                        Image::make($request->file('Img'))->resize('1920',null,function($constraint){
                            $constraint->aspectRatio();
                        })->save($destinationPath.'/thumb_'.$fileName);
                        $content->Img = '/uploads/homepage/content4/'.$Id.'/thumb_'.$fileName;                  
                    }
                }
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = HomepageContent4LangModel::where('cId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->cId = $Id;
                    $lang->title = $langValue['title']; 
                    $lang->description = $langValue['description'];
                    $lang->content = $langValue['content'];
                    $lang->save();
                }
                return redirect(action('Backend\Homepage\Content4Controller@edit',[$Id]));                  
            }
        }

        //讀出語系資料
        foreach ($content->content4lang as $contentKey => $contentValue) {
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

        return $this->set_view('backend.homepage.content4.edit',$data);
    }
}
