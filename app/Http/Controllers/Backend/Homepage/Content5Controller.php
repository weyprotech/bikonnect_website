<?php

namespace App\Http\Controllers\backend\Homepage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\ImageManagerStatic as Image;
use App\WebsiteLangModel;
use Ramsey\Uuid\Uuid;
use App\HomepageContent5Model;
use App\HomepageContent5LangModel;



class Content5Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contentList = HomepageContent5Model::with('content5lang')->where('is_enable',1)->get();
        $data = array(
            'contentList' => $contentList
        );

        return view('backend.homepage.content5.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *@param Request $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        if($request->isMethod('post')){
            $Id = Str::uuid();
            $uuid = Str::uuid(); 
            $oldcontent = HomepageContent5Model::orderby('order','desc')->first();
            $content = new HomepageContent5Model();
            $content->is_enable = 1;
            $content->order = isset($oldcontent->order) ? $oldcontent->order+1 : 1;
            $content->Id = $Id;
            $content->uuid = $uuid;
            $content->save();

            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new HomepageContent5LangModel();
                $lang->langId = $langValue['langId'];
                $lang->cId = $Id;
                $lang->title = $langValue['title'];  
                $lang->content = $langValue['content'];
                $lang->save();
            }
            
            return redirect(action('Backend\Homepage\Content5Controller@edit',[$Id]));
        }
        
        return $this->set_view('backend.homepage.content5.add',array());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($Id,Request $request)
    {
        $content = HomepageContent5Model::with('content5lang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = HomepageContent5LangModel::where('cId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->cId = $Id;
                    $lang->title = $langValue['title'];  
                    $lang->content = $langValue['content'];
                    $lang->save();
                }
                return redirect(action('Backend\Homepage\Content5Controller@edit',[$Id]));                  
            }
        }

        //讀出語系資料
        foreach ($content->content5lang as $contentKey => $contentValue) {
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

        return $this->set_view('backend.homepage.content5.edit',$data);
    }

    /**
     * order
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = HomepageContent5Model::find($orderValue['Id']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect(action('Backend\Homepage\Content5Controller@index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Id
     * @return \Illuminate\Http\Response
     */
    public function delete($Id)
    {
        $row = HomepageContent5Model::find($Id);
        $row->is_enable = 0;
        $row->save();
        return redirect(action('Backend\Homepage\Content5Controller@index'));
    }
}
