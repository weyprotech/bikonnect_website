<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\SolutionVideoModel;
use App\WebsiteLangModel;
use App\SolutionVideoLangModel;
use Ramsey\Uuid\Uuid;
use DB;
use App\SolutionModel;
use App\SolutionLangModel;
use Illuminate\Support\Str;
use App\SolutionAspectModel;
use App\SolutionAspectLangModel;
use App\SolutionAspectCategoryModel;
use App\SolutionAspectCategoryLangModel;
use App\SolutionKeyfeatureModel;
use App\SolutionKeyfeatureLangModel;
use App\SolutionTitleModel;
use App\SolutionTitleLangModel;
use App\SolutionApplicationModel;
use App\SolutionApplicationLangModel;
use App\SolutionServiceModel;
use App\SolutionServiceLangModel;
use Intervention\Image\ImageManagerStatic as Image;



class SolutionController extends Controller 
{
    /*** solution ***/
    public function index(){
        $solutionList = SolutionModel::where('is_enable', 1)->with('lang')->orderby('order', 'asc')->get();
        $data = array(
            'solutionList' => $solutionList
        );
        return $this->set_view('backend.solution.index', $data);
    }

    /*** 新增解決方案 ****/
    public function add(Request $request){
        $uuid = Str::uuid();
       
        $solutionList = SolutionModel::limit(1)->orderby('order','desc')->get();
        
        if($request->isMethod('post')) {

            $solution = new SolutionModel();
            $solution->is_enable = 1;
            $solution->Id = $uuid;
            $solution->uuid = $uuid;
            $solution->url = $request->url;
            $solution->order = isset($solutionList[0]->order) ?  ($solutionList[0]->order + 1) : 1;

            $solution->save();
            
            //application 設定
            for($i = 1;$i < 6; $i++){
                $applicationId = Str::uuid();
                $application = new SolutionApplicationModel();
                $application->is_enable = 1;
                $application->Id = $applicationId;
                $application->sId = $uuid;
                $application->uuid = $uuid;
                $application->order = $i;
                $application->save();

                $applicationlang = new SolutionApplicationLangModel();
                $applicationlang->Id = Str::uuid();
                $applicationlang->aId = $applicationId;
                $applicationlang->langId = 1;
                $applicationlang->save();

                $applicationlang = new SolutionApplicationLangModel();
                $applicationlang->Id = Str::uuid();
                $applicationlang->aId = $applicationId;
                $applicationlang->langId = 3;
                $applicationlang->save();
            }
            

            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new solutionLangModel();
                $lang->Id = Str::uuid();
                $lang->solutionId = $uuid;                
                $lang->langId = $langValue['langId'];
                $lang->title = $langValue['title'];
                $lang->meta_title = $langValue['meta_title'];
                $lang->meta_description = $langValue['meta_description'];
                $lang->meta_keywords = $langValue['meta_keywords'];

                $langValue['dm_file'] = $this->upload_dm($request,'contentlangs.'.$langValue['langId'].'.dm_file',1,false,'dm_file');
                //圖文區圖片-1
                if ($request->hasFile('contentlangs.'.$langValue['langId'].'.content_img_1')) {
                    if($request->file('contentlangs.'.$langValue['langId'].'.content_img_1')->isValid()){
                        $destinationPath = base_path() . '/public/uploads/solution/'.$uuid;
                        // getting image extension
                        $extension = $request->file('contentlangs.'.$langValue['langId'].'.content_img_1')->getClientOriginalExtension();
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '_solution_.' . $extension;
                    
                        // move file to dest
                        $request->file('contentlangs.'.$langValue['langId'].'.content_img_1')->move($destinationPath, $fileName);
                        // save data
                        $langValue['content_img_1'] = '/uploads/solution/'.$uuid.'/'.$fileName;                             
                    }
                }else{
                    $langValue['content_img_1'] = "";
                }

                //圖文區圖片-2
                if ($request->hasFile('contentlangs.'.$langValue['langId'].'.content_img_2')) {
                    if($request->file('contentlangs.'.$langValue['langId'].'.content_img_2')->isValid()){
                        $destinationPath = base_path() . '/public/uploads/solution/'.$uuid;
                        // getting image extension
                        $extension = $request->file('contentlangs.'.$langValue['langId'].'.content_img_2')->getClientOriginalExtension();
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '_solution_.' . $extension;
                    
                        // move file to dest
                        $request->file('contentlangs.'.$langValue['langId'].'.content_img_2')->move($destinationPath, $fileName);
                        // save data
                        $langValue['content_img_2'] = '/uploads/solution/'.$uuid.'/'.$fileName;                             
                    }
                }else{
                    $langValue['content_img_2'] = "";
                }

                //架構圖
                if ($request->hasFile('contentlangs.'.$langValue['langId'].'.service_img')) {
                    if($request->file('contentlangs.'.$langValue['langId'].'.service_img')->isValid()){
                        $destinationPath = base_path() . '/public/uploads/solution/'.$uuid;
                        // getting image extension
                        $extension = $request->file('contentlangs.'.$langValue['langId'].'.service_img')->getClientOriginalExtension();
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '_solution_.' . $extension;
                    
                        // move file to dest
                        $request->file('contentlangs.'.$langValue['langId'].'.service_img')->move($destinationPath, $fileName);
                        // save data
                        $langValue['service_img'] = '/uploads/solution/'.$uuid.'/'.$fileName;                             
                    }
                }else{
                    $langValue['service_img'] = "";
                }
                $lang->dm_file = $langValue['dm_file'];
                $lang->video_youtube = $langValue['video_youtube'];
                $lang->video_content = $langValue['video_content'];
                $lang->content_title_1 = $langValue['content_title_1'];
                $lang->content_img_1 = $langValue['content_img_1'];
                $lang->content_content_1 = html_entity_decode($langValue['content_content_1']);
                $lang->content_title_2 = $langValue['content_title_2'];
                $lang->content_img_2 = $langValue['content_img_2'];
                $lang->content_content_2 = html_entity_decode($langValue['content_content_2']);
                $lang->service_title = $langValue['service_title'];
                $lang->service_img = $langValue['service_img'];
                $lang->aspect_title_1 = $langValue['aspect_title_1'];
                $lang->aspect_title_2 = $langValue['aspect_title_2'];
                
                $lang->save();
            }
            return redirect('backend/solution/index');
        }
        return $this->set_view('backend.solution.add');
    }

    //更新解決方案
    public function edit($solutionId,Request $request){
        $solution = SolutionModel::with('lang')->find($solutionId);
        $web_langList = websiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $request->uuid){
                $solution->uuid = Uuid::uuid1();
                $solution->url = $request->url;
                $solution->save();

                foreach ($request->contentlangs as $contentKey => $contentValue) {       
                    $content = SolutionLangModel::where('langId',$contentValue['langId'])->where('solutionId',$solutionId)->get();
                    //dm
                    $contentValue['dm_file'] = $this->upload_dm($request,'contentlangs.'.$contentValue['langId'].'.dm_file',1,$content,'dm_file');
                    //圖文區圖片-1
                    if ($request->hasFile('contentlangs.'.$contentValue['langId'].'.content_img_1')) {
                        if($request->file('contentlangs.'.$contentValue['langId'].'.content_img_1')->isValid()){
                            $destinationPath = base_path() . '/public/uploads/solution/'.$solutionId;
                            // getting image extension
                            $extension = $request->file('contentlangs.'.$contentValue['langId'].'.content_img_1')->getClientOriginalExtension();
                            
                            // uuid renameing image
                            $fileName = Str::uuid() . '_solution_.' . $extension;
                        
                            // move file to dest
                            $request->file('contentlangs.'.$contentValue['langId'].'.content_img_1')->move($destinationPath, $fileName);
                            // save data
                            $contentValue['content_img_1'] = '/uploads/solution/'.$solutionId.'/'.$fileName;                             
                        }
                    }else{
                        $contentValue['content_img_1'] = $content[0]->content_img_1;
                    }
    
                    //圖文區圖片-2
                    if ($request->hasFile('contentlangs.'.$contentValue['langId'].'.content_img_2')) {
                        if($request->file('contentlangs.'.$contentValue['langId'].'.content_img_2')->isValid()){
                            $destinationPath = base_path() . '/public/uploads/solution/'.$solutionId;
                            // getting image extension
                            $extension = $request->file('contentlangs.'.$contentValue['langId'].'.content_img_2')->getClientOriginalExtension();
                            
                            // uuid renameing image
                            $fileName = Str::uuid() . '_solution_.' . $extension;
                        
                            // move file to dest
                            $request->file('contentlangs.'.$contentValue['langId'].'.content_img_2')->move($destinationPath, $fileName);
                            // save data
                            $contentValue['content_img_2'] = '/uploads/solution/'.$solutionId.'/'.$fileName;                             
                        }
                    }else{
                        $contentValue['content_img_2'] = $content[0]->content_img_2;
                    }

                    //架構圖
                    if ($request->hasFile('contentlangs.'.$contentValue['langId'].'.service_img')) {
                        if($request->file('contentlangs.'.$contentValue['langId'].'.service_img')->isValid()){
                            $destinationPath = base_path() . '/public/uploads/solution/'.$solutionId;
                            // getting image extension
                            $extension = $request->file('contentlangs.'.$contentValue['langId'].'.service_img')->getClientOriginalExtension();
                            
                            // uuid renameing image
                            $fileName = Str::uuid() . '_solution_.' . $extension;
                        
                            // move file to dest
                            $request->file('contentlangs.'.$contentValue['langId'].'.service_img')->move($destinationPath, $fileName);
                            // save data
                            $contentValue['service_img'] = '/uploads/solution/'.$solutionId.'/'.$fileName;                             
                        }
                    }else{
                        $contentValue['service_img'] = $content[0]->service_img;
                    }

                    DB::table('tb_solution_lang')
                    ->where('solutionId',$solutionId)
                    ->where('langId',$contentValue['langId'])
                    ->update(
                        array('langId' => $contentValue['langId'],
                            'title' => $contentValue['title'],
                            'dm_file' => $contentValue['dm_file'],
                            'meta_title' => $contentValue['meta_title'],
                            'meta_description' => $contentValue['meta_description'],
                            'meta_keywords' => $contentValue['meta_keywords'],
                            'video_youtube'=> html_entity_decode($contentValue['video_youtube']),
                            'video_content' => $contentValue['video_content'],
                            'content_title_1' => $contentValue['content_title_1'],
                            'content_img_1' => $contentValue['content_img_1'],
                            'content_content_1' => html_entity_decode($contentValue['content_content_1']),
                            'content_title_2' => $contentValue['content_title_2'],
                            'content_img_2' => $contentValue['content_img_2'],
                            'content_content_2' => html_entity_decode($contentValue['content_content_2']),
                            'service_title' => $contentValue['service_title'],
                            'service_img' => $contentValue['service_img'],
                            'aspect_title_1' => $contentValue['aspect_title_1'],
                            'aspect_title_2' => $contentValue['aspect_title_2']
                        ));
                }
                return redirect('backend/solution/index');
            }
        }
        
        //讀出圖文的語系資料
        foreach ($solution->lang as $contentKey => $contentValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contentValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contentValue;
                }
            }
        }

        $data = array(
            'solution' => $solution,
            'langdata' => $langdata
        );
        return $this->set_view('backend.solution.edit',$data);
    }

    //刪除解決方案
    public function delete($solutionId){
        $solution = SolutionModel::with('lang')->find($solutionId);
        $solution->is_enable = 0;
        
        //刪除圖檔
        if(file_exists(base_path() . '/public/'.$solution->lang[0]->dm_file)){
            @chmod(base_path() . '/public/'.$solution->lang[0]->dm_file, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[0]->dm_file);
        }

        if(file_exists(base_path() . '/public/'.$solution->lang[0]->content_img_1)){
            @chmod(base_path() . '/public/'.$solution->lang[0]->content_img_1, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[0]->content_img_1);
        }
    
        if(file_exists(base_path() . '/public/'.$solution->lang[0]->content_img_2)){
            @chmod(base_path() . '/public/'.$solution->lang[0]->content_img_2, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[0]->content_img_2);
        }

        if(file_exists(base_path() . '/public/'.$solution->lang[0]->service_img)){
            @chmod(base_path() . '/public/'.$solution->lang[0]->service_img, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[0]->service_img);
        }

        if(file_exists(base_path() . '/public/'.$solution->lang[1]->dm_file)){
            @chmod(base_path() . '/public/'.$solution->lang[1]->dm_file, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[1]->dm_file);
        }

        if(file_exists(base_path() . '/public/'.$solution->lang[1]->content_img_1)){
            @chmod(base_path() . '/public/'.$solution->lang[1]->content_img_1, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[1]->content_img_1);
        }
    
        if(file_exists(base_path() . '/public/'.$solution->lang[1]->content_img_2)){
            @chmod(base_path() . '/public/'.$solution->lang[1]->content_img_2, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[1]->content_img_2);
        }

        if(file_exists(base_path() . '/public/'.$solution->lang[1]->service_img)){
            @chmod(base_path() . '/public/'.$solution->lang[1]->service_img, 0777);
            @unlink(base_path() . '/public/'.$solution->lang[1]->service_img);
        }
        @rmdir(base_path() . '/public/uploads/solution/'.$solution->Id);
        $solution->save();
        return redirect('backend/solution/index');   
    }


    public function order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = SolutionModel::find($orderValue['sId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect('backend/solution/index');
    }


    /***Application Range***/
    public function application($solutionId) 
    {
        $contentList = SolutionApplicationModel::with('lang')->where('is_enable',1)->where('sId',$solutionId)->orderby('order','asc')->get();
        foreach ($contentList as $contentKey => $contentValue){
            $contentValue->lang = SolutionApplicationLangModel::where('aId',$contentValue->Id)->get();
        }
        $data = array(
            'contentList' => $contentList
        );
        return view('backend.solution.application',$data);
    }

    public function editapplication($applicationId,Request $request) 
    {
        $content = SolutionApplicationModel::with('lang')->find($applicationId);
        $content->lang = SolutionApplicationLangModel::where('aId',$applicationId)->get();

        $solutionId = $content->sId;
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                $content->uuid = Uuid::uuid1();
                unset($content->lang);
                $content->save();

                foreach ($request->contentlangs as $contentKey => $contentValue) {                    
                    $content = SolutionApplicationLangModel::where('langId',$contentValue['langId'])->where('aId',$applicationId)->get();
                    
                    //上傳圖檔
                    if ($request->hasFile('contentlangs.'.$contentValue['langId'].'.img')) {
                        
                        if($request->file('contentlangs.'.$contentValue['langId'].'.img')->isValid()){
                            if(file_exists(base_path() . '/public/'.$content[0]->img)){
                                @chmod(base_path() . '/public/'.$content[0]->img, 0777);
                                @unlink(base_path() . '/public/'.$content[0]->img);
                            }
                            $destinationPath = base_path() . '/public/uploads/solution/'.$applicationId;

                            if (!file_exists($destinationPath)) { //Verify if the directory exists
                                mkdir($destinationPath, 0777, true); //create it if do not exists
                            }

                            // getting image extension
                            $extension = $request->file('contentlangs.'.$contentValue['langId'].'.img')->getClientOriginalExtension();
                            
                            // uuid renameing image
                            $fileName = Str::uuid() . '_group_.' . $extension;

                            Image::make($request->file('contentlangs.'.$contentValue['langId'].'.img'))->resize(185,null,function($constraint){
                                $constraint->aspectRatio();
                            })->save($destinationPath.'/thumb_'.$fileName);
                            // move file to dest
                            // $request->file('contentlangs.'.$contentValue['langId'].'.img')->move($destinationPath, $fileName);
                            // save data
                            $contentValue['img'] = '/uploads/solution/'.$applicationId.'/thumb_'.$fileName; 
                        }
                    }else{
                        $contentValue['img'] = $content[0]->img;
                    }
                    DB::table('tb_solution_application_lang')
                    ->where('aId',$applicationId)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'content'=> html_entity_decode($contentValue['content']),'img' => $contentValue['img']));
                }
                return redirect()->route("solution.application",['solutionid' => $solutionId]);            
            }
        }
        //讀出圖文的語系資料
        foreach ($content->lang as $contentKey => $contentValue) {
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
        return $this->set_view('backend.solution.editapplication',$data);
    }

    public function application_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = SolutionApplicationModel::find($orderValue['cId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect()->route("solution.application",['solutionid' => $content->sId]);        
    }

    /**** 特點類別 ****/
    public function aspect_category($solutionId) 
    {
        $solution = SolutionModel::with('lang')->find($solutionId);
        $categoryList = SolutionAspectCategoryModel::where('is_enable',1)->where('sId',$solutionId)->with('lang')->orderby('order','asc')->get();
        foreach ($categoryList as $contentKey => $contentValue){
            $contentValue->lang = SolutionAspectCategoryLangModel::where('cId',$contentValue->Id)->get();
        }


        $data = array(
            'categoryList' => $categoryList,
            'solutionId' => $solutionId
        );
        return view('backend.solution.aspectcategory',$data);
    }


    public function addaspect_category($solutionId,Request $request)
    {
        $solution = SolutionModel::with('lang')->find($solutionId);
        $categoryList = SolutionAspectCategoryModel::limit(1)->orderby('order','desc')->get();
        if($request->isMethod('post')){
            $uuid = Uuid::uuid1();
            $category = new SolutionAspectCategoryModel();
            $category->is_enable = 1;            
            $category->sId = $solutionId;
            $category->Id = $uuid;
            $category->uuid = $uuid;            
            $category->order = isset($categoryList[0]->order) ? $categoryList[0]->order+1 : 1;
            $category->save();
            foreach ($request->category as $langKey => $langValue) {
                $lang = new SolutionAspectCategoryLangModel();
                $lang->langId = $langValue['langId'];
                $lang->cId = $uuid;
                $lang->title = $langValue['title'];
                $lang->save();
            }
            return redirect()->route("solution.aspect_category",['solutionid' => $solutionId]);
        }
        $data = array(
            'solution' => $solution,
            'solutionId' => $solutionId
        );
        return $this->set_view('backend.solution.addaspectcategory',$data);
    }

    public function editaspect_category($categoryid,Request $request) 
    {
        $content = SolutionAspectCategoryModel::with('lang')->find($categoryid);
        $content->lang = SolutionAspectCategoryLangModel::where('cId',$categoryid)->get();

        $solution = SolutionModel::with('lang')->find($content->sId);
        $solutionId = $content->sId;
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                unset($content->lang);
                $content->uuid = Uuid::uuid1();
                $content->save();

                foreach ($request->categorylangs as $contentKey => $contentValue) {
                    $content = SolutionAspectCategoryLangModel::where('langId',$contentValue['langId'])->where('cId',$categoryid)->get();
                    DB::table('tb_solution_aspect_category_lang')
                    ->where('cId',$categoryid)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'title' => $contentValue['title']));
                }
                return redirect()->route("solution.aspect_category",['solutionid' => $solutionId]);
            }
        }
        //讀出特點的語系資料
        foreach ($content->lang as $contentKey => $contentValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contentValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contentValue;
                }
            }
        }

        $data = array(
            'solution' => $solution,
            'content' => $content,
            'langdata' => $langdata
        );
        return $this->set_view('backend.solution.editaspectcategory',$data);
    }

    public function aspect_category_delete($cId){
        $category = SolutionAspectCategoryModel::find($cId);
        $category->is_enable = 0;
        $category->save();
        return redirect()->route("solution.aspect_category",['solutionid' => $category->sId]);       
    }

    public function aspect_category_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = SolutionAspectCategoryModel::find($orderValue['cId']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect()->route("solution.aspect_category",['solutionid' => $content->sId]);
    }



    /**** 特點維護 ****/
    public function aspect($solutionId) 
    {
        $solution = SolutionModel::with('lang')->find($solutionId);
        $aspectList = SolutionAspectModel::where('is_enable',1)->where('sId',$solutionId)->with('lang')->orderby('order','asc')->get();
        foreach ($aspectList as $contentKey => $contentValue){
            $contentValue->lang = SolutionAspectLangModel::where('aId',$contentValue->Id)->get();
        }
        $solutionlang = solutionLangModel::where('solutionId',$solutionId)->where('langId',3)->get();
        $categoryList = SolutionAspectCategoryModel::where('is_enable',1)->where('sId',$solutionId)->get();
        foreach ($categoryList as $categoryKey => $categoryValue){
            $categoryValue->lang = SolutionAspectCategoryLangModel::where('cId',$categoryValue->Id)->get();
        }
        $aspect_title = array();
        foreach ($categoryList as $categoryKey => $categoryValue){
            $aspect_title[$categoryValue->Id] = $categoryValue->lang[0]->title;
        }
        

        $data = array(
            'aspectList' => $aspectList,
            'solutionId' => $solutionId,
            'aspect_title' => $aspect_title
        );
        return view('backend.solution.aspect',$data);
    }


    public function addaspect($solutionId,Request $request)
    {
        $solution = SolutionModel::with('lang')->find($solutionId);
        $aspectList = SolutionAspectModel::limit(1)->orderby('order','desc')->get();

        $categoryList = SolutionAspectCategoryModel::where('is_enable',1)->where('sId',$solutionId)->get();
        foreach ($categoryList as $categoryKey => $categoryValue){
            $categoryValue->lang = SolutionAspectCategoryLangModel::where('cId',$categoryValue->Id)->get();
        }

        if($request->isMethod('post')){
            $uuid = Uuid::uuid1();
            $aspect = new SolutionAspectModel();
            $aspect->is_enable = 1;
            $aspect->id = $uuid;
            $aspect->sId = $solutionId;
            $aspect->uuid = $uuid;
            $aspect->category = $request->category;
            $aspect->order = isset($aspectList[0]->order) ? $aspectList[0]->order+1 : 1;
            $aspect->save();
            foreach ($request->aspect as $langKey => $langValue) {
                $lang = new SolutionAspectLangModel();
                $lang->langId = $langValue['langId'];
                $lang->aId = $uuid;
                $lang->title = $langValue['title'];
                $lang->content = $langValue['content'];
                $lang->save();
            }
            return redirect()->route("solution.aspect",['solutionid' => $solutionId]);
        }
        $data = array(
            'solution' => $solution,
            'solutionId' => $solutionId,
            'categoryList' => $categoryList
        );
        return $this->set_view('backend.solution.addaspect',$data);
    }

    public function editaspect($aspectid,Request $request) 
    {
        dd($request);
        $content = SolutionAspectModel::with('lang')->find($aspectid);
        $content->lang = SolutionAspectLangModel::where('aId',$aspectid)->get();

        $solution = SolutionModel::with('lang')->find($content->sId);
        $solutionId = $content->sId;
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();
        $categoryList = SolutionAspectCategoryModel::where('is_enable',1)->where('sId',$solutionId)->get();
        foreach ($categoryList as $categoryKey => $categoryValue){
            $categoryValue->lang = SolutionAspectCategoryLangModel::where('cId',$categoryValue->Id)->get();
        }
        if($request->isMethod('post')){
            if($request->uuid == $content->uuid){
                unset($content->lang);
                $content->uuid = Uuid::uuid1();
                $content->category = $request->category;
                $content->save();

                foreach ($request->aspectlangs as $contentKey => $contentValue) {
                    $content = SolutionAspectLangModel::where('langId',$contentValue['langId'])->where('aId',$aspectid)->get();
                    DB::table('tb_solution_aspect_lang')
                    ->where('aId',$aspectid)
                    ->where('langId',$contentValue['langId'])
                    ->update(array('langId' => $contentValue['langId'], 'title' => $contentValue['title'], 'content'=> $contentValue['content']));
                }
                return redirect()->route("solution.aspect",['solutionid' => $solutionId]);
            }
        }
        //讀出特點的語系資料
        foreach ($content->lang as $contentKey => $contentValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($contentValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $contentValue;
                }
            }
        }

        $data = array(
            'solution' => $solution,
            'content' => $content,
            'langdata' => $langdata,
            'categoryList' => $categoryList
        );
        return $this->set_view('backend.solution.editaspect',$data);
    }

    public function aspect_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $aspect = SolutionAspectModel::find($orderValue['aId']);
                $aspect->order = $orderValue['order'];
                $aspect->save();
            }
        }
        return redirect()->route("solution.aspect",['solutionid' => $aspect->sId]);       
    }


    public function aspect_delete($aId){
        $aspect = SolutionAspectModel::find($aId);
        $aspect->is_enable = 0;
        $aspect->save();
        return redirect()->route("solution.aspect",['solutionid' => $aspect->sId]);       
    }


    /**** key-feature *****/
    public function key_feature()
    {
        $keyfeatureList = SolutionKeyfeatureModel::with('keyfeaturelang')->where('is_enable',1)->get();
        $data = array(
            'keyfeatureList' => $keyfeatureList
        );

        return view('backend.solution.keyfeature',$data);
    }

    /**
     * Show the form for creating a new resource.
     *@param Request $request
     * @return \Illuminate\Http\Response
     */
    public function addkey_feature(Request $request)
    {
        if($request->isMethod('post')){
            $Id = Str::uuid();
            $uuid = Str::uuid(); 
            $keyfeatureList = SolutionKeyfeatureModel::orderby('order','desc')->first();
            if($request->hasFile('Img')){
                if($request->file('Img')->isValid()){
                    $destinationPath = base_path() . '/public/uploads/key_feature/'.$Id;

                    // getting image extension
                    $extension = $request->file('Img')->getClientOriginalExtension();
                    
                    if (!file_exists($destinationPath)) { //Verify if the directory exists
                        mkdir($destinationPath, 0777, true); //create it if do not exists
                    }
                    
                    // uuid renameing image
                    $fileName = Str::uuid() . '.' .$extension;
    
                    Image::make($request->file('Img'))->resize('320',null,function($constraint){
                        $constraint->aspectRatio();
                    })->save($destinationPath.'/thumb_'.$fileName);
                    $Img = '/uploads/key_feature/'.$Id.'/thumb_'.$fileName;
                }
            }

            $row = new SolutionKeyfeatureModel();            
            $row->is_enable = 1;
            $row->is_visible = $request->is_visible;            
            $row->Id = $Id;
            $row->Img = $Img;
            $row->order = isset($keyfeatureList[0]->order) ? $keyfeatureList[0]->order+1 : 1;
            $row->uuid = $uuid;
            $row->save();
            foreach ($request->contentlangs as $langKey => $langValue) {
                $lang = new SolutionKeyfeatureLangModel();
                $lang->langId = $langValue['langId'];
                $lang->fId = $Id;
                $lang->title = $langValue['title'];  
                $lang->content = $langValue['content'];
            
                $lang->save();
            }            
            return redirect(action('Backend\SolutionController@editkey_feature',[$Id]));
        }
        
        return $this->set_view('backend.solution.addkeyfeature',array());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editkey_feature($Id,Request $request)
    {
        $row = SolutionKeyfeatureModel::with('keyfeaturelang')->find($Id);
        $web_langList = WebsiteLangModel::where('is_enable',1)->get();

        if($request->isMethod('post')){
            if($request->uuid == $row->uuid){
                $row->uuid = Uuid::uuid1();
                //上傳圖檔
                if ($request->hasFile('Img')) {                                        
                    if($request->file('Img')->isValid()){
                        if(file_exists(base_path() . '/public/'.$row->Img)){
                            @chmod(base_path() . '/public/'.$row->Img, 0777);
                            @unlink(base_path() . '/public/'.$row->Img);
                        }

                        $destinationPath = base_path() . '/public/uploads/key_feature/'.$Id;

                        // getting image extension
                        $extension = $request->file('Img')->getClientOriginalExtension();
                        
                        if (!file_exists($destinationPath)) { //Verify if the directory exists
                            mkdir($destinationPath, 0777, true); //create it if do not exists
                        }
                        
                        // uuid renameing image
                        $fileName = Str::uuid() . '.' .$extension;
        
                        Image::make($request->file('Img'))->resize('320',null,function($constraint){
                            $constraint->aspectRatio();
                        })->save($destinationPath.'/thumb_'.$fileName);
                        $row->Img = '/uploads/key_feature/'.$Id.'/thumb_'.$fileName;                  
                    }
                }
                $row->is_visible = $request->is_visible;
                $row->save();
                foreach ($request->contentlangs as $langKey => $langValue) {
                    $lang = SolutionKeyfeatureLangModel::where('fId',$Id)->where('langId',$langValue['langId'])->first();
                    $lang->langId = $langValue['langId'];
                    $lang->fId = $Id;
                    $lang->title = $langValue['title'];  
                    $lang->content = $langValue['content'];
                    $lang->save();
                }
                return redirect(action('Backend\SolutionController@editkey_feature',[$Id]));                  
            }
        }

        //讀出keyfeature的語系資料
        foreach ($row->keyfeaturelang as $rowKey => $rowValue) {
            foreach ($web_langList as $langKey => $langValue) {
                if($rowValue->langId == $langValue->langId){
                    $langdata[$langValue->langId] = $rowValue;
                }
            }
        }
        $data = array(
            'row' => $row,
            'langdata' => $langdata
        );

        return $this->set_view('backend.solution.editkeyfeature',$data);
    }

    /**
     * order
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function key_feature_order_save(Request $request){
        if($order = $request->order){
            foreach ($order as $orderKey => $orderValue) {
                $content = SolutionKeyfeatureModel::find($orderValue['Id']);
                $content->order = $orderValue['order'];
                $content->save();
            }
        }
        return redirect(action('Backend\SolutionController@key_feature'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $Id
     * @return \Illuminate\Http\Response
     */
    public function key_feature_delete($Id)
    {
        $row = SolutionKeyfeatureModel::find($Id);
        $row->is_enable = 0;
        if(file_exists(base_path() . '/public/'.$row->Img)){
            @chmod(base_path() . '/public/'.$row->Img, 0777);
            @unlink(base_path() . '/public/'.$row->Img);
        }
        @rmdir(base_path() . '/public/uploads/key_feature/'.$bannerId);
        $row->save();
        return redirect(action('Backend\SolutionController@key_feature'));
    }

    /**
     * 上傳DM檔案
     */
    public function upload_dm($request,$name,$uuid,$content = false,$file_name = ''){
        if($request->hasFile($name)){
            if($request->file($name)->isValid()){

                $destinationPath = base_path() . '/public/uploads/solution/title';
                // getting image extension
                $extension = $request->file($name)->getClientOriginalExtension();
                $filename = $request->file($name)->getClientOriginalName();
                if (!file_exists($destinationPath)) { //Verify if the directory exists
                    mkdir($destinationPath, 0777, true); //create it if do not exists
                }

                // uuid renameing image
                $fileName = $filename;
            
                // Image::make($request->file($name))->resize($width,null,function($constraint){
                //     $constraint->aspectRatio();
                // })->save($destinationPath.'/thumb_'.$fileName);

                // move file to dest
                $request->file($name)->move($destinationPath, $fileName);
                // save data

                $img = '/uploads/solution/title/'.$fileName;
                if(isset($content[0]->$file_name)){
                    if(file_exists(base_path() . '/public/'.@$content[0]->$file_name)){
                        @chmod(base_path() . '/public/'.$content[0]->$file_name, 0777);
                        @unlink(base_path() . '/public/'.$content[0]->$file_name);
                    }
                }
            }else{
                if($content){
                    $img = $content[0]->$file_name;
                }else{
                    $img = '';
                }
            }
        }else{
            if($content){
                $img = $content[0]->$file_name;
            }else{
                $img = '';
            }
        }
        return $img;
    }
}
